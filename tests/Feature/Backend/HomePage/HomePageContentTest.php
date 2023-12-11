<?php

namespace Tests\Feature\Backend\HomePage;

use Tests\TestCase;
use App\Models\User;
use App\Models\HomePageContent;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class HomePageContentTest extends TestCase
{
    use RefreshDatabase;
    private $create_home_page_content;
    private $admin;


    public function setUp(): void
    {
        parent::setUp();
        $this->create_home_page_content = $this->createFactory();
        $this->admin = $this->createUser();
    }

    public function test_home_page_content_edit_contains_correct_values(): void
    {
        $response = $this->actingAs($this->admin)
            ->get('api/edit/' . $this->createFactory()->id);
        $response->assertStatus(200);
        $content = $response->json();

        $this->assertEquals($this->create_home_page_content->description, $content['description']);
        $this->assertEquals($this->create_home_page_content->image, $content['image']);
    }


    public function test_home_page_content_update(): void
    {
        $updatedData = [
            'description' => 'Updated description',
            'image' => UploadedFile::fake()->image('test_image.jpg'),
        ];

        $response = $this->actingAs($this->admin)
            ->patchJson("api/update/{$this->create_home_page_content->id}", $updatedData);

        $response->assertStatus(200);

        $this->create_home_page_content->refresh();

        $this->assertEquals($updatedData['description'], $this->create_home_page_content->description);
        $this->assertNotEquals($updatedData['image'], $this->create_home_page_content->image);
    }

    private function createFactory()
    {
        return HomePageContent::factory()->create([
            'description' => 'asd',
            'image' => 'image.png',
        ]);
    }

    private function createUser()
    {
        return User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => 'password',

        ]);
    }
}
