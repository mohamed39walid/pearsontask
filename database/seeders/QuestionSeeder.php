<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            'question'=>'who is the best player in the world?',
            'answer'=>'messi',
        ]);
        DB::table('questions')->insert([
            'question'=>'what is the capital of germany?',
            'answer'=>'berlin',
        ]);
        
        DB::table('questions')->insert([
            'question'=>'who won the world cup in 2022?',
            'answer'=>'argentina',
        ]);
        
        DB::table('questions')->insert([
            'question'=>'what is the capital of bahrain?',
            'answer'=>'manama',
        ]);
        }
}
