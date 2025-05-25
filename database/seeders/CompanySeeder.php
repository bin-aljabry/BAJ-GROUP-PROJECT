<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\company::factory()->create([

            'name' => 'AJO',
            'brand' => 'AJO',
          'address' => 'Dar',
          'slug' => 'Dar',
            'email' => 'superadmin@gmail.com',
            'phone' => '0686100150',


        ]);


        \App\Models\company::factory()->create([

                'name' => 'BAJO Group Ltd',
                'brand' => 'AJO',
                'address' => 'Dar',
                'slug' => 'kil',
                'email' => 'info@bajo.com',
                'phone' => '0755000001',

            ]);

            \App\Models\company::factory()->create([

                'name' => 'Sample Co. Ltd',
                'email' => 'sample@company.com',
                'phone' => '0788000002',
                'brand' => 'AJO',
                'address' => 'Dar',
                'slug' => 'zan',
            ]);
        }
    }

