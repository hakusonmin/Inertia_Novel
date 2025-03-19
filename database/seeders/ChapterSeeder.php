<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chapters')->insert([
            [
                'id' => 1,
                'title' => 'chapter_hoge',
                'novel_id' => 1,
            ],
            [
                'id' => 2,
                'title' => 'chapter_hoge2',
                'novel_id' => 1,
            ],
            [
                'id' => 3,
                'title' => 'chapter_hoge3',
                'novel_id' => 1,
            ],
        ]);
    }
}
