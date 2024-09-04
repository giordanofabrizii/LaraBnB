<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visualization;

class VisualizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visualizations = [
            [
                'apartment_id' => 1,
                'date' => '2024-09-01 14:23:45',
                'user_ip' => '192.168.1.10',
            ],
            [
                'apartment_id' => 2,
                'date' => '2024-09-01 15:45:32',
                'user_ip' => '192.168.1.11',
            ],
            [
                'apartment_id' => 3,
                'date' => '2024-09-02 09:12:11',
                'user_ip' => '192.168.1.12',
            ],
            [
                'apartment_id' => 1,
                'date' => '2024-09-02 11:34:29',
                'user_ip' => '192.168.1.13',
            ],
            [
                'apartment_id' => 4,
                'date' => '2024-09-03 08:56:23',
                'user_ip' => '192.168.1.14',
            ],
            [
                'apartment_id' => 5,
                'date' => '2024-09-03 10:17:44',
                'user_ip' => '192.168.1.15',
            ],
            [
                'apartment_id' => 2,
                'date' => '2024-09-03 12:22:37',
                'user_ip' => '192.168.1.16',
            ]
        ];

        foreach ($visualizations as $visualizationData) {
            $newVisualization = new Visualization();
            $newVisualization->apartment_id = $visualizationData['apartment_id'];
            $newVisualization->date = $visualizationData['date'];
            $newVisualization->user_ip = $visualizationData['user_ip'];
            $newVisualization->save();
        }
    }
}
