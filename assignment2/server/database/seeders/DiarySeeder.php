<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\Diary;

use Illuminate\Database\Seeder;

class DiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diaries')->truncate();
        Diary::factory(10)->create();
    }
}
