<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LmsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(SubjectsSeeder::class);
        $this->call(TasksSeeder::class);
        $this->call(SolutionsSeeder::class);
    }
}
