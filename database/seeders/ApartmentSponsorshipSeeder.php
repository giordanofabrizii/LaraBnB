<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApartmentSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ApartmentsSponsorship = [
            [
                'apartment_id' => 3,
                'sponsorship_id' => 1,
                'start_date' => '2024-09-01 12:55:00',
                'end_date' => '2024-09-02 12:55:00',
            ],
            [
                'apartment_id' => 7,
                'sponsorship_id' => 2,
                'start_date' => '2024-08-01 08:23:00',
                'end_date' => '2024-08-04 08:23:00',
            ],
            [
                'apartment_id' => 10,
                'sponsorship_id' => 3,
                'start_date' => '2024-06-01 22:34:00',
                'end_date' => '2024-06-07 22:34:00',
            ],
        ];

        foreach ($ApartmentsSponsorship as $ApSpData) {
            // insert the values in the DB
            DB::table('apartment_sponsorship')->insert([
                'apartment_id' => $ApSpData['apartment_id'],
                'sponsorship_id' => $ApSpData['sponsorship_id'],
                'start_date' => $ApSpData['start_date'],
                'end_date' => $ApSpData['end_date'],
            ]);
        }
    }
}
