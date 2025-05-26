<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'admin']);
         Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Teller']);
        Role::create(['name' => 'Sales']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'Cashier']);
        Role::create(['name' => 'Technician']);
        Role::create(['name' => 'customer']);
        Role::create(['name' => 'supplier']);

    }
}
