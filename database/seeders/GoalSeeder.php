<?php

namespace Database\Seeders;

use App\Models\Goals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Goals::factory(10)->create(); 
    }
}
