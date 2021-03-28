<?php

namespace Database\Seeders;

use App\Models\Subjects;
use App\Models\Tasks;
use App\Models\Solutions;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        //DB::table('tasks')->truncate();

        $teachers = User::where('teacher', true);
        $students = User::where('teacher', false)->get()->map(function($student){return $student->id;});

        //print($students);

        $teachers->each(function ($teacher) use($students) {
            Subjects::factory(2)->for($teacher)->create()->each(function ($subjects) use($students) {
                $subjects->students()->attach($students);
            });
        });

        // $teachers->each(function ($teacher) {
        //     Subjects::factory(5)->for($teacher)->create();
        // });

        // $subjects = Subjects::all();


        // Subjects::factory(5)->create()->each(function ($subjects) {
        //     $subjects->tasks()->createMany(
        //         Tasks::factory(2)->for($subjects)->make()->toArray()
        //     );
        // });

        // Tasks::factory(5)->create()->each(function ($tasks) {
        //     $tasks->solutions()->createMany(
        //         Solutions::factory(3)->make()->toArray()
        //     );
        // });
    }
}
