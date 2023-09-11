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

            // fatto
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
                'address' => 'Via del Corso, 123, 00187 Roma RM, Italia',
                "service" => ["Wi-fi", "Aria condizionata", "Riscaldamento", "Colazione", "TV",],
                'latitude' => 41.905511079166274,
                'longitude' => 12.478738297772155,
                'visible' => 1
            ],

            // fatto
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
                'address' => 'Via delle Palme, 45, 00171 Roma RM, Italia',
                "service" => ["Wi-fi", "Palestra", "Sauna"],
                'latitude' => 41.89578460720377,
                'longitude' => 12.563920963132409,
                'visible' => 1
            ],

            // fatto
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
                'address' => 'Via Costanzo Cloro, 53, 00145 Roma RM, Italia',
                'service' => ['Wi-fi', 'Aria condizionata', 'Colazione', 'TV', 'Cucina', 'Lavatrice'],
                'latitude' => 41.85850626341571,
                'longitude' => 12.482477809653604,
                'visible' => 1
            ],

            // fatto
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
                'address' => 'Via Venti Settembre, 4, 00184 Roma RM, Italia',
                'service' => ['Piscina', 'Cucina', 'Kit di pronto soccorso', 'Asciugacapelli', 'Fumo permesso', 'Posto auto', 'Aria condizionata'],
                'latitude' => 41.90342464994527,
                'longitude' => 12.491479682083584,
                'visible' => 1
            ],

            // fatto
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
                'address' => 'Via Francesco Massi, 12, 00152 Roma RM, Italia',
                'service' => ['Wi-fi', 'Aria condizionata', 'Posto auto', 'TV', 'Cucina', 'Lavatrice', 'Fumo permesso'],
                'latitude' => 41.87496164690176,
                'longitude' =>  12.461992743839069,
                'visible' => 1
            ],

            // fatto
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
                'address' => 'Via Milano 456, 00184 Roma RM, Italia',
                'service' => ['Piscina', 'Palestra', 'Cucina'],
                'latitude' => 41.898052343842835,
                'longitude' => 12.491380984278171,
                'visible' => 1
            ],

            // fatto
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
                'address' => 'Via Napoli 789, 00184 Roma RM, Italia',
                'service' => ['Piscina', 'Fumo permesso', 'Posto auto', 'Aria condizionata', 'TV', 'Cucina', 'Lavatrice', 'Asciugacapelli'],
                'latitude' => 41.90133969104458,
                'longitude' => 12.49427744459165,
                'visible' => 1
            ],

            // fatto
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
                "address" => "Via di Valle Melaina, 36B, 00139 Roma RM, Italia",
                "service" => ["Wi-fi", "Aria condizionata", "Riscaldamento"],
                "latitude" => 41.94850501138211,
                "longitude" =>  12.52598024546362,
                'visible' => 1,
            ],

            // fatto
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
                "address" => "Piazza del Popolo, 18, 00187 Roma RM, Italia",
                "service" => ["Wi-fi", "Aria condizionata", "Riscaldamento", "Palestra", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.910507139118515,
                'longitude' =>  12.477624292002645,
                'visible' => 1
            ],

            // fatto
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
                "address" => "Via del Babuino, 15, 00187 Roma RM, Italia",
                "service" => ["Piscina", "Palestra", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.90979871203679,
                'longitude' => 12.477661111266144,
                'visible' => 1
            ],

            // fatto
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
                "address" => "Via Torino, 67, 00184 Roma RM, Italia",
                "service" => ["Wi-fi", "Riscaldamento", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.90543160695788,
                'longitude' => 12.494452311695795,
                'visible' => 1
            ],

            // fatto
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
                "address" => "Via Giovanni Stefano Roccatagliata, 4, 00152 Roma RM, Italia",
                "service" => ["Aria condizionata", "Riscaldamento", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.87514737787551,
                'longitude' =>  12.45119205544209,
                'visible' => 1
            ],

            // fatto
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
                "address" => "Via Trionfale, 155, 00136 Roma RM, Italia",
                "service" => ["Camino", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.92399940197016,
                'longitude' => 12.44778911546081,
                'visible' => 1
            ],

            // fatto
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
                "address" => "Via Trionfale, 199, 00136 Roma RM, Italia",
                "service" => ["Piscina", "Aria Condizionata", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.88916288175388,
                'longitude' => 12.520630241545156,
                'visible' => 1
            ],

            // fatto
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
                "address" => "Via Casilina, 51, 00182 Roma RM, Italia",
                "service" => ["Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli", "Fumo permesso"],
                "latitude" => 41.88916288175388,
                'longitude' => 12.520630241545156,
                'visible' => 1
            ],

            // fatto
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
                "address" => "Via Ciro il Grande, 21, 00144 Roma RM, Italia",
                "service" => ["Riscaldamento", "Wi-fi", "Aria condizionata", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.8353372523217,
                'longitude' => 12.471995262806587,
                'visible' => 1
            ],

            // fatto
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
                "address" => "Via di Vigna Murata, 59, 00143 Roma RM, Italia",
                "service" => ["Wi-fi", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" =>  41.83843593793925,
                'longitude' => 12.50122428724222,
                'visible' => 1
            ],

            // fatto
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
                "address" => "Via dei Castelli Romani, 16, 00071 Pomezia RM, Italia",
                "service" => ["Camino", "Palestra", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.87155852595092,
                'longitude' => 12.540258763713075,
                'visible' => 1
            ],

            // fatto
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
                "address" => "Via Gregorio VII, 59, 00165 Roma RM, Italia",
                "service" => ["Wi-fi", "Riscaldamento", "Posto auto", "TV", "Cucina", "Lavatrice", "Asciugacapelli"],
                "latitude" => 41.897581045753086,
                'longitude' => 12.450658026607364,
                'visible' => 1
            ],

            // fatto
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
                "address" => "Via Del Quirinale, 256, 00184, Roma RM, Italia",
                "service" => ["Piscina", "Palestra", "Posto auto"],
                "latitude" => 41.900848210230265,
                'longitude' => 12.488908940101268,
                'visible' => 1
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
