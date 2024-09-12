<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;
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
        $number_of_apartments = Apartment::count();
        $number_of_services = Service::count();

        $ApartmentService = []; // array of correlations
        $apartment_ids = range(1, $number_of_apartments);
        $service_ids = range(1, $number_of_services);

        foreach ($apartment_ids as $apartment_id) {
            $num_services = rand(1, 4); // from 1 to 4 services per apartment

            $selected_services = array_rand(array_flip($service_ids), $num_services); // select the services randomly

            if (!is_array($selected_services)) { // force to be an array
                $selected_services = [$selected_services];
            }

            // Aggiungere le associazioni all'array
            foreach ($selected_services as $service_id) {
                $ApartmentService[] = [
                    'apartment_id' => $apartment_id,
                    'service_id' => $service_id,
                ];
            }
        }

        DB::table('apartment_service')->insert($ApartmentService); // insert the datas
    }
}
