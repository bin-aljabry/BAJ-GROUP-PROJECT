<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run()
    {
        Payment::create([
            'company_id' => 1,
            'package_id' => 1,
            'amount' => 50000,
            'status' => 'paid',
        ]);

        Payment::create([
            'company_id' => 2,
            'package_id' => 2,
            'amount' => 100000,
            'status' => 'unpaid',
        ]);
    }

}
