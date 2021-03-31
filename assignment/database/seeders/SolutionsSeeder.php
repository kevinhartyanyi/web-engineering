<?php

namespace Database\Seeders;

use App\Models\Solutions;
use App\Models\Tasks;
use App\Models\User;
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
        $students = User::where('teacher', false);

        $tasks->each(function ($task) use($students) {
            $students->each(function ($student) use($task) {
                if ($student->id == 3) {
                    Solutions::factory(1)->for($task)->for($student)->create();
                }
            });
        });

        // Solutions::factory(5)->create();
    }
}
