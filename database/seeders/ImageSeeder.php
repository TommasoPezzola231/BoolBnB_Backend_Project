<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Mockery\Matcher\Type;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $apartmentsID = Apartment::all(["id"]);

        for ($i=1; $i < 30; $i++) { 
            $newImage = new Image();

            $newImage->Image_url = $faker->image();
            $newImage->apartment_id = $apartmentsID->random()->id;

            $newImage->save();
        }
    }
}
