<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => "Prof. Lawson Mraz III",
            'email' => "teacher1@email.com",
            'email_verified_at' => now(),
            'password' => Hash::make('abc123456'), // password
            'remember_token' => Str::random(10),
            'teacher' => true,
        ]);

        User::create([
            'name' => "Dr. Antonette Berge MD",
            'email' => "teacher2@email.com",
            'email_verified_at' => now(),
            'password' => Hash::make('abc123456'), // password
            'remember_token' => Str::random(10),
            'teacher' => true,
        ]);

        User::create([
            'name' => "Adelia Jones",
            'email' => "student1@email.com",
            'email_verified_at' => now(),
            'password' => Hash::make('abc123456'), // password
            'remember_token' => Str::random(10),
            'teacher' => false,
        ]);

        User::create([
            'name' => "Ben Johnson",
            'email' => "student2@email.com",
            'email_verified_at' => now(),
            'password' => Hash::make('abc123456'), // password
            'remember_token' => Str::random(10),
            'teacher' => false,
        ]);

        //User::factory(4)->create();

        // User::create([
        // 'name' => 'Jon Doe',
        // 'email' => 'jon@gmail.com',
        // 'password' => Hash::make('abc123'),
        // 'teacher' => false,
        // ]);
        // User::create([
        // 'name' => 'Teacher Jim',
        // 'email' => 'jim@gmail.com',
        // 'password' => Hash::make('abc123'),
        // 'teacher' => true,
        // ]);
    }
}
