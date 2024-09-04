<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApartmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ApartmentService = [
            [
                'apartment_id' => 3,
                'service_id' => 10,
            ],
            [
                'apartment_id' => 5,
                'service_id' => 1,
            ],
            [
                'apartment_id' => 3,
                'service_id' => 11,
            ],
            [
                'apartment_id' => 6,
                'service_id' => 4,
            ],
        ];

        foreach ($ApartmentService as $ApSeData) {
            // insert the values in the DB
            DB::table('apartment_service')->insert([
                'apartment_id' => $ApSeData['apartment_id'],
                'service_id' => $ApSeData['service_id'],
            ]);
        }
    }
}
