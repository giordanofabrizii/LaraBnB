<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class VisualizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $apartmentNumber = 41;
        $monthsBack = 5;

        for ($apartmentId = 1; $apartmentId <= $apartmentNumber; $apartmentId++) { //foreach apartment

            // each month
            for ($i = 0; $i < $monthsBack; $i++) {
                $startDate = Carbon::now()->subMonths($i)->startOfMonth();
                $endDate = Carbon::now()->subMonths($i)->endOfMonth();

                // random number of views
                $viewsCount = rand(1, 10);

                // generate the views
                for ($j = 0; $j < $viewsCount; $j++) {
                    DB::table('visualizations')->insert([
                        'apartment_id' => $apartmentId,
                        'date' => $faker->dateTimeBetween($startDate, $endDate),
                        'user_ip' => $faker->ipv4,
                    ]);
                }
            }
        }
    }
}
