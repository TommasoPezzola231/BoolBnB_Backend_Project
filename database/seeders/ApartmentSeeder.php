<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Image;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        Apartment::truncate();
        Schema::enableForeignKeyConstraints();

        $apartments = [
            [
                'user_id' => 1,
                'title' => 'Appartamento elegante nel centro storico',
                'principal_image' => '',
                'description' => 'Spazioso appartamento nel cuore della città, arredato con stile e comfort.',
                'price' => 120,
                'country' => 'Italia',
                'city' => 'Roma',
                'num_rooms' => 3,
                'num_bathrooms' => 2,
                'square_meters' => 100,
                'address' => 'Via del Corso, 123',
                "service" => ["Wi-fi", "Aria condizionata", "Riscaldamento", "Colazione", "TV",],
                'latitude' => 43.86987,
                'longitude' => 11.01201,
                'visible' => 1
            ],
            [
                'user_id' => 2,
                'title' => 'Appartamento accogliente vicino alla stazione',
                'principal_image' => '',
                'description' => 'Appartamento luminoso a 5 minuti a piedi dalla stazione Roma termini, ideale per trasferte lavorative.',
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
                'title' => 'Monolocale moderno nel centro storico',
                'principal_image' => '',
                'description' => 'Splendido appartamento nel cuore della città.',
                'price' => 100,
                'country' => 'Italia',
                'city' => 'Roma',
                'num_rooms' => 2,
                'num_bathrooms' => 1,
                'square_meters' => 80,
                'address' => 'Via Roma 123',
                'service' => ['Wi-fi', 'Aria condizionata', 'Colazione', 'TV', 'Cucina', 'Lavatrice'],
                'latitude' => 41.35988,
                'longitude' => 15.30843,
                'visible' => 1
            ],
            [
                'user_id' => 4,
                'title' => 'Appartamento Capi',
                'principal_image' => '',
                'description' => 'Appartamento di lusso con tutti i comfort.',
                'price' => 200,
                "country" => "Italia",
                "city" => "Roma",
                'num_rooms' => 3,
                'num_bathrooms' => 2,
                'square_meters' => 120,
                'address' => 'Via Milano 456',
                'service' => ['Piscina', 'Cucina', 'Kit di pronto soccorso', 'Asciugacapelli', 'Fumo permesso', 'Posto auto', 'Aria condizionata'],
                'latitude' => 45.74289,
                'longitude' => 8.67418,
                'visible' => 1
            ],
            [
                'user_id' => 3,
                'title' => 'Appartamento accogliente',
                'principal_image' => '',
                'description' => 'Appartamento ristrutturato di recente, ideale per soste lunghe.',
                'price' => 150,
                "country" => "Italia",
                "city" => "Roma",
                'num_rooms' => 2,
                'num_bathrooms' => 1,
                'square_meters' => 80,
                'address' => 'Via Roma 123',
                'service' => ['Wi-fi', 'Aria condizionata', 'Posto auto', 'TV', 'Cucina', 'Lavatrice', 'Fumo permesso'],
                'latitude' => 41.35988,
                'longitude' => 15.30843,
                'visible' => 1
            ],
            [
                'user_id' => 2,
                'title' => 'Appartamento con ingresso indipendente',
                'principal_image' => '',
                'description' => 'Appartamento con ingresso indipendente, ideale per chi cerca privacy.',
                'price' => 50,
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
                'title' => 'Villa con piscina',
                'principal_image' => '',
                'description' => 'Appartamento di lusso, ideale per le vacanze estive.',
                'price' => 400,
                "country" => "Italia",
                "city" => "Roma",
                'num_rooms' => 1,
                'num_bathrooms' => 1,
                'square_meters' => 50,
                'address' => 'Via Napoli 789',
                'service' => ['Piscina', 'Fumo permesso', 'Posto auto', 'Aria condizionata', 'TV', 'Cucina', 'Lavatrice', 'Asciugacapelli'],
                'latitude' => 40.99266,
                'longitude' => 14.42039,
                'visible' => 1
            ],
            [
                "user_id" => 1,
                "title" => "Camera singola in appartamento condiviso",
                "principal_image" => '',
                "description" => "Camera singola in appartamento condiviso con altre 2 persone, ideale per studenti.",
                "price" => 40,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 2,
                "num_bathrooms" => 1,
                "square_meters" => 60,
                "address" => "Via Boccea, 123",
                "service" => ["Wi-fi", "Aria condizionata", "Riscaldamento"],
                "latitude" => 41.9023,
                "longitude" => 12.42447,
                'visible' => 0
            ],
            [
                "user_id" => 1,
                "title" => "Roof garden con vista sulla città",
                "principal_image" => '',
                "description" => "Appartamento con roof garden e vista panoramica sulla città, ideale per chi ama la natura.",
                "price" => 220,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 2,
                "num_bathrooms" => 1,
                "square_meters" => 150,
                "address" => "Via Trionfale, 12",
                "service" => ["Wi-fi", "Aria condizionata", "Riscaldamento", "Palestra", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.91103,
                'longitude' => 12.45415,
                'visible' => 1
            ],
            [
                "user_id" => 2,
                "title" => "Appartamento con vista sulla città",
                "principal_image" => '',
                "description" => "Appartamento con vista panoramica sulla città, ideale per chi ama la natura.",
                "price" => 180,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 3,
                "num_bathrooms" => 2,
                "square_meters" => 110,
                "address" => "Via Del Babbuino, 15",
                "service" => ["Piscina", "Palestra", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.90961,
                'longitude' => 12.47772,
                'visible' => 0
            ],
            [
                "user_id" => 2,
                "title" => "Appartamento accogliente nel cuore della città",
                "principal_image" => '',
                "description" => "Appartamento accogliente nel cuore della città, ideale per chi ama la vita notturna.",
                "price" => 100,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 3,
                "num_bathrooms" => 1,
                "square_meters" => 50,
                "address" => "Via dei Calzaiuoli, 67",
                "service" => ["Wi-fi", "Riscaldamento", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 43.77124,
                'longitude' => 11.25532,
                'visible' => 1
            ],

            [
                "user_id" => 2,
                "title" => "Appartamento panoramico con Fumo permesso",
                "principal_image" => '',
                "description" => "Spazioso appartamento con una Fumo permesso panoramica che offre una vista mozzafiato sulla city.",
                "price" => 220,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 4,
                "num_bathrooms" => 2,
                "square_meters" => 150,
                "address" => "Via Della Pineta Sacchetti, 15",
                "service" => ["Aria condizionata", "Riscaldamento", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.93508,
                'longitude' => 12.42585,
                'visible' => 1
            ],

            [
                "user_id" => 4,
                "title" => "Appartamento rustico nelle colline",
                "principal_image" => '',
                "description" => "Rustico appartamento immerso nel verde delle colline, perfetto per chi cerca tranquillità.",
                "price" => 135,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 3,
                "num_bathrooms" => 1,
                "square_meters" => 90,
                "address" => "Via Trionfale, 155",
                "service" => ["Camino", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.91835,
                'longitude' => 12.44948,
                'visible' => 1
            ],

            [
                "user_id" => 1,
                "title" => "Bilocale moderno",
                "principal_image" => '',
                "description" => "Bilocale moderno e luminoso, ideale per coppie o single.",
                "price" => 380,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 3,
                "num_bathrooms" => 2,
                "square_meters" => 180,
                "address" => "Via Trionfale, 199",
                "service" => ["Piscina", "Aria Condizionata", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.92356,
                'longitude' => 12.44793,
                'visible' => 1
            ],
            [
                "user_id" => 1,
                "title" => "Appartamento per famiglie",
                "principal_image" => '',
                "description" => "Appartamento spazioso e luminoso, ideale per famiglie.",
                "price" => 155,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 5,
                "num_bathrooms" => 2,
                "square_meters" => 160,
                "address" => "Via Casilina, 51",
                "service" => ["Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli", "Fumo permesso"],
                "latitude" => 41.77594,
                'longitude' => 12.9112,
                'visible' => 1
            ],

            [
                "user_id" => 3,
                "title" => "Appartamento storico nel quartiere antico",
                "principal_image" => '',
                "description" => "Affascinante appartamento storico nel cuore del quartiere antico, con dettagli architettonici unici.",
                "price" => 98,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 3,
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
                "title" => "Appartamento tranquillo con vista sulle colline verdi",
                "principal_image" => '',
                "description" => "Appartamento tranquillo e accogliente con vista sulle colline verdi romane, ideale per gli amanti della natura.",
                "price" => 128,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 3,
                "num_bathrooms" => 1,
                "square_meters" => 75,
                "address" => "Via Di Vigna Murata, 59",
                "service" => ["Wi-fi", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.83026,
                'longitude' => 12.49408,
                'visible' => 1
            ],

            [
                "user_id" => 3,
                "title" => "Appartamento spazioso con vista sulla montagna",
                "principal_image" => '',
                "description" => "Ampio appartamento con vista panoramica sulla montagna, perfetto per chi ama le attività all'aria aperta.",
                "price" => 175,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 3,
                "num_bathrooms" => 2,
                "square_meters" => 120,
                "address" => "Via Dei Castelli Romani, 16",
                "service" => ["Camino", "Palestra", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.77395,
                'longitude' => 12.68454,
                'visible' => 1
            ],

            [
                "user_id" => 4,
                "title" => "Appartamento accogliente nel quartiere alla moda",
                "principal_image" => '',
                "description" => "Accogliente appartamento situato nel quartiere più alla moda della city, circondato da negozi e ristoranti.",
                "price" => 400,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 3,
                "num_bathrooms" => 1,
                "square_meters" => 100,
                "address" => "Via Gregorio VII, 59",
                "service" => ["Wi-fi", "Riscaldamento"],
                "latitude" => 41.89744,
                'longitude' => 12.45067,
                'visible' => 1
            ],

            [
                "user_id" => 2,
                "title" => "Appartamento elegante in zona esclusiva",
                "principal_image" => '',
                "description" => "Elegante appartamento situato in una zona residenziale esclusiva, con finiture di alta qualità.",
                "price" => 500,
                "country" => "Italia",
                "city" => "Roma",
                "num_rooms" => 6,
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
            $newApartment->slug = $apartment['title'];
            $newApartment->description = $apartment["description"];
            $newApartment->price = $apartment["price"];
            $newApartment->country = $apartment["country"];
            $newApartment->city = $apartment["city"];
            $newApartment->num_rooms = $apartment["num_rooms"];
            $newApartment->num_bathrooms = $apartment["num_bathrooms"];
            $newApartment->square_meters = $apartment["square_meters"];
            $newApartment->address = $apartment["address"];
            $newApartment->visible = $apartment["visible"];
            $newApartment->latitude = $apartment["latitude"];
            $newApartment->longitude = $apartment["longitude"];
            // $newApartment->principal_image = $apartment['principal_image'];
            // $newApartment->imageID = $allImage->random()->id;
            //$newApartment->serviceID = $allServices->random()->id;
            $newApartment->save();

            foreach ($apartment['service'] as $serviceName) {
                $service = Service::firstOrCreate(['name_service' => $serviceName]);
                $newApartment->services()->attach($service);
            }
        }
    }
}
