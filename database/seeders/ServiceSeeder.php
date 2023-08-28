<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name_service' => 'Wi-fi',
                'icon_service' => 'fa-solid fa-wifi',
            ],
            [
                'name_service' => 'Piscina',
                'icon_service' => 'fa-solid fa-person-swimming',
            ],
            [
                'name_service' => 'Palestra',
                'icon_service' => 'fa-solid fa-dumbbell',
            ],
            [
                'name_service' => 'Sauna',
                'icon_service' => 'fa-solid fa-hot-tub-person',
            ],
            [
                'name_service' => 'Vista mare',
                'icon_service' => 'fa-solid fa-water',
            ],
            [
                'name_service' => 'Posto auto',
                'icon_service' => 'fa-solid fa-square-parking',
            ],
            [
                'name_service' => 'Aria condizionata',
                'icon_service' => 'fa-solid fa-fan',
            ],
            [
                'name_service' => 'Riscaldamento',
                'icon_service' => 'fa-solid fa-temperature-arrow-up',
            ],
            [
                'name_service' => 'Colazione',
                'icon_service' => 'fa-solid fa-mug-saucer',
            ],
            [
                'name_service' => 'TV',
                'icon_service' => 'fa-solid fa-tv',

            ],
            [
                'name_service' => 'Cucina',
                'icon_service' => 'fa-solid fa-kitchen-set',
            ],
            [
                'name_service' => 'Lavatrice',
                'icon_service' => 'fa-solid fa-soap',

            ],
            [
                'name_service' => 'Ferro da stiro',
                'icon_service' => 'fa-solid fa-shirt',

            ],
            [
                'name_service' => 'Asciugacapelli',
                'icon_service' => 'fa-solid fa-wind',

            ],
            [
                'name_service' => 'Fumo permesso',
                'icon_service' => 'fa-solid fa-smoking',

            ],
            [
                'name_service' => 'Kit di pronto soccorso',
                'icon_service' => 'fa-solid fa-kit-medical',

            ],
            [
                'name_service' => 'Animali domestici ammessi',
                'icon_service' => 'fa-solid fa-dog',

            ],
            [
                'name_service' => 'Camino',
                'icon_service' => 'fa-solid fa-fire',

            ],
        ];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->name_service = $service['name_service'];
            $newService->icon_service = $service['icon_service'];
            $newService->save();
        }
    }
}
