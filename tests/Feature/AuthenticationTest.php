<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the login screen can be rendered.
     *
     * @return void
     */
    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('login');

        $response->assertStatus(200); // Assert the login page is accessible
        $response->assertViewIs('auth.login'); // Check if the right view is returned
    }

    /**
     * Test if a user can login with valid credentials.
     *
     * @return void
     */
    public function test_user_can_login_with_valid_credentials()
{
    $password = 'password123';
    $user = User::factory()->create(['password' => bcrypt($password)]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => $password,
    ]);

    // Debugging output
    if (!$response->isRedirect()) {
        echo $response->getContent(); // This will help identify issues
    }

    // Assert the user is redirected to the dashboard or intended route
    $response->assertRedirect('/dashboard');
    $this->assertAuthenticatedAs($user); // Ensure the user is authenticated
}


    /**
     * Test if a user cannot login with invalid credentials.
     *
     * @return void
     */
    public function test_user_cannot_login_with_invalid_credentials()
    {
        // Create a user
        $user = User::factory()->create();

        // Attempt to login with invalid credentials
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors('email'); // Check for email error
        $this->assertGuest(); // Ensure the user is not authenticated
    }

    /**
     * Test if a user can log out.
     *
     * @return void
     */
    public function test_user_can_logout()
    {
        // Create and login a user
        $user = User::factory()->create();

        $this->actingAs($user); // Authenticate as the user

        // Attempt to logout
        $response = $this->post('/logout');

        $response->assertRedirect('/'); // Assert the user is redirected to the homepage
        $this->assertGuest(); // Ensure the user is logged out
    }

    /**
     * Test if a user cannot login with an unverified email.
     *
     * @return void
     */
    public function test_user_cannot_login_with_unverified_email()
    {
        // Create a user without verifying the email
        $user = User::factory()->create(['email_verified_at' => null]);

        // Attempt to login with the unverified email
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123', // Ensure the password matches the user's password
        ]);

        $response->assertSessionHasErrors('email'); // Check for email error
        $this->assertGuest(); // Ensure the user is not authenticated
    }
}
