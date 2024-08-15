<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Reman@112'),
        ])->assignRole('admin');

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('Reman@112'),
        ])->assignRole('user');
        \App\Models\User::factory()->create([
            'name' => 'Casheir',
            'email' => 'cashier@gmail.com',
            'password' => bcrypt('Reman@112'),
        ])->assignRole('Cashier');
        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'vendor@gmail.com',
            'password' => bcrypt('Reman@112'),
        ])->assignRole('vendor');
    }
}
