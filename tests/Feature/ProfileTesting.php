<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the profile page can be accessed by an authenticated user.
     *
     * @return void
     */
    public function test_profile_page_can_be_accessed_by_authenticated_user()
    {
        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Access the profile page
        $response = $this->get('/profile');

        // Assert the response is successful
        $response->assertStatus(200);
        $response->assertViewIs('profile.show'); // Check if the correct view is returned
    }

    /**
     * Test if an unauthenticated user cannot access the profile page.
     *
     * @return void
     */
    public function test_unauthenticated_user_cannot_access_profile_page()
    {
        // Attempt to access the profile page without authentication
        $response = $this->get('/profile');

        // Assert that the user is redirected to the login page
        $response->assertRedirect('/login');
    }

    /**
     * Test if a user can update their profile with valid data.
     *
     * @return void
     */
    public function test_user_can_update_profile_with_valid_data()
    {
        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Update profile with valid data
        $response = $this->put('/profile', [
            'name' => 'Updated Name',
            'email' => 'updatedemail@example.com',
        ]);

        // Assert the user is redirected to the profile page
        $response->assertRedirect('/profile');

        // Check if the user's information is updated in the database
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updatedemail@example.com',
        ]);
    }

    /**
     * Test if a user cannot update their profile with invalid data.
     *
     * @return void
     */
    public function test_user_cannot_update_profile_with_invalid_data()
    {
        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Attempt to update profile with invalid data
        $response = $this->put('/profile', [
            'name' => '',
            'email' => 'invalid-email',
        ]);

        // Assert that validation errors are present
        $response->assertSessionHasErrors(['name', 'email']);

        // Assert the user's information in the database remains unchanged
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    /**
     * Test if a user can update their password.
     *
     * @return void
     */
    public function test_user_can_update_password()
    {
        // Create a user and authenticate
        $user = User::factory()->create(['password' => bcrypt('oldpassword')]);
        $this->actingAs($user);

        // Update password with valid data
        $response = $this->put('/profile/password', [
            'current_password' => 'oldpassword',
            'new_password' => 'newpassword123',
            'new_password_confirmation' => 'newpassword123',
        ]);

        // Assert the user is redirected to the profile page
        $response->assertRedirect('/profile');

        // Assert the user's password has been updated
        $this->assertTrue(password_verify('newpassword123', $user->fresh()->password));
    }

    /**
     * Test if a user cannot update their password with an incorrect current password.
     *
     * @return void
     */
    public function test_user_cannot_update_password_with_incorrect_current_password()
    {
        // Create a user and authenticate
        $user = User::factory()->create(['password' => bcrypt('oldpassword')]);
        $this->actingAs($user);

        // Attempt to update password with incorrect current password
        $response = $this->put('/profile/password', [
            'current_password' => 'wrongpassword',
            'new_password' => 'newpassword123',
            'new_password_confirmation' => 'newpassword123',
        ]);

        // Assert that validation errors are present
        $response->assertSessionHasErrors(['current_password']);
    }
}
