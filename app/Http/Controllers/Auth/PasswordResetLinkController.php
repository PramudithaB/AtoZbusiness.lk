<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Carbon\Carbon;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request (Send OTP).
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.exists' => 'We could not find a user with that email address.',
        ]);

        // Find the user
        $user = User::where('email', $request->email)->first();

        // Generate a 6-digit OTP
        $otp = (string) random_int(100000, 999999);

        // Save OTP and expiration time (10 minutes from now)
        $user->otp = $otp;
        $user->otp_expires_at = Carbon::now()->addMinutes(10);
        $user->save();

        // Send OTP via email
        try {
            Mail::to($user->email)->send(new OtpMail($otp, $user->name));

            session()->put('password_reset_email', $request->email);

            return redirect()->route('password.verify.otp')
                ->with('email', $request->email)
                ->with('status', 'An OTP has been sent to your email address. Please check your inbox.');
        } catch (\Exception $e) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Failed to send OTP. Please try again later.']);
        }
    }

    /**
     * Display the OTP verification form.
     */
    public function showVerifyOtp()
    {
        $email = session('password_reset_email', session('email'));
        if (!$email) {
            return redirect()->route('password.request')
                ->with('error', 'Please enter your email first.');
        }

        session()->put('password_reset_email', $email);
        return view('auth.verify-otp');
    }

    /**
     * Verify the OTP and show password reset form.
     */
    public function verifyOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'otp' => ['required', 'string', 'regex:/^[0-9]{6}$/'],
        ], [
            'otp.required' => 'Please enter the OTP code.',
            'otp.regex' => 'OTP must be exactly 6 digits.',
        ]);

        $resetEmail = session('password_reset_email');
        if (!$resetEmail || !hash_equals((string) $resetEmail, (string) $request->email)) {
            return redirect()->route('password.request')
                ->with('error', 'Please start the password reset process again.');
        }

        $user = User::where('email', $resetEmail)->first();

        if (!$user) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'User not found. Please request a new OTP.']);
        }

        // Check if OTP exists
        if (!$user->otp) {
            return back()
                ->withInput()
                ->with('error', 'No OTP found. Please request a new OTP.')
                ->with('show_request_new', true);
        }

        // Check if OTP is expired first
        if (!$user->otp_expires_at || Carbon::now()->isAfter($user->otp_expires_at)) {
            return back()
                ->withInput()
                ->with('error', 'Your OTP has expired. Please request a new one.')
                ->with('show_request_new', true);
        }

        // Check if OTP is correct
        if (!hash_equals((string) $user->otp, (string) $request->otp)) {
            return back()
                ->withInput()
                ->withErrors(['otp' => 'Invalid OTP code. Please check your email and try again.'])
                ->with('error', 'The OTP you entered is incorrect. Please double-check the code in your email and try again.');
        }

        session()->put('password_reset_verified', true);

        return redirect()->route('password.reset.form')
            ->with('email', $request->email)
            ->with('otp_verified', true);
    }

    /**
     * Show the password reset form.
     */
    public function showResetForm()
    {
        $resetEmail = session('password_reset_email');
        if (!session('password_reset_verified') || !$resetEmail) {
            return redirect()->route('password.request')
                ->with('error', 'Please verify your OTP first.');
        }

        $user = User::where('email', $resetEmail)->first();
        if (!$user || !$user->otp || !$user->otp_expires_at
            || Carbon::now()->isAfter($user->otp_expires_at)) {
            session()->forget(['password_reset_verified', 'password_reset_email', 'otp_verified', 'email']);
            return redirect()->route('password.request')
                ->with('error', 'Your OTP has expired. Please request a new one.');
        }

        return view('auth.reset-password-otp');
    }

    /**
     * Reset the password.
     */
    public function resetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.required' => 'Please enter a new password.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'The password confirmation does not match. Please try again.',
        ]);

        $resetEmail = session('password_reset_email');
        if (!session('password_reset_verified')
            || !$resetEmail
            || !hash_equals((string) $resetEmail, (string) $request->email)) {
            return redirect()->route('password.request')
                ->with('error', 'Please verify your OTP before resetting your password.');
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'User not found. Please start the password reset process again.']);
        }

        if (!$user->otp || !$user->otp_expires_at
            || Carbon::now()->isAfter($user->otp_expires_at)) {
            session()->forget(['password_reset_verified', 'password_reset_email', 'otp_verified', 'email']);
            return redirect()->route('password.request')
                ->with('error', 'Your OTP has expired. Please request a new one.');
        }

        // Update password and clear OTP
        $user->password = Hash::make($request->password);
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        session()->forget(['password_reset_verified', 'password_reset_email', 'otp_verified', 'email']);

        return redirect()->route('login')
            ->with('status', 'Your password has been reset successfully! Please login with your new password.');
    }
}
