<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Section;
use App\Models\AccountType;
use App\Models\RealEstateType;
use App\Models\HomePageContent;
use App\Models\Order;
use Illuminate\Database\Seeder;
use App\Models\RealEstateCategory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'confirm_password' => bcrypt('password'),
            'phone' => '123',
        ]);

        HomePageContent::factory(10)->create();
        Section::factory(10)->create();
        AccountType::factory(5)->create();
        RealEstateCategory::factory(20)->create();
        RealEstateType::factory(2)->create();
        Order::factory(10)->create();


    }
}
