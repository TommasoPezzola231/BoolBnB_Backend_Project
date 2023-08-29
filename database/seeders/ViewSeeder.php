<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\View;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartmentID = Apartment::all(["id"]);

        for ($i=0; $i < 10000; $i++) { 
            $newView = new View();

            $newView->apartment_id = $apartmentID->random()->id;
            $newView->ip_adress = $faker->ipv4();
            $newView->viewed_at = now();

            $newView->save();
        }
    }
}
