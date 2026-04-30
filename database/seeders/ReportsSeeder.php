<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportsSeeder extends Seeder
{
            public function run(): void
            {
               Report::factory()->count(10)->create();
            }
        
}
