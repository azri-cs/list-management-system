<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@azriadam.my',
            'password' => Hash::make('abcd1234'),
        ]);
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@azriadam.my',
            'password' => Hash::make('abcd1234'),
        ]);

        Tag::factory(10)->create();
        Listing::factory(5)->create([
            'created_by' => 2,
        ]);
    }
}
