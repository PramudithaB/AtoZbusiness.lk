<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Sanitize Inputs (trim spaces, format id_number to uppercase without spaces)
        $cleanIdNumber = strtoupper(trim(str_replace(' ', '', (string) $request->id_number)));
        $cleanEmail = strtolower(trim((string) $request->email));
        $cleanPhone = trim(preg_replace('/\s+/', '', (string) $request->whatsapp_number));
        $cleanName = trim((string) $request->name);
        $cleanAddress = trim((string) $request->address);

        $request->merge([
            'id_number' => $cleanIdNumber,
            'email' => $cleanEmail,
            'whatsapp_number' => $cleanPhone,
            'name' => $cleanName,
            'address' => $cleanAddress,
        ]);

        // 2. Validate with custom friendly messages
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'whatsapp_number' => [
                'required',
                'string',
                'min:9',
                'max:15',
                'regex:/^(\+?[0-9]{9,15})$/'
            ],
            'id_number' => ['required', 'string', 'min:6', 'max:25', 'unique:users,id_number'],
            'address' => ['required', 'string', 'min:5', 'max:500'],
            'exam_year' => ['required', 'integer', 'digits:4', 'between:2024,2035'],
            'password' => ['required', 'confirmed', 'min:6'],
        ], [
            'name.required' => 'කරුණාකර ඔබගේ සම්පූර්ණ නම ඇතුළත් කරන්න. (Please enter your full name.)',
            'name.min' => 'නම සඳහා අවම වශයෙන් අකුරු 2ක් ඇතුළත් කරන්න.',
            'name.max' => 'නම අකුරු 255කට වඩා වැඩි විය නොහැක.',

            'email.required' => 'කරුණාකර ඔබගේ Email ලිපිනය ඇතුළත් කරන්න.',
            'email.email' => 'කරුණාකර වලංගු Email ලිපිනයක් ඇතුළත් කරන්න (උදා: student@gmail.com).',
            'email.unique' => 'මෙම Email ලිපිනය දැනටමත් ලියාපදිංචි වී ඇත. කරුණාකර ඔබගේ ගිණුමට Sign In වන්න.',

            'whatsapp_number.required' => 'කරුණාකර ඔබගේ WhatsApp අංකය ඇතුළත් කරන්න.',
            'whatsapp_number.min' => 'වලංගු දුරකථන අංකයක් ඇතුළත් කරන්න (අවම වශයෙන් ඉලක්කම් 9ක්).',
            'whatsapp_number.max' => 'දුරකථන අංකය ඉලක්කම් 15කට වඩා වැඩි විය නොහැක.',
            'whatsapp_number.regex' => 'වලංගු WhatsApp දුරකථන අංකයක් ඇතුළත් කරන්න (උදා: 0771234567 හෝ +94771234567).',

            'id_number.required' => 'කරුණාකර ශිෂ්‍ය හැඳුනුම්පත් (NIC) හෝ Student ID අංකය ඇතුළත් කරන්න.',
            'id_number.unique' => 'මෙම හැඳුනුම්පත් අංකය (NIC / ID Number) දැනටමත් පද්ධතියේ ලියාපදිංචි වී ඇත. කරුණාකර ඔබගේ ගිණුමට Sign In වන්න.',
            'id_number.min' => 'හැඳුනුම්පත් අංකය සඳහා අවම වශයෙන් අකුරු හෝ ඉලක්කම් 6ක් ඇතුළත් කරන්න.',
            'id_number.max' => 'හැඳුනුම්පත් අංකය අකුරු/ඉලක්කම් 25කට වඩා වැඩි විය නොහැක.',

            'address.required' => 'නිබන්ධන (Tute) තැපැල් කිරීමට ඔබගේ නිවැරදි ලිපිනය ඇතුළත් කරන්න.',
            'address.min' => 'කරුණාකර සම්පූර්ණ නිවැරදි ලිපිනය ඇතුළත් කරන්න.',

            'exam_year.required' => 'කරුණාකර A/L විභාගයට පෙනී සිටින වර්ෂය තෝරන්න.',
            'exam_year.between' => 'වලංගු A/L විභාග වර්ෂයක් ඇතුළත් කරන්න (උදා: 2025, 2026, 2027).',

            'password.required' => 'කරුණාකර මුරපදයක් (Password) ඇතුළත් කරන්න.',
            'password.confirmed' => 'තහවුරු කිරීමේ මුරපදය (Confirm Password) නොගැළපේ.',
            'password.min' => 'මුරපදය සඳහා අවම වශයෙන් අකුරු/ඉලක්කම් 6ක් ඇතුළත් කරන්න.',
        ]);

        try {
            $user = User::create([
                'name' => $cleanName,
                'email' => $cleanEmail,
                'password' => Hash::make($request->password),
                'whatsapp_number' => $cleanPhone,
                'id_number' => $cleanIdNumber,
                'address' => $cleanAddress,
                'exam_year' => $request->exam_year,
                'usertype' => 'user',
            ]);

            try {
                event(new Registered($user));
            } catch (\Throwable $ev) {
                \Illuminate\Support\Facades\Log::warning('Registered event warning: ' . $ev->getMessage());
            }

            Auth::login($user);

            return redirect()->route('dashboard');

        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Registration exception: ' . $e->getMessage(), [
                'email' => $cleanEmail,
                'id_number' => $cleanIdNumber,
            ]);

            return back()
                ->withInput($request->except(['password', 'password_confirmation']))
                ->withErrors([
                    'general' => 'ලියාපදිංචි වීමේදී දෝෂයක් සිදු විය. කරුණාකර ඔබගේ තොරතුරු නිවැරදි දැයි පරීක්ෂා කර නැවත උත්සාහ කරන්න.'
                ]);
        }
    }
}
