<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'Password1!',
            'password_confirmation' => 'Password1!',
            // required extra fields
            'whatsapp_number' => '+94771234567',
            'id_number' => 'AB1234567',
            'address' => '12 Example Street, Colombo',
            'exam_year' => 2026,
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_registration_fails_when_id_number_already_exists(): void
    {
        \App\Models\User::factory()->create([
            'id_number' => '200512345678',
            'email' => 'first@example.com',
        ]);

        $response = $this->post('/register', [
            'name' => 'Second User',
            'email' => 'second@example.com',
            'password' => 'Secret123',
            'password_confirmation' => 'Secret123',
            'whatsapp_number' => '0771234567',
            'id_number' => ' 200512345678 ', // duplicate even with spaces
            'address' => 'Colombo, Sri Lanka',
            'exam_year' => 2026,
        ]);

        $response->assertSessionHasErrors(['id_number']);
        $this->assertGuest();
    }

    public function test_registration_fails_when_email_already_exists(): void
    {
        \App\Models\User::factory()->create([
            'email' => 'existing@example.com',
            'id_number' => '199912345678',
        ]);

        $response = $this->post('/register', [
            'name' => 'Duplicate Email User',
            'email' => 'existing@example.com',
            'password' => 'Secret123',
            'password_confirmation' => 'Secret123',
            'whatsapp_number' => '0771234567',
            'id_number' => '200599999999',
            'address' => 'Kandy, Sri Lanka',
            'exam_year' => 2026,
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    public function test_registration_fails_when_passwords_do_not_match(): void
    {
        $response = $this->post('/register', [
            'name' => 'Mismatch User',
            'email' => 'mismatch@example.com',
            'password' => 'Secret123',
            'password_confirmation' => 'Different123',
            'whatsapp_number' => '0771234567',
            'id_number' => '200588888888',
            'address' => 'Galle, Sri Lanka',
            'exam_year' => 2026,
        ]);

        $response->assertSessionHasErrors(['password']);
        $this->assertGuest();
    }
}
