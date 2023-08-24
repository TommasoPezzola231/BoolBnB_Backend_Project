<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allServices = Service::all(["id"]);



        $apartments = [
            [
                'user_id' => 1,
                'title' => 'Appartamento elegante nel centro storico',
                'principal_image' => 'path/immagine.jpg',
                'description' => 'Spazioso appartamento nel cuore della country, arredato con stile e comfort.',
                'price' => 1200,
                'country' => 'Roma',
                'num_rooms' => 3,
                'num_bathrooms' => 2,
                'square_meters' => 100,
                'address' => 'Via del Corso, 123',
                'latitude' => 41.9028,
                'longitude' => 12.4964
            ],
            [
                'user_id' => 2,
                'title' => 'Appartamento accogliente vicino alla spiaggia',
                'principal_image' => 'path/immagine2.jpg',
                'description' => 'Appartamento luminoso a pochi passi dalla spiaggia, ideale per le vacanze estive.',
                'price' => 800,
                'country' => 'Palermo',
                'num_rooms' => 2,
                'num_bathrooms' => 1,
                'square_meters' => 75,
                'address' => 'Viale delle Palme, 45',
                'latitude' => 38.1157,
                'longitude' => 13.3615
            ],
            [
                'user_id' => 1,
                'title' => 'Appartamento elegante nel centro storico',
                'pricipal_img' => 'img1.jpg',
                'description' => 'Splendido appartamento nel cuore della country, arredato con stile.',
                'price' => 150000,
                'country' => 'Roma',
                'num_rooms' => 2,
                'num_bathrooms' => 1,
                'square_meters' => 80,
                'address' => 'Via Roma 123',
                'Servizi' => array('Wi-Fi', 'Aria condizionata', 'Parcheggio'),
                'latitude' => 41.9028,
                'longitude' => 12.4964
            ],
            [
                'user_id' => 2,
                'title' => 'Appartamento moderno con vista panoramica',
                'pricipal_img' => 'img2.jpg',
                'description' => 'Appartamento di lusso con una vista mozzafiato sulla country.',
                'price' => 220000,
                'country' => 'Milano',
                'num_rooms' => 3,
                'num_bathrooms' => 2,
                'square_meters' => 120,
                'address' => 'Via Milano 456',
                'Servizi' => array('Piscina', 'Palestra', 'Sicurezza 24/7'),
                'latitude' => 45.4642,
                'longitude' => 9.1900
            ],
            [
                'user_id' => 1,
                'title' => 'Appartamento elegante nel centro storico',
                'pricipal_img' => 'img1.jpg',
                'description' => 'Splendido appartamento nel cuore della country, arredato con stile.',
                'price' => 150000,
                'country' => 'Roma',
                'num_rooms' => 2,
                'num_bathrooms' => 1,
                'square_meters' => 80,
                'address' => 'Via Roma 123',
                'Servizi' => array('Wi-Fi', 'Aria condizionata', 'Parcheggio'),
                'latitude' => 41.9028,
                'longitude' => 12.4964
            ],
            [
                'user_id' => 2,
                'title' => 'Appartamento moderno con vista panoramica',
                'pricipal_img' => 'img2.jpg',
                'description' => 'Appartamento di lusso con una vista mozzafiato sulla country.',
                'price' => 220000,
                'country' => 'Milano',
                'num_rooms' => 3,
                'num_bathrooms' => 2,
                'square_meters' => 120,
                'address' => 'Via Milano 456',
                'Servizi' => array('Piscina', 'Palestra', 'Sicurezza 24/7'),
                'latitude' => 45.4642,
                'longitude' => 9.1900
            ],
            [
                'user_id' => 3,
                'title' => 'Accogliente appartamento vicino al mare',
                'pricipal_img' => 'img3.jpg',
                'description' => 'Appartamento a pochi passi dalla spiaggia, ideale per le vacanze estive.',
                'price' => 80000,
                'country' => 'Napoli',
                'num_rooms' => 1,
                'num_bathrooms' => 1,
                'square_meters' => 50,
                'address' => 'Via Napoli 789',
                'Servizi' => array('Vista mare', 'Terrazza', 'Parcheggio'),
                'latitude' => 40.8522,
                'longitude' => 14.2681
            ],
            [
                "user_id" => 1,
                "title" => "Appartamento elegante nel centro storico",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Questo appartamento elegante si trova nel cuore del centro storico, con vista sulla piazza principale.",
                "price" => 120000,
                "citta" => "Roma",
                "numero_stanze" => 2,
                "numero_bagno" => 1,
                "square_meters" => 80,
                "address" => "Via del Corso, 123",
                "servizi" => ["Wi-Fi", "Aria condizionata", "Riscaldamento"],
                "latitude" => 41.9028,
                "longitude" => 12.4964
            ],
            [
                "user_id" => 1,
                "title" => "Appartamento elegante nel centro storico",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Questo appartamento elegante si trova nel cuore del centro storico, con vista sulla piazza principale.",
                "price" => 120000,
                "citta" => "Roma",
                "numero_stanze" => 2,
                "numero_bagno" => 1,
                "square_meters" => 80,
                "address" => "Via del Corso, 123",
                "servizi" => ["Wi-Fi", "Aria condizionata", "Riscaldamento"],
                "latitude" => 41.9028,
                "longitude" => 12.4964
            ],
            [
                "user_id" => 2,
                "title" => "Appartamento moderno con vista mare",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Moderno appartamento con ampie finestre che offrono una vista mozzafiato sull'oceano.",
                "price" => 180000,
                "citta" => "Barcellona",
                "numero_stanze" => 3,
                "numero_bagno" => 2,
                "square_meters" => 110,
                "address" => "Carrer de la Marina, 45",
                "servizi" => ["Piscina", "Palestra", "Garage"],
                "latitude" => 41.3851,
                "longitude" => 2.1734
            ],
            [
                "user_id" => 3,
                "title" => "Appartamento accogliente nel cuore della country",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Accogliente appartamento situato in una posizione strategica vicino ai principali punti di interesse.",
                "price" => 95000,
                "citta" => "Firenze",
                "numero_stanze" => 1,
                "numero_bagno" => 1,
                "square_meters" => 50,
                "address" => "Via dei Calzaiuoli, 67",
                "servizi" => ["Wi-Fi", "Riscaldamento"],
                "latitude" => 43.7696,
                "longitude" => 11.2558
            ],

            [
                "user_id" => 4,
                "title" => "Appartamento panoramico con terrazza",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Spazioso appartamento con una terrazza panoramica che offre una vista mozzafiato sulla country.",
                "price" => 220000,
                "citta" => "Londra",
                "numero_stanze" => 4,
                "numero_bagno" => 2,
                "square_meters" => 150,
                "address" => "Abbey Road, 10",
                "servizi" => ["Terrazza", "Aria condizionata", "Garage"],
                "latitude" => 51.5074,
                "longitude" => -0.1278
            ],

            [
                "user_id" => 5,
                "title" => "Appartamento rustico nelle colline",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Rustico appartamento immerso nel verde delle colline, perfetto per chi cerca tranquillità.",
                "price" => 135000,
                "citta" => "Toscana",
                "numero_stanze" => 2,
                "numero_bagno" => 1,
                "square_meters" => 90,
                "address" => "Via delle Vigne, 22",
                "servizi" => ["Giardino", "Camino"],
                "latitude" => 43.7711,
                "longitude" => 11.2486
            ],

            [
                "user_id" => 6,
                "title" => "Appartamento di lusso nel cuore di Manhattan",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Elegante appartamento di lusso situato nel centro di Manhattan con vista sui grattacieli.",
                "price" => 380000,
                "citta" => "New York",
                "numero_stanze" => 3,
                "numero_bagno" => 2,
                "square_meters" => 180,
                "address" => "5th Avenue, 123",
                "servizi" => ["Portineria", "Piscina", "Palestra"],
                "latitude" => 40.7128,
                "longitude" => -74.0060
            ],
            [
                "user_id" => 7,
                "title" => "Appartamento moderno vicino alla spiaggia",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Moderno appartamento situato a pochi passi dalla spiaggia, ideale per gli amanti del mare.",
                "price" => 155000,
                "citta" => "Miami",
                "numero_stanze" => 2,
                "numero_bagno" => 2,
                "square_meters" => 95,
                "address" => "Ocean Drive, 456",
                "servizi" => ["Accesso diretto alla spiaggia", "Parcheggio", "Piscina"],
                "latitude" => 25.7617,
                "longitude" => -80.1918
            ],

            [
                "user_id" => 8,
                "title" => "Appartamento storico nel quartiere antico",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Affascinante appartamento storico nel cuore del quartiere antico, con dettagli architettonici unici.",
                "price" => 98000,
                "citta" => "Praga",
                "numero_stanze" => 1,
                "numero_bagno" => 1,
                "square_meters" => 60,
                "address" => "Staroměstské náměstí, 15",
                "servizi" => ["Riscaldamento", "Posizione centrale"],
                "latitude" => 50.0755,
                "longitude" => 14.4378
            ],

            [
                "user_id" => 9,
                "title" => "Appartamento tranquillo con vista sulla foresta",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Appartamento tranquillo e accogliente con vista sulla foresta, ideale per gli amanti della natura.",
                "price" => 128000,
                "citta" => "Seattle",
                "numero_stanze" => 2,
                "numero_bagno" => 1,
                "square_meters" => 75,
                "address" => "Woodland Avenue, 789",
                "servizi" => ["Balcone", "Parcheggio"],
                "latitude" => 47.6062,
                "longitude" => -122.3321
            ],

            [
                "user_id" => 10,
                "title" => "Appartamento spazioso con vista sulla montagna",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Ampio appartamento con vista panoramica sulla montagna, perfetto per chi ama le attività all'aria aperta.",
                "price" => 175000,
                "citta" => "Denver",
                "numero_stanze" => 3,
                "numero_bagno" => 2,
                "square_meters" => 120,
                "address" => "Mountain View Drive, 234",
                "servizi" => ["Terrazza", "Camino", "Garage"],
                "latitude" => 39.7392,
                "longitude" => -104.9903
            ],

            [
                "user_id" => 11,
                "title" => "Appartamento accogliente nel quartiere alla moda",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Accogliente appartamento situato nel quartiere più alla moda della country, circondato da negozi e ristoranti.",
                "price" => 135000,
                "citta" => "Berlino",
                "numero_stanze" => 1,
                "numero_bagno" => 1,
                "square_meters" => 55,
                "address" => "Schönhauser Allee, 78",
                "servizi" => ["Wi-Fi", "Riscaldamento"],
                "latitude" => 52.5200,
                "longitude" => 13.4050
            ],

            [
                "user_id" => 12,
                "title" => "Appartamento elegante in zona esclusiva",
                "principal_img" => "link_alla_immagine.jpg",
                "description" => "Elegante appartamento situato in una zona residenziale esclusiva, con finiture di alta qualità.",
                "price" => 285000,
                "citta" => "Los Angeles",
                "numero_stanze" => 4,
                "numero_bagno" => 3,
                "square_meters" => 200,
                "address" => "Beverly Hills, 456",
                "servizi" => ["Piscina", "Palestra", "Sicurezza 24/7"],
                "latitude" => 34.0522,
                "longitude" => -118.2437
            ],
        ];

        foreach ($apartments as $apartment) {

            $newApartment = new Apartment();

            $newApartment->user_id = $apartment["user_id"];
            $newApartment->title = $apartment["title"];
            $newApartment->principal_image = $apartment["principal_image"];
            $newApartment->imageID = $apartment["imageID"];
            $newApartment->description = $apartment["description"];
            $newApartment->price = $apartment["price"];
            $newApartment->country = $apartment["country"];
            $newApartment->num_rooms = $apartment["num_rooms"];
            $newApartment->num_bathrooms = $apartment["num_bathrooms"];
            $newApartment->square_meters = $apartment["square_meters"];
            $newApartment->address = $apartment["address"];
            $newApartment->service_id = $allServices->random()->id; //
            $newApartment->visible = $apartment["visible"];
            $newApartment->latitude = $apartment["latitude"];
            $newApartment->longitude = $apartment["longitude"];
        }
    }
}
