<?php

namespace Tests\Feature\dashbord\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthAdminTest extends TestCase
{
    use RefreshDatabase;
    private User $admin;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
    }


    public function test_user_can_login_via_api_with_valid_credentials(): void
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

    public function test_it_validates_required_email_and_password()
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

    public function test_email_or_password_not_correct()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'admsin@example.com',
            'password' => 'password',
        ]);
    
        $response->assertStatus(422); 
        $response->assertJsonFragment([
            'message' => 'Email or password not correct',
            'errors' => [
                'email' => ['Email or password not correct'],
            ],
        ]);
    }

    private function createUser(): User
    {
        return User::factory()->create([
            'name'=>'admin',
            'email' => 'admin@example.com',
            'phone' => '123235465',
            'confirm_password'=>'123235465',
            'password' => 'password',
        ]);
    }
}
