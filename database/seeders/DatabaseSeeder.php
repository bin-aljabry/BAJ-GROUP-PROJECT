<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);

        $this->call([
            CompanySeeder::class,
            BranchSeeder::class,
        ]);
        $this->call([

            PackageSeeder::class,
            PaymentSeeder::class,
            NotificationSeeder::class,
        ]);
        
        $this->call(UserSeeder::class);
        $this->call(CountryStateCityTableSeeder::class);
        $this->call(CollectionSeeder::class);
        $this->call(CategorySeeder::class);

      
    }
}
