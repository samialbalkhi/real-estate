<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AccountType;
use App\Models\Advertisement;
use App\Models\HomePageContent;
use App\Models\LoanTerm;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use App\Models\RealEstateCategory;
use App\Models\RealEstateType;
use App\Models\Report;
use App\Models\Review;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'password_confirmation' => bcrypt('password'),
            'phone' => '123',
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => 'password',
            'password_confirmation' => bcrypt('password'),
            'phone' => '123213312',
        ]);

        HomePageContent::factory(1)->create();
        Section::factory(10)->create();
        AccountType::factory(5)->create();
        RealEstateCategory::factory(20)->create();
        RealEstateType::factory(2)->create();
        Order::factory(10)->create();
        Advertisement::factory(100)->create();
        Offer::factory(20)->create();
        Product::factory(100)->create();
        Review::factory(50)->create();
        LoanTerm::factory(30)->create();
        Report::factory(30)->create();
    }
}
