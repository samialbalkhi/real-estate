<?php

namespace Tests\Feature\Section;

use App\Models\Section;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class SectionTest extends TestCase
{
    use RefreshDatabase;
    private $admin;
    private $section;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createUser();
        $this->section = $this->createSection();
    }

    /**
     * @test
     */
    public function api_return_section_list(): void
    {
        $this->section;
        $response = $this->actingAs($this->admin)->getJson('api/sections');
        $response->assertJsonStructure([
            '*' => ['id', 'name', 'status', 'created_at', 'updated_at'],
        ]);
    }

    /**
     * @test
     */
    public function api_section_store_successful()
    {
        $section = [
            'name' => 'asd',
            'status' => 1,
        ];

        $response = $this->actingAs($this->admin)->postJson('api/sections', $section);

        $response->assertStatus(201);
        $response->assertJson($section);
    }

    /**
     * @test
     */
    public function api_section_invalid_store_returns_error()
    {
        $section = [
            'name' => '',
            'status' => 1,
        ];

        $response = $this->actingAs($this->admin)->postJson('api/sections', $section);
        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function section_edit_contains_correct_values(): void
    {
        $section = $this->section;

        $response = $this->actingAs($this->admin)->get('api/sections/' . $section->id . '/edit');
        $response->assertStatus(200);
        $response->assertJson([
            'id' => $section->id,
            'name' => $section->name,
            'status' => $section->status,
            'created_at' => $section->created_at,
            'updated_at' => $section->updated_at,
        ]);
    }

    /**
     * @test
     */
    public function section_update_validation_error()
    {
        $section = $this->section;

        $response = $this->actingAs($this->admin)->put('api/sections/' . $section->id, [
            'name' => '',
            'status' => '',
        ]);

        $response->assertStatus(422);

        $response->assertJson([
            'success' => false,
            'message' => 'Validation errors',
            'data' => [
                'name' => ['The name field is required.'],
            ],
        ]);
    }

    /**
     * @test
     */
    public function section_delete_successful()
    {
        $section = $this->section;
        $response = $this->actingAs($this->admin)->deleteJson('api/sections/' . $section->id);
        $response->assertStatus(200);
    }

    private function createSection()
    {
        return Section::factory()->create([
            'name' => Str::random(8),
            'status' => 1,
        ]);
    }

    private function createUser()
    {
        return User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),

        ]);
    }
}
