<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Aria Condizionata',
                'icon' => "fa-solid fa-wind",
            ],
            [
                'name' => 'Piscina',
                'icon' => "fa-solid fa-water-ladder",
            ],
            [
                'name' => 'Giardino',
                'icon' => "fa-solid fa-tree",
            ],
            [
                'name' => 'Vista cortile interno',
                'icon' => "fa-brands fa-pagelines",
            ],
            [
                'name' => 'Portico',
                'icon' => "fa-solid fa-shop",
            ],
            [
                'name' => 'Lavastoviglie',
                'icon' => "fa-solid fa-kitchen-set",
            ],
            [
                'name' => 'Lavatrice',
                'icon' => "fa-solid fa-shirt",
            ],
            [
                'name' => 'Wifi',
                'icon' => "fa-solid fa-wifi",
            ],
            [
                'name' => 'Smart-Tv',
                'icon' => "fa-solid fa-tv",
            ],
            [
                'name' => 'Barbecue',
                'icon' => "fa-solid fa-table-cells",
            ],
            [
                'name' => 'Vasca da Bagno',
                'icon' => "fa-solid fa-bath",
            ],
            [
                'name' => 'Jacuzzi',
                'icon' => "fa-solid fa-hot-tub-person",
            ],
            [
                'name' => 'Ascensore',
                'icon' => "fa-solid fa-elevator",
            ],
            [
                'name' => 'Accessibilità',
                'icon' => "fa-solid fa-wheelchair-move",
            ],
            [
                'name' => 'Riscaldamento',
                'icon' => "fa-solid fa-temperature-arrow-up",
            ],
            [
                'name' => 'Microonde',
                'icon' => "fa-solid fa-bread-slice",
            ],
            [
                'name' => 'Parcheggio',
                'icon' => '"fa-solid fa-square-parking"',
            ],
            [
                'name' => 'Bidet',
                'icon' => "fa-solid fa-sink",
            ],
            [
                'name' => 'Ferro da Stiro',
                'icon' => "fa-solid fa-shirt",
            ],
            [
                'name' => 'Kit di pronto soccorso',
                'icon' => "fa-solid fa-kit-medical",
            ],
            [
                'name' => 'Macchina del caffè',
                'icon' => "fa-solid fa-mug-saucer",
            ],
        ];

        foreach ($services as $serviceData) {
            $newService = new Service();
            $newService->name = $serviceData['name'];
            $newService->icon = $serviceData['icon'];
            $newService->save();
        }
    }
}
