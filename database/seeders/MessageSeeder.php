<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $messages = [
            [
                "apartment_id" => "1",
                "name_sender" => "Alice",
                "surname_sender" => "Johnson",
                "email_sender" => "alice@example.com",
                "message_object" => "Richiesta informazioni",
                "message_text" => "Ciao, sono interessata a affittare il tuo appartamento.",
                "sent_at" => now()->subDays(7),
            ],
            [
                "apartment_id" => "2",
                "name_sender" => "Bob",
                "surname_sender" => "Smith",
                "email_sender" => "bob@example.com",
                "message_object" => "Richiesta informazioni",
                "message_text" => "Potresti fornire ulteriori dettagli sugli elettrodomestici?",
                "sent_at" => now()->subDays(3),
            ],
            [
                "apartment_id" => "3",
                "name_sender" => "Maria",
                "surname_sender" => "Rossi",
                "email_sender" => 'maria.rossi@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Buongiorno, sono interessata al vostro appartamento. Potreste fornirmi maggiori informazioni sulla zona?",
                "sent_at" => now()->subDays(5),
            ],
            [
                "apartment_id" => "4",
                "name_sender" => "Giuseppe",
                "surname_sender" => "Verdi",
                "email_sender" => 'giuseppe.verdi@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Salve, vorrei sapere se l'appartamento è disponibile per il mese di settembre.",
                "sent_at" => now()->subDays(3),
            ],
            [
                "apartment_id" => "2",
                "name_sender" => "Laura",
                "surname_sender" => "Bianchi",
                "email_sender" => 'laura.bianchi@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Ciao, mi piacerebbe vedere l'appartamento di persona. È possibile organizzare una visita?",
                "sent_at" => now()->subDays(2),
            ],
            [
                "apartment_id" => "1",
                "name_sender" => "Elena",
                "surname_sender" => "Rossi",
                "email_sender" => 'elena.rossi@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Salve, vorrei prenotare una visita per valutare le dimensioni degli spazi. Quando è possibile?",
                "sent_at" => now()->subDays(3),
            ],
            [
                "apartment_id" => "2",
                "name_sender" => "Marco",
                "surname_sender" => "Ferrari",
                "email_sender" => 'marco.ferrari@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Buonasera, c'è un parcheggio riservato per l'appartamento? Sono molto interessato.",
                "sent_at" => now()->subDays(5),
            ],
            [
                "apartment_id" => "4",
                "name_sender" => "Filippo",
                "surname_sender" => "Filippazzi",
                "email_sender" => 'filippo.filippazzi@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Salve, vorrei sapere se sono ammessi animali domestici nell'appartamento. Ho un gatto tranquillo.",
                "sent_at" => now()->subDays(5),
            ],
            [
                "apartment_id" => "3",
                "name_sender" => "Giulietta",
                "surname_sender" => "Rossi",
                "email_sender" => 'giulietta.Rossi@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Ciao, ho visto le foto dell'appartamento e sembra perfetto! È disponibile per una visita nei prossimi giorni?",
                "sent_at" => now()->subDays(8),
            ],
            [
                "apartment_id" => "2",
                "name_sender" => "Serena",
                "surname_sender" => "Costa",
                "email_sender" => 'serena00@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Salve, sto cercando un appartamento ammobiliato. Potreste indicarmi quali mobili sono inclusi?",
                "sent_at" => now()->subDays(9),
            ],
            [
                "apartment_id" => "1",
                "name_sender" => "Luca",
                "surname_sender" => "Martini",
                "email_sender" => 'luca-65@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Buongiorno, avete parcheggio disponibile? Ho una macchina e vorrei assicurarmi che ci sia un posto auto.",
                "sent_at" => now()->subDays(5),
            ],
            [
                "apartment_id" => "2",
                "name_sender" => "Laura",
                "surname_sender" => "Ferrari",
                "email_sender" => 'laura1@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Ciao, ho visto l'annuncio e mi piacerebbe prenotare un'appuntamento per visitare l'appartamento domani mattina.",
                "sent_at" => now()->subDays(2),
            ],
            [
                "apartment_id" => "3",
                "name_sender" => "Andrea",
                "surname_sender" => "Russo",
                "email_sender" => 'andrea56@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Buonasera, l'appartamento è disponibile per il mese di settembre? Mi piacerebbe affittarlo per un mese.",
                "sent_at" => now()->subDays(8),
            ],
            [
                "apartment_id" => "4",
                "name_sender" => "Elena",
                "surname_sender" => "Marini",
                "email_sender" => 'elena@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Salve, vorrei avere maggiori dettagli sul contratto di locazione e sulle spese condominiali.",
                "sent_at" => now()->subDays(6),
            ],
            [
                "apartment_id" => "2",
                "name_sender" => "Andrea",
                "surname_sender" => "Russo",
                "email_sender" => 'andrea-P@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Buongiorno, vorrei avere maggiori informazioni sulla vicinanza ai mezzi pubblici e ai negozi.",
                "sent_at" => now()->subDays(8),
            ],
            [
                "apartment_id" => "4",
                "name_sender" => "Elena",
                "surname_sender" => "Martini",
                "email_sender" => 'elena123@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Ciao, sto cercando un appartamento con almeno due camere da letto. Questo requisito è soddisfatto?",
                "sent_at" => now()->subDays(6),
            ],
            [
                "apartment_id" => "4",
                "name_sender" => "Francesco",
                "surname_sender" => "Esposito",
                "email_sender" => 'francescoESP58@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Salve, vorrei sapere se è consentito fumare nell'appartamento. Grazie!",
                "sent_at" => now()->subDays(4),
            ],
            [
                "apartment_id" => "3",
                "name_sender" => "Giulia",
                "surname_sender" => "Bianchi",
                "email_sender" => 'giuliaB7@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Ciao, vorrei prenotare una visita per vedere l'appartamento di persona. Quando sarebbe possibile?",
                "sent_at" => now()->subDays(5),
            ],
            [
                "apartment_id" => "2",
                "name_sender" => "Mario",
                "surname_sender" => "Luperti",
                "email_sender" => 'marioL9@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Buongiorno, sono interessato al vostro appartamento. Potreste fornirmi ulteriori dettagli sulla posizione e sulle spese?",
                "sent_at" => now()->subDays(7),
            ],
            [
                "apartment_id" => "1",
                "name_sender" => "Elisabetta",
                "surname_sender" => "Gatti",
                "email_sender" => 'elisabetta21@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Buongiorno, c'è un garage incluso con l'appartamento? Ho bisogno di spazio per la mia auto.",
                "sent_at" => now()->subDays(2),
            ],
            [
                "apartment_id" => "4",
                "name_sender" => "Marco",
                "surname_sender" => "Gialli",
                "email_sender" => 'marcoG@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Salve, sono interessato all'appartamento ma ho alcune domande sul contratto di locazione. Potremmo discuterne?",
                "sent_at" => now()->subDays(5),
            ],
            [
                "apartment_id" => "3",
                "name_sender" => "Carla",
                "surname_sender" => "D'Amico",
                "email_sender" => 'carla.D@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Ciao, mi piacerebbe prenotare una visita per l'appartamento. Potrebbe essere possibile nel fine settimana?",
                "sent_at" => now()->subDays(3),
            ],
            [
                "apartment_id" => "3",
                "name_sender" => "Giovanni",
                "surname_sender" => "Trotta",
                "email_sender" => 'giovanni88@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Buongiorno, l'appartamento è dotato di lavastoviglie? Questo è un requisito importante per me.",
                "sent_at" => now()->subDays(4),
            ],
            [
                "apartment_id" => "2",
                "name_sender" => "Anna",
                "surname_sender" => "Baldinelli",
                "email_sender" => 'anna123@example.com',
                "message_object" => "Richiesta informazioni",
                "message_text" => "Salve, vorrei avere informazioni sulla durata minima del contratto di locazione. Ho bisogno di affittare per almeno un anno.",
                "sent_at" => now()->subDays(6),
            ]
        ];

        foreach ($messages as $message) {
            $newMessage = new Message();

            $newMessage->apartment_id = $message["apartment_id"];
            $newMessage->name_sender = $message["name_sender"];
            $newMessage->surname_sender = $message["surname_sender"];
            $newMessage->email_sender = $message["email_sender"];
            $newMessage->message_object = $message["message_object"];
            $newMessage->message_text = $message["message_text"];
            $newMessage->sent_at = $message["sent_at"];

            $newMessage->save();
        }
    }
}
