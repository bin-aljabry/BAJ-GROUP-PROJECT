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
            'company_id' => '1',
            'created_by' => 'admin',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Reman@112'),
        ])->assignRole('admin');

        \App\Models\User::factory()->create([
            'company_id' => '1',
            'created_by' => 'admin',
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('Reman@112'),
        ])->assignRole('user');
        \App\Models\User::factory()->create([
'company_id' => '1',
'created_by' => 'admin',
            'name' => 'Casheir',
            'email' => 'cashier@gmail.com',
            'password' => bcrypt('Reman@112'),
        ])->assignRole('Cashier');
 \App\Models\User::factory()->create([
'company_id' => '1',
'created_by' => 'admin',
            'name' => 'Manager ',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('Reman@112'),
        ])->assignRole('Manager');

         \App\Models\User::factory()->create([
'company_id' => '1',
'created_by' => 'admin',
            'name' => 'Teller ',
            'email' => 'teller@gmail.com',
            'password' => bcrypt('Reman@112'),
        ])->assignRole('Teller');

        \App\Models\User::factory()->create([
'company_id' => '1',
'created_by' => 'SuperAdmin',
            'name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('Reman@112'),
        ])->assignRole('Super Admin');

        \App\Models\User::factory()->create([
'company_id' => '1',
'created_by' => 'admin',
            'name' => 'Sales Officer',
            'email' => 'sales@gmail.com',
            'password' => bcrypt('Reman@112'),
        ])->assignRole('Sales');

        \App\Models\User::factory()->create([
           'company_id' => '1',
          'created_by' => 'admin',
            'name' => 'Technician',
            'email' => 'technician@gmail.com',
            'password' => bcrypt('Reman@112'),
        ])->assignRole('technician');
    }
}
