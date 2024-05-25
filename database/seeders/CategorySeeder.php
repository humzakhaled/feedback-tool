<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['title' => 'Bug Report'],
            ['title' => 'Feature Request'],
            ['title' => 'Improvement'],
            ['title' => 'General Feedback'],
            ['title' => 'User Experience'],
        ];

        DB::table('categories')->insert($categories);
    }
}
