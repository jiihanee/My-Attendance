<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the registration screen can be rendered.
     *
     * @return void
     */
    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200); // Assert the registration page is accessible
        $response->assertViewIs('auth.register'); // Check if the right view is returned
    }

    /**
     * Test if a user can register with valid credentials.
     *
     * @return void
     */
    public function test_user_can_register_with_valid_credentials()
    {
        // Simulate form submission with valid user data
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        // Assert the user is redirected to the intended page
        $response->assertRedirect('/dashboard');

        // Check if the user was created in the database
        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com',
        ]);

        // Check if the user is authenticated
        $user = User::where('email', 'testuser@example.com')->first();
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test if registration fails with invalid data.
     *
     * @return void
     */
    public function test_user_cannot_register_with_invalid_data()
    {
        // Simulate form submission with invalid user data (mismatched password)
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'invalid-email',
            'password' => 'password123',
            'password_confirmation' => 'wrong-password',
        ]);

        // Assert that validation errors are present
        $response->assertSessionHasErrors(['name', 'email', 'password']);

        // Assert that no user is created
        $this->assertDatabaseMissing('users', [
            'email' => 'invalid-email',
        ]);

        // Ensure no user is authenticated
        $this->assertGuest();
    }

    /**
     * Test if a user cannot register with an existing email.
     *
     * @return void
     */
    public function test_user_cannot_register_with_existing_email()
    {
        // Create an existing user
        $user = User::factory()->create([
            'email' => 'existinguser@example.com',
        ]);

        // Attempt to register with the same email
        $response = $this->post('/register', [
            'name' => 'New User',
            'email' => 'existinguser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        // Assert that the email is already taken
        $response->assertSessionHasErrors('email');

        // Assert that no new user was created
        $this->assertDatabaseCount('users', 1);
    }

    /**
     * Test if the registration fails if password confirmation doesn't match.
     *
     * @return void
     */
    public function test_registration_fails_if_password_confirmation_does_not_match()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'wrongpassword',
        ]);

        // Assert that a password confirmation error is present
        $response->assertSessionHasErrors('password');

        // Assert no user is created
        $this->assertDatabaseMissing('users', [
            'email' => 'testuser@example.com',
        ]);
    }

    /**
     * Test if the registration is disabled.
     *
     * @return void
     */
    
}
