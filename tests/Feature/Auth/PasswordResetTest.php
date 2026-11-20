<?php

namespace Tests\Feature\Auth;

use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered(): void
    {
        $this->get('/forgot-password')->assertStatus(200);
    }

    public function test_otp_can_be_requested(): void
    {
        Mail::fake();
        $user = User::factory()->create();

        $response = $this->post('/forgot-password', ['email' => $user->email]);

        $response->assertRedirect(route('password.verify.otp'));
        $this->assertNotNull($user->fresh()->otp);
        Mail::assertSent(OtpMail::class, fn (OtpMail $mail) => $mail->hasTo($user->email));
    }

    public function test_valid_otp_opens_reset_form(): void
    {
        $user = User::factory()->create([
            'otp' => '123456',
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]);

        $this->withSession(['password_reset_email' => $user->email])
            ->post('/verify-otp', ['email' => $user->email, 'otp' => '123456'])
            ->assertRedirect(route('password.reset.form'));

        $this->withSession([
            'password_reset_email' => $user->email,
            'password_reset_verified' => true,
        ])->get('/reset-password-form')->assertStatus(200);
    }

    public function test_password_can_be_reset_with_valid_otp(): void
    {
        $user = User::factory()->create([
            'otp' => '123456',
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]);

        $response = $this->withSession([
            'password_reset_email' => $user->email,
            'password_reset_verified' => true,
        ])->post('/reset-password-form', [
            'email' => $user->email,
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

        $response->assertRedirect(route('login'));
        $this->assertTrue(password_verify('new-password', $user->fresh()->password));
        $this->assertNull($user->fresh()->otp);
        $this->assertNull($user->fresh()->otp_expires_at);
    }
}
