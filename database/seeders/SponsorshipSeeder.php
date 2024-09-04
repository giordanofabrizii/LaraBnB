<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorships = [
            [
                'name' => 'Silver',
                'period' => 24,
                'price' => 2.99,
            ],
            [
                'name' => 'Gold',
                'period' => 72,
                'price' => 5.99,
            ],
            [
                'name' => 'Platinum',
                'period' => 144,
                'price' => 9.99,
            ],
        ];

        foreach ($sponsorships as $sponsorshipData) {
            $newSponsorship = new Sponsorship();
            $newSponsorship->name = $sponsorshipData['name'];
            $newSponsorship->period = $sponsorshipData['period'];
            $newSponsorship->price = $sponsorshipData['price'];
            $newSponsorship->save();
        }
    }
}
