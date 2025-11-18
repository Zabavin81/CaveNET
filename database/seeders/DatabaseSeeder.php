<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate(
            ['title' => 'admin'],
        );
        $user = User::firstOrCreate(
            ["email" => 'user@user.com'],
            ["name" => "user",
            "password" => Hash::make('123123123')]
        );
        $user->roles()->attach($role->id);
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
