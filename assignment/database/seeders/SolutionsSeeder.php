<?php

namespace Database\Seeders;

use App\Models\Solutions;
use App\Models\Tasks;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('solutions')->truncate();

        $tasks = Tasks::all();

        $tasks->each(function ($task) {
            Solutions::factory(3)->for($task)->create();
        });

        // Solutions::factory(5)->create();
    }
}
