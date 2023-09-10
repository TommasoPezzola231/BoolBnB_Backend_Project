<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\View;
use Carbon\Carbon;
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
        $apartmentIDs = Apartment::all('id');

        // Calcola la data di oggi
        $today = Carbon::now();

        for ($year = 2020; $year <= 2023; $year++) {
            $endDate = $year == 2023 ? $today : Carbon::create($year, 12, 31);

            for ($i = 0; $i < 4000; $i++) {
                $newView = new View();

                $newView->apartment_id = $apartmentIDs->random()->id;
                $newView->ip_address = $faker->ipv4();
                $newView->viewed_at = Carbon::create($year, $faker->numberBetween(1, 12), $faker->numberBetween(1, 28));

                // Assicurati che la data della visualizzazione sia entro la data di fine dell'anno
                $newView->viewed_at->endOfDay(); // Imposta l'orario alla fine del giorno

                if ($newView->viewed_at->gt($endDate)) {
                    $newView->viewed_at = $endDate;
                }

                $newView->save();
            }
        }
    }
}
