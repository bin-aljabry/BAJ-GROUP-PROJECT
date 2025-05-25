<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notification;
class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run()
    {
        Notification::create([
            'company_id' => 1,
            'type' => 'complaint',
            'message' => 'System inasuasua asubuhi.',
        ]);

        Notification::create([
            'company_id' => 2,
            'type' => 'suggestion',
            'message' => 'Ongeza uwezo wa kuchapisha invoice kwa Kiswahili.',
        ]);
    }

}
