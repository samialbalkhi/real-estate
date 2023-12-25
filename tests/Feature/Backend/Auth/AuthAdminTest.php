<?php

namespace Tests\Feature\Backend\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthAdminTest extends TestCase
{
    use RefreshDatabase;
    private User $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
    }

    /**
     * @test
     */
    public function user_can_login_via_api_with_valid_credentials(): void
    {

        $response = $this->postJson('/api/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200);

        $response->assertJson([
            'token' => true,
        ]);
    }

    /**
     * @test
     */
    public function it_validates_required_email_and_password()
    {
        $response = $this->postJson('/api/login', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => false,
            'message' => 'Validation errors',
            'data' => [
                'email' => ['The email field is required.'],
                'password' => ['The password field is required.'],
            ],
        ]);
    }

    /**
     * @test
     */
    public function incorrect_email_or_password()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'incorrect@email.com',
            'password' => 'incorrect_password',
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'key' => 'error',
                'message' => 'Email or password not correct',
            ]);
    }

    private function createUser(): User
    {
        return User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'phone' => '123235465',
            'password_confirmation' => '123235465',
            'password' => 'password',
        ]);
    }
}
