<?php

namespace Database\Seeders;

use App\Models\Subjects;
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
        Subjects::factory(5)->create();
    }
}
