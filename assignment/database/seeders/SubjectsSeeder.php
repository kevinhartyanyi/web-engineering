<?php

namespace Database\Seeders;

use App\Models\Subjects;
use App\Models\Tasks;
use App\Models\Solutions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->truncate();
        DB::table('tasks')->truncate();


        Subjects::factory(5)->create()->each(function ($subjects) {
            $subjects->tasks()->createMany(
                Tasks::factory(2)->for($subjects)->make()->toArray()
            );
        });

        // Tasks::factory(5)->create()->each(function ($tasks) {
        //     $tasks->solutions()->createMany(
        //         Solutions::factory(3)->make()->toArray()
        //     );
        // });
    }
}
