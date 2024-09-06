<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "Mirko",
                "lastname" => "Valle",
                "email" => "mirko@gmail.com",
                "password" => "mirko123",
                "birthdate" => "2000-10-31",
            ],
            [
                "name" => "Elisabetta",
                "lastname" => "Mirti",
                "email" => "belmirti@gmail.com",
                "password" => "mirko123",
                "birthdate" => "1993-07-04",
            ],
            [
                "name" => "Lorenzo",
                "lastname" => "Picchi",
                "email" => "l.picchi5896@gmail.com",
                "password" => "mirko123",
                "birthdate" => "1996-08-05",
            ],
            [
                "name" => "Giordano",
                "lastname" => "Fabrizi",
                "email" => "giordano@gmail.com",
                "password" => "mirko123",
                "birthdate" => "2003-02-17",
            ],
        ];

        foreach ($users as $userData) {
            $user = new User();
            $user->name = $userData['name'];
            $user->lastname = $userData['lastname'];
            $user->email = $userData['email'];
            $user->password = bcrypt($userData['password']);
            $user->birthdate = $userData['birthdate'];
            $user->save();
        }
    }
}
