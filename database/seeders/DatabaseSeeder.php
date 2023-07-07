<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // creates dummy data
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // php artisan db:seed
        // to clear this: php artisan migrate:refresh
        // to refresh and seed, add --seed

        // User::factory(10)->create([]);

        // create single user
        $user = User::factory()->create([
            'name' => 'Georgina Awani',
            'email' => 'georginaawani@gmail.com',
        ]);

        // pass in user id
        Listing::factory(10)->create([
            'user_id' => $user->id
        ]);

        // creates dummy users
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
