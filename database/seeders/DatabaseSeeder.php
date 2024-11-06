<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\idea;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'obaida1234@',
            'is_admin' => 1, 
        ]);

        $users->each(function ($user) {
            idea::factory()->create([
                'content' => $user->name . " Idea",
                'user_id' => $user->id,
            ]);
        });
    }
}
