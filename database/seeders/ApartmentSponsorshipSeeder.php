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
                'apartment_id' => 1,
                'sponsorship_id' => 1,
                'start_date' => '2024-09-01 12:55:00',
                'end_date' => '2024-09-15 12:55:00',
            ],
            [
                'apartment_id' => 2,
                'sponsorship_id' => 2,
                'start_date' => '2024-08-01 08:23:00',
                'end_date' => '2024-08-15 08:23:00',
            ],
            [
                'apartment_id' => 3,
                'sponsorship_id' => 3,
                'start_date' => '2024-07-01 22:34:00',
                'end_date' => '2024-07-15 22:34:00',
            ],
            [
                'apartment_id' => 4,
                'sponsorship_id' => 1,
                'start_date' => '2024-09-10 10:00:00',
                'end_date' => '2024-09-20 10:00:00',
            ],
            [
                'apartment_id' => 5,
                'sponsorship_id' => 2,
                'start_date' => '2024-08-05 09:30:00',
                'end_date' => '2024-08-12 09:30:00',
            ],
            [
                'apartment_id' => 6,
                'sponsorship_id' => 3,
                'start_date' => '2024-06-10 15:00:00',
                'end_date' => '2024-06-20 15:00:00',
            ],
            [
                'apartment_id' => 7,
                'sponsorship_id' => 1,
                'start_date' => '2024-09-05 14:45:00',
                'end_date' => '2024-09-15 14:45:00',
            ],
            [
                'apartment_id' => 8,
                'sponsorship_id' => 2,
                'start_date' => '2024-08-10 11:00:00',
                'end_date' => '2024-08-20 11:00:00',
            ],
            [
                'apartment_id' => 9,
                'sponsorship_id' => 3,
                'start_date' => '2024-07-15 16:30:00',
                'end_date' => '2024-07-25 16:30:00',
            ],
            [
                'apartment_id' => 10,
                'sponsorship_id' => 1,
                'start_date' => '2024-09-20 13:15:00',
                'end_date' => '2024-10-01 13:15:00',
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
