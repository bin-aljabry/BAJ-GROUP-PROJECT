<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        \App\Models\company_branches::factory()->create([
            'company_id' => '1',
            'name' => 'AJO',
            'location' => 'ilala',
        ]);

    }
}
