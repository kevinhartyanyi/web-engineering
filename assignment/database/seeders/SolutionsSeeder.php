<?php

namespace Database\Seeders;

use App\Models\Solutions;
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
        Solutions::factory(5)->create();
    }
}
