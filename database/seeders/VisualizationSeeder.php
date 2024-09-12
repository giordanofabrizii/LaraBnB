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
            ['apartment_id' => 6, 'date' => '2024-09-01 12:10:21', 'user_ip' => '192.168.1.20'],
            ['apartment_id' => 7, 'date' => '2024-09-01 13:45:54', 'user_ip' => '192.168.1.21'],
            ['apartment_id' => 8, 'date' => '2024-09-01 16:32:17', 'user_ip' => '192.168.1.22'],
            ['apartment_id' => 9, 'date' => '2024-09-02 09:50:33', 'user_ip' => '192.168.1.23'],
            ['apartment_id' => 10, 'date' => '2024-09-02 11:05:49', 'user_ip' => '192.168.1.24'],
            ['apartment_id' => 6, 'date' => '2024-09-02 13:20:07', 'user_ip' => '192.168.1.25'],
            ['apartment_id' => 12, 'date' => '2024-09-03 14:33:15', 'user_ip' => '192.168.1.26'],
            ['apartment_id' => 13, 'date' => '2024-09-03 16:05:29', 'user_ip' => '192.168.1.27'],
            ['apartment_id' => 14, 'date' => '2024-09-03 18:40:10', 'user_ip' => '192.168.1.28'],
            ['apartment_id' => 15, 'date' => '2024-09-04 09:25:18', 'user_ip' => '192.168.1.29'],
            ['apartment_id' => 16, 'date' => '2024-09-04 11:00:42', 'user_ip' => '192.168.1.30'],
            ['apartment_id' => 7, 'date' => '2024-09-04 13:55:21', 'user_ip' => '192.168.1.31'],
            ['apartment_id' => 18, 'date' => '2024-09-05 10:12:56', 'user_ip' => '192.168.1.32'],
            ['apartment_id' => 19, 'date' => '2024-09-05 11:45:33', 'user_ip' => '192.168.1.33'],
            ['apartment_id' => 20, 'date' => '2024-09-05 13:25:42', 'user_ip' => '192.168.1.34'],
            ['apartment_id' => 8, 'date' => '2024-09-06 10:55:27', 'user_ip' => '192.168.1.35'],
            ['apartment_id' => 22, 'date' => '2024-09-06 12:30:39', 'user_ip' => '192.168.1.36'],
            ['apartment_id' => 23, 'date' => '2024-09-06 15:05:18', 'user_ip' => '192.168.1.37'],
            ['apartment_id' => 24, 'date' => '2024-09-07 09:40:22', 'user_ip' => '192.168.1.38'],
            ['apartment_id' => 25, 'date' => '2024-09-07 11:15:49', 'user_ip' => '192.168.1.39'],
            ['apartment_id' => 26, 'date' => '2024-09-07 13:50:31', 'user_ip' => '192.168.1.40'],
            ['apartment_id' => 27, 'date' => '2024-09-08 09:05:33', 'user_ip' => '192.168.1.41'],
            ['apartment_id' => 28, 'date' => '2024-09-08 11:30:22', 'user_ip' => '192.168.1.42'],
            ['apartment_id' => 33, 'date' => '2024-09-08 14:10:41', 'user_ip' => '192.168.1.43'],
            ['apartment_id' => 30, 'date' => '2024-09-09 10:45:53', 'user_ip' => '192.168.1.44'],
            ['apartment_id' => 31, 'date' => '2024-09-09 12:20:34', 'user_ip' => '192.168.1.45'],
            ['apartment_id' => 9, 'date' => '2024-09-09 15:30:12', 'user_ip' => '192.168.1.46'],
            ['apartment_id' => 33, 'date' => '2024-09-10 10:35:15', 'user_ip' => '192.168.1.47'],
            ['apartment_id' => 34, 'date' => '2024-09-10 12:50:23', 'user_ip' => '192.168.1.48'],
            ['apartment_id' => 35, 'date' => '2024-09-10 14:55:44', 'user_ip' => '192.168.1.49'],
            ['apartment_id' => 36, 'date' => '2024-09-11 09:55:30', 'user_ip' => '192.168.1.50'],
            ['apartment_id' => 40, 'date' => '2024-09-11 11:20:29', 'user_ip' => '192.168.1.51'],
            ['apartment_id' => 9, 'date' => '2024-09-11 13:45:55', 'user_ip' => '192.168.1.52'],
            ['apartment_id' => 39, 'date' => '2024-09-12 10:10:15', 'user_ip' => '192.168.1.53'],
            ['apartment_id' => 40, 'date' => '2024-09-12 11:35:42', 'user_ip' => '192.168.1.54'],
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
