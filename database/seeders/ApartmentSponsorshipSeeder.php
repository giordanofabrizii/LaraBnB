<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ApartmentSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorNumber = 15;
        $sponsoredApartment = [];
        $apartmentNumber = 41;

        for ($i = 0; $i < $sponsorNumber; $i++) {
            $sponsorId = rand(1,3);
            $sponsor = Sponsorship::findOrFail($sponsorId);
            $start_date = Carbon::now('Europe/Rome');
            $end_date = $start_date->copy()->addHours($sponsor->period);

            // create transactions
            $braintree_id = 'fake0' . $i;
            $amount = $sponsor->price;

            DB::table('transactions')->insert([
                'braintree_id' => $braintree_id,
                'status' => 'success',
                'amount' => $amount,
            ]);

            // create sponsorships
            $apartment = rand(1, $apartmentNumber);
            while (in_array($apartment, $sponsoredApartment)) { // always a new apartment
                $apartment = rand(1, $apartmentNumber);
            }


            DB::table('apartment_sponsorship_transaction')->insert([
                'apartment_id' => $apartment,
                'sponsorship_id' => $sponsorId,
                'transaction_id' => $i + 1,
                'start_date' => $start_date,
                'end_date' => $end_date,
            ]);
        }
    }
}
