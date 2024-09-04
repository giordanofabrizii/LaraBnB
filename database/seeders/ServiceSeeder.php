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
                'icon' => 'prova',
            ],
            [
                'name' => 'Piscina',
                'icon' => 'prova',
            ],
            [
                'name' => 'Giardino',
                'icon' => 'prova',
            ],
            [
                'name' => 'Vista cortile interno',
                'icon' => 'prova',
            ],
            [
                'name' => 'Patio',
                'icon' => 'prova',
            ],
            [
                'name' => 'Lavastoviglie',
                'icon' => 'prova',
            ],
            [
                'name' => 'Lavatrice',
                'icon' => 'prova',
            ],
            [
                'name' => 'Wifi',
                'icon' => 'prova',
            ],
            [
                'name' => 'Smart-Tv',
                'icon' => 'prova',
            ],
            [
                'name' => 'Barbecue',
                'icon' => 'prova',
            ],
            [
                'name' => 'Vasca da Bagno',
                'icon' => 'prova',
            ],
            [
                'name' => 'Jacuzzi',
                'icon' => 'prova',
            ],
            [
                'name' => 'Ascensore',
                'icon' => 'prova',
            ],
            [
                'name' => 'Accessibilità',
                'icon' => 'prova',
            ],
            [
                'name' => 'Riscaldamento',
                'icon' => 'prova',
            ],
            [
                'name' => 'Microonde',
                'icon' => 'prova',
            ],
            [
                'name' => 'Parcheggio',
                'icon' => 'prova',
            ],
            [
                'name' => 'Bidet',
                'icon' => 'prova',
            ],
            [
                'name' => 'Ferro da Stiro',
                'icon' => 'prova',
            ],
            [
                'name' => 'Kit di pronto soccorso',
                'icon' => 'prova',
            ],
            [
                'name' => 'Macchina del caffè',
                'icon' => 'prova',
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
