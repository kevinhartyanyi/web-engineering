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
            'name' => "Teacher Jim",
            'email' => "email@email.com",
            'email_verified_at' => now(),
            'password' => Hash::make('abc123'), // password
            'remember_token' => Str::random(10),
            'teacher' => true,
        ]);

        User::create([
            'name' => "Student Leo",
            'email' => "student@email.com",
            'email_verified_at' => now(),
            'password' => Hash::make('abc123'), // password
            'remember_token' => Str::random(10),
            'teacher' => false,
        ]);

        User::factory(4)->create();

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
