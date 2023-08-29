<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Image;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        Schema::disableForeignKeyConstraints();
        Apartment::truncate();
        Schema::enableForeignKeyConstraints();

        $apartments = [
            [
                'user_id' => 1,
                'title' => 'Appartamento elegante nel centro storico',
                'principal_image' => 'path/immagine.jpg',
                'description' => 'Spazioso appartamento nel cuore della city, arredato con stile e comfort.',
                'price' => 120,
                'country' => 'Italia',
                'city' => 'Roma',
                'num_rooms' => 3,
                'num_bathrooms' => 2,
                'square_meters' => 100,
                'address' => 'Via del Corso, 123',
                "service" => ["Wi-fi", "Palestra"],
                'latitude' => 43.86987,
                'longitude' => 11.01201,
                'visible' => 1
            ],
            [
                'user_id' => 2,
                'title' => 'Appartamento accogliente vicino alla spiaggia',
                'principal_image' => 'path/immagine2.jpg',
                'description' => 'Appartamento luminoso a pochi passi dalla spiaggia, ideale per le vacanze estive.',
                'price' => 80,
                'country' => 'Italia',
                'city' => 'Roma',
                'num_rooms' => 2,
                'num_bathrooms' => 1,
                'square_meters' => 75,
                'address' => 'Viale delle Palme, 45',
                "service" => ["Wi-fi", "Palestra"],
                'latitude' => 43.18608,
                'longitude' => 10.55127,
                'visible' => 1
            ],
            [
                'user_id' => 1,
                'title' => 'Appartamento elegante nel centro storico',
                'pricipal_img' => 'img1.jpg',
                'description' => 'Splendido appartamento nel cuore della city, arredato con stile.',
                'price' => 150,
                'country' => 'Italia',
                'city' => 'Roma',
                'num_rooms' => 2,
                'num_bathrooms' => 1,
                'square_meters' => 80,
                'address' => 'Via Roma 123',
                'service' => ['Wi-fi', 'Aria condizionata', 'Colazione'],
                'latitude' => 41.35988,
                'longitude' => 15.30843,
                'visible' => 1
            ],
            [
                'user_id' => 4,
                'title' => 'Appartamento moderno con vista panoramica',
                'pricipal_img' => 'img2.jpg',
                'description' => 'Appartamento di lusso con una vista mozzafiato sulla city.',
                'price' => 200,
                "country" => "Italia",
                "city" => "Roma",
                'num_rooms' => 3,
                'num_bathrooms' => 2,
                'square_meters' => 120,
                'address' => 'Via Milano 456',
                'service' => ['Piscina', 'Cucina', 'Kit di pronto soccorso'],
                'latitude' => 45.74289,
                'longitude' => 8.67418,
                'visible' => 1
            ],
            [
                'user_id' => 3,
                'title' => 'Appartamento elegante nel centro storico',
                'pricipal_img' => 'img1.jpg',
                'description' => 'Splendido appartamento nel cuore della city, arredato con stile.',
                'price' => 150,
                "country" => "Italia",
                "city" => "Roma",
                'num_rooms' => 2,
                'num_bathrooms' => 1,
                'square_meters' => 80,
                'address' => 'Via Roma 123',
                'service' => ['Wi-fi', 'Aria condizionata', 'Posto auto'],
                'latitude' => 41.35988,
                'longitude' => 15.30843,
                'visible' => 1
            ],
            [
                'user_id' => 2,
                'title' => 'Appartamento moderno con vista panoramica',
                'pricipal_img' => 'img2.jpg',
                'description' => 'Appartamento di lusso con una vista mozzafiato sulla city.',
                'price' => 220,
                "country" => "Italia",
                "city" => "Roma",
                'num_rooms' => 3,
                'num_bathrooms' => 2,
                'square_meters' => 120,
                'address' => 'Via Milano 456',
                'service' => ['Piscina', 'Palestra', 'Cucina'],
                'latitude' => 45.74289,
                'longitude' => 8.67418,
                'visible' => 1
            ],
            [
                'user_id' => 3,
                'title' => 'Accogliente appartamento vicino al mare',
                'pricipal_img' => 'img3.jpg',
                'description' => 'Appartamento a pochi passi dalla spiaggia, ideale per le vacanze estive.',
                'price' => 400,
                "country" => "Italia",
                "city" => "Roma",
                'num_rooms' => 1,
                'num_bathrooms' => 1,
                'square_meters' => 50,
                'address' => 'Via Napoli 789',
                'service' => ['Vista mare', 'Fumo permesso', 'Posto auto'],
                'latitude' => 40.99266,
                'longitude' => 14.42039,
                'visible' => 1
            ],
            [
                "user_id" => 1,
                "title" => "Appartamento elegante nel centro storico",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Questo appartamento elegante si trova nel cuore del centro storico, con vista sulla piazza principale.",
                "price" => 120,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 2,
                "num_bathrooms" => 1,
                "square_meters" => 80,
                "address" => "Via Boccea, 123",
                "service" => ["Wi-fi", "Aria condizionata", "Riscaldamento"],
                "latitude" => 41.9023,
                "longitude" => 12.42447,
                'visible' => 0
            ],
            [
                "user_id" => 1,
                "title" => "Appartamento elegante nel centro storico",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Questo appartamento elegante si trova nel cuore del centro storico, con vista sulla piazza principale.",
                "price" => 120,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 2,
                "num_bathrooms" => 1,
                "square_meters" => 80,
                "address" => "Via Trionfale, 12",
                "service" => ["Wi-fi", "Aria condizionata", "Riscaldamento"],
                "latitude" => 41.91103,
                'longitude' => 12.45415,
                'visible' => 1
            ],
            [
                "user_id" => 2,
                "title" => "Appartamento moderno con vista mare",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Moderno appartamento con ampie finestre che offrono una vista mozzafiato sull'oceano.",
                "price" => 180,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 3,
                "num_bathrooms" => 2,
                "square_meters" => 110,
                "address" => "Via Del Babbuino, 15",
                "service" => ["Piscina", "Palestra"],
                "latitude" => 41.90961,
                'longitude' => 12.47772,
                'visible' => 0
            ],
            [
                "user_id" => 2,
                "title" => "Appartamento accogliente nel cuore della city",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Accogliente appartamento situato in una posizione strategica vicino ai principali punti di interesse.",
                "price" => 300,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 1,
                "num_bathrooms" => 1,
                "square_meters" => 50,
                "address" => "Via dei Calzaiuoli, 67",
                "service" => ["Wi-fi", "Riscaldamento"],
                "latitude" => 43.77124,
                'longitude' => 11.25532,
                'visible' => 1
            ],

            [
                "user_id" => 2,
                "title" => "Appartamento panoramico con Fumo permesso",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Spazioso appartamento con una Fumo permesso panoramica che offre una vista mozzafiato sulla city.",
                "price" => 220,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 4,
                "num_bathrooms" => 2,
                "square_meters" => 150,
                "address" => "Via Della Pineta Sacchetti, 15",
                "service" => ["Aria condizionata",],
                "latitude" => 41.93508,
                'longitude' => 12.42585,
                'visible' => 1
            ],

            [
                "user_id" => 4,
                "title" => "Appartamento rustico nelle colline",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Rustico appartamento immerso nel verde delle colline, perfetto per chi cerca tranquillità.",
                "price" => 135,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 2,
                "num_bathrooms" => 1,
                "square_meters" => 90,
                "address" => "Via Trionfale, 155",
                "service" => ["Camino"],
                "latitude" => 41.91835,
                'longitude' => 12.44948,
                'visible' => 1
            ],

            [
                "user_id" => 1,
                "title" => "Appartamento di lusso nel cuore di Manhattan",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Elegante appartamento di lusso situato nel centro di Manhattan con vista sui grattacieli.",
                "price" => 380,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 3,
                "num_bathrooms" => 2,
                "square_meters" => 180,
                "address" => "Via Trionfale, 199",
                "service" => ["Piscina", "Palestra"],
                "latitude" => 41.92356,
                'longitude' => 12.44793,
                'visible' => 1
            ],
            [
                "user_id" => 1,
                "title" => "Appartamento moderno vicino alla spiaggia",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Moderno appartamento situato a pochi passi dalla spiaggia, ideale per gli amanti del mare.",
                "price" => 155,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 2,
                "num_bathrooms" => 2,
                "square_meters" => 95,
                "address" => "Via Casilina, 51",
                "service" => ["Posto auto", "Piscina"],
                "latitude" => 41.77594,
                'longitude' => 12.9112,
                'visible' => 1
            ],

            [
                "user_id" => 3,
                "title" => "Appartamento storico nel quartiere antico",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Affascinante appartamento storico nel cuore del quartiere antico, con dettagli architettonici unici.",
                "price" => 98,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 1,
                "num_bathrooms" => 1,
                "square_meters" => 60,
                "address" => "Via Di Vigna Murata, 5",
                "service" => ["Riscaldamento", "Wi-fi", "Aria condizionata"],
                "latitude" => 41.82743,
                'longitude' => 12.48063,
                'visible' => 1
            ],

            [
                "user_id" => 2,
                "title" => "Appartamento tranquillo con vista sulla foresta",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Appartamento tranquillo e accogliente con vista sulla foresta, ideale per gli amanti della natura.",
                "price" => 128,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 2,
                "num_bathrooms" => 1,
                "square_meters" => 75,
                "address" => "Via Di Vigna Murata, 59",
                "service" => ["Wi-fi", "Posto auto"],
                "latitude" => 41.83026,
                'longitude' => 12.49408,
                'visible' => 1
            ],

            [
                "user_id" => 3,
                "title" => "Appartamento spazioso con vista sulla montagna",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Ampio appartamento con vista panoramica sulla montagna, perfetto per chi ama le attività all'aria aperta.",
                "price" => 175,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 3,
                "num_bathrooms" => 2,
                "square_meters" => 120,
                "address" => "Via Dei Castelli Romani, 16",
                "service" => ["Camino", "Palestra", "Posto auto"],
                "latitude" => 41.77395,
                'longitude' => 12.68454,
                'visible' => 1
            ],

            [
                "user_id" => 4,
                "title" => "Appartamento accogliente nel quartiere alla moda",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Accogliente appartamento situato nel quartiere più alla moda della city, circondato da negozi e ristoranti.",
                "price" => 135,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 1,
                "num_bathrooms" => 1,
                "square_meters" => 55,
                "address" => "Via Gregorio VII, 59",
                "service" => ["Wi-fi", "Riscaldamento"],
                "latitude" => 41.89744,
                'longitude' => 12.45067,
                'visible' => 1
            ],

            [
                "user_id" => 2,
                "title" => "Appartamento elegante in zona esclusiva",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Elegante appartamento situato in una zona residenziale esclusiva, con finiture di alta qualità.",
                "price" => 280,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 4,
                "num_bathrooms" => 3,
                "square_meters" => 200,
                "address" => "Via Del Quirinale, 256",
                "service" => ["Piscina", "Palestra", "Posto auto"],
                "latitude" => 41.90066,
                'longitude' => 12.48889,
                'visible' => 0
            ],
        ];


        //$allServices = Service::all(["id"]);
        // $allImage = Image::all(["id"]);

        foreach ($apartments as $apartment) {

            $newApartment = new Apartment();

            $newApartment->user_id = $apartment["user_id"];
            $newApartment->title = $apartment["title"];
            //$newApartment->principal_image = $faker->imageUrl();
            // $newApartment->imageID = $allImage->random()->id;
            $newApartment->description = $apartment["description"];
            $newApartment->price = $apartment["price"];
            $newApartment->country = $apartment["country"];
            $newApartment->city = $apartment["city"];
            $newApartment->num_rooms = $apartment["num_rooms"];
            $newApartment->num_bathrooms = $apartment["num_bathrooms"];
            $newApartment->square_meters = $apartment["square_meters"];
            $newApartment->address = $apartment["address"];
            //$newApartment->serviceID = $allServices->random()->id;
            $newApartment->visible = $apartment["visible"];
            $newApartment->latitude = $apartment["latitude"];
            $newApartment->longitude = $apartment["longitude"];
            $newApartment->save();

            foreach ($apartment['service'] as $serviceName) {
                $service = Service::firstOrCreate(['name_service' => $serviceName]);
                $newApartment->services()->attach($service);
            }
        }


    }
}
