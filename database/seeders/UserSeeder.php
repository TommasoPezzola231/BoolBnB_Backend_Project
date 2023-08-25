<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $data_users = [
            [

                "name" => "Mone",
                "surname" => "Sansi",
                "birth_date" => "1975/07/04",
                "email" => "Sansimone@ciao.it",
                "password" => '$2y$10$nsKQuan86Z9wevj6qUnz1ext8DIDWWZp49Au6dT1xjeZ0fIUDzbn.',
            ],
            [
                "name" => "Marino",
                "surname" => "Caro",
                "birth_date" => "1955/07/04",
                "email" => "caro@Marino.it",
                "password" => '$2y$10$nsKQuan86Z9wevj6qUnz1ext8DIDWWZp49Au6dT1xjeZ0fIUDzbn.',
            ],
            [
                "name" => "Nessi",
                "surname" => "Loch",
                "birth_date" => "2003/03/04",
                "email" => "L.Nessi@lake.it",
                "password" => '$2y$10$nsKQuan86Z9wevj6qUnz1ext8DIDWWZp49Au6dT1xjeZ0fIUDzbn.',
            ],
            [

                "name" => "Roberto",
                "surname" => "Ciccone",
                "birth_date" => "2001/10/02",
                "email" => "Ciccio@berto.it",
                "password" => '$2y$10$nsKQuan86Z9wevj6qUnz1ext8DIDWWZp49Au6dT1xjeZ0fIUDzbn.',
            ],
        ];

        foreach ($data_users as $data_user) {
            User::create($data_user);
        }
    }
}
