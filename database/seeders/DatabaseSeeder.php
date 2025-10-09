<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ["email" => 'user@user.com'],
            ["name" => "user",
            "password" => Hash::make('123123123')]
            //"role" =>  "user"]
        );
        $user->profile()->updateOrCreate(
            ['username' =>"user"],
            ['name' =>"user user",
            'gender' =>"male",
            'country' =>"Russia",
            'date_of_birth' => fake()->date("Y-m-d")
        ]);
        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
            GroupSeeder::class
        ]);
    }

}
