<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder as UserSeeder;
use Database\Seeders\ServiceSeeder as ServiceSeeder;
use Database\Seeders\ApartmentSeeder as ApartmentSeeder;
use Database\Seeders\MessageSeeder as MessageSeeder;
use Database\Seeders\VisualizationSeeder as VisualizationSeeder;
use Database\Seeders\SponsorshipSeeder as SponsorshipSeeder;
use Database\Seeders\ApartmentSponsorshipSeeder as ApartmentSponsorshipSeeder;
use Database\Seeders\ApartmentServiceSeeder as ApartmentServiceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ServiceSeeder::class,
            ApartmentSeeder::class,
            MessageSeeder::class,
            VisualizationSeeder::class,
            SponsorshipSeeder::class,
            ApartmentSponsorshipSeeder::class,
            ApartmentServiceSeeder::class,
        ]);
    }
}
