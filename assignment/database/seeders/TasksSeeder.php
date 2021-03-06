<?php

namespace Database\Seeders;

use App\Models\Tasks;
use App\Models\Solutions;
use App\Models\Subjects;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->truncate();

        $subjects = Subjects::all();

        $subjects->each(function ($subject) {
            Tasks::factory(2)->for($subject)->create();
        });

        // DB::table('tasks')->truncate();
        // DB::table('solutions')->truncate();

        // Tasks::factory(5)->has(Solutions::factory()->count(2))->create(); alternative


        // Tasks::factory(5)->create()->each(function ($tasks) {
        //     $tasks->solutions()->createMany(
        //         Solutions::factory(3)->make()->toArray()
        //     );
        // });
    }
}
