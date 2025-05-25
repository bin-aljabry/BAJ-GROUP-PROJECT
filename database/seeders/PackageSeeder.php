<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;
class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //\

        Package::create([
            'name' => 'Basic',
            'description' => 'For small businesses',
            'price' => 50000,
            'duration' => 30,
        ]);

        Package::create([
            'name' => 'Pro',
            'description' => 'For medium businesses',
            'price' => 100000,
            'duration' => 60,
        ]);
    }
}
