<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\View;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // for ($i = 0; $i < 10000; $i++) {

        //     $apartment_id = Apartment::inRandomOrder()->first()->id;

        //     $view = new View();

        //     $view->apartment_id = $apartment_id;
        //     $view->ip = $faker->ipv4;
        //     $view->viewed_at = $faker->dateTime('now');

        //     $view->save();
        // }
    }
}
