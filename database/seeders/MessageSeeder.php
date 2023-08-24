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
                "sender_email" => "alice@example.com",
                "message_text" => "Ciao, sono interessata a affittare il tuo appartamento.",
                "name_sender" => "Alice Johnson",
                "sent_at" => now()->subDays(7),
            ],
            [
                "apartment_id" => "2",
                "sender_email" => "bob@example.com",
                "message_text" => "Potresti fornire ulteriori dettagli sugli elettrodomestici?",
                "name_sender" => "Bob Rossi",
                "sent_at" => now()->subDays(3),
            ],
            [
                "apartment_id" => "3",
                "sender_email" => 'maria.rossi@example.com',
                "message_text" => "Buongiorno, sono interessata al vostro appartamento. Potreste fornirmi maggiori informazioni sulla zona?",
                "name_sender" => "Maria Rossi",
                "sent_at" => now()->subDays(5),
            ],
            [
                "apartment_id" => "4",
                "sender_email" => 'giuseppe.verdi@example.com',
                "message_text" => "Salve, vorrei sapere se l'appartamento è disponibile per il mese di settembre.",
                "name_sender" => "Giuseppe Verdi",
                "sent_at" => now()->subDays(3),
            ],
            [
                "apartment_id" => "5",
                "sender_email" => 'laura.bianchi@example.com',
                "message_text" => "Ciao, mi piacerebbe vedere l'appartamento di persona. È possibile organizzare una visita?",
                "name_sender" => "Laura Bianchi",
                "sent_at" => now()->subDays(2),
            ],
            [
                "apartment_id" => "6",
                "sender_email" => 'elena.rossi@example.com',
                "message_text" => "Salve, vorrei prenotare una visita per valutare le dimensioni degli spazi. Quando è possibile?",
                "name_sender" => "Elena Rossi",
                "sent_at" => now()->subDays(3),
            ],
            [
                "apartment_id" => "7",
                "sender_email" => 'marco.ferrari@example.com',
                "message_text" => "Buonasera, c'è un parcheggio riservato per l'appartamento? Sono molto interessato.",
                "name_sender" => "Marco Ferrari",
                "sent_at" => now()->subDays(5),
            ],
            [
                "apartment_id" => "8",
                "sender_email" => 'filippo.filippazzi@example.com',
                "message_text" => "Salve, vorrei sapere se sono ammessi animali domestici nell'appartamento. Ho un gatto tranquillo.",
                "name_sender" => "Filippo Filippazzi",
                "sent_at" => now()->subDays(5),
            ],
            [
                "apartment_id" => "9",
                "sender_email" => 'giulietta.Rossi@example.com',
                "message_text" => "Ciao, ho visto le foto dell'appartamento e sembra perfetto! È disponibile per una visita nei prossimi giorni?",
                "name_sender" => "Giulietta Rossi",
                "sent_at" => now()->subDays(8),
            ],
            [
                "apartment_id" => "10",
                "sender_email" => 'serena00@example.com',
                "message_text" => "Salve, sto cercando un appartamento ammobiliato. Potreste indicarmi quali mobili sono inclusi?",
                "name_sender" => "Serena Costa",
                "sent_at" => now()->subDays(9),
            ],
            [
                "apartment_id" => "11",
                "sender_email" => 'luca-65@example.com',
                "message_text" => "Buongiorno, avete parcheggio disponibile? Ho una macchina e vorrei assicurarmi che ci sia un posto auto.",
                "name_sender" => "Luca Martini",
                "sent_at" => now()->subDays(5),
            ],
            [
                "apartment_id" => "12",
                "sender_email" => 'laura1@example.com',
                "message_text" => "Ciao, ho visto l'annuncio e mi piacerebbe prenotare un'appuntamento per visitare l'appartamento domani mattina.",
                "name_sender" => "Laura Ferrari",
                "sent_at" => now()->subDays(2),
            ],
            [
                "apartment_id" => "13",
                "sender_email" => 'andrea56@example.com',
                "message_text" => "Buonasera, l'appartamento è disponibile per il mese di settembre? Mi piacerebbe affittarlo per un mese.",
                "name_sender" => "Andrea Russo",
                "sent_at" => now()->subDays(8),
            ],
            [
                "apartment_id" => "14",
                "sender_email" => 'elena@example.com',
                "message_text" => "Salve, vorrei avere maggiori dettagli sul contratto di locazione e sulle spese condominiali.",
                "name_sender" => "Elena Marini",
                "sent_at" => now()->subDays(6),
            ],
            [
                "apartment_id" => "15",
                "sender_email" => 'andrea-P@example.com',
                "message_text" => "Buongiorno, vorrei avere maggiori informazioni sulla vicinanza ai mezzi pubblici e ai negozi.",
                "name_sender" => "Andrea Russo",
                "sent_at" => now()->subDays(8),
            ],
            [
                "apartment_id" => "16",
                "sender_email" => 'elena123@example.com',
                "message_text" => "Ciao, sto cercando un appartamento con almeno due camere da letto. Questo requisito è soddisfatto?",
                "name_sender" => "Elena Martini",
                "sent_at" => now()->subDays(6),
            ],
            [
                "apartment_id" => "17",
                "sender_email" => 'francescoESP58@example.com',
                "message_text" => "Salve, vorrei sapere se è consentito fumare nell'appartamento. Grazie!",
                "name_sender" => "Francesco Esposito",
                "sent_at" => now()->subDays(4),
            ],
            [
                "apartment_id" => "18",
                "sender_email" => 'giuliaB7@example.com',
                "message_text" => "Ciao, vorrei prenotare una visita per vedere l'appartamento di persona. Quando sarebbe possibile?",
                "name_sender" => "Giulia Bianchi",
                "sent_at" => now()->subDays(5),
            ],
            [
                "apartment_id" => "19",
                "sender_email" => 'marioL9@example.com',
                "message_text" => "Buongiorno, sono interessato al vostro appartamento. Potreste fornirmi ulteriori dettagli sulla posizione e sulle spese?",
                "name_sender" => "Mario Luperti",
                "sent_at" => now()->subDays(7),
            ],
            [
                "apartment_id" => "20",
                "sender_email" => 'elisabetta21@example.com',
                "message_text" => "Buongiorno, c'è un garage incluso con l'appartamento? Ho bisogno di spazio per la mia auto.",
                "name_sender" => "Elisabetta Gatti",
                "sent_at" => now()->subDays(2),
            ],
            [
                "apartment_id" => "11",
                "sender_email" => 'marcoG@example.com',
                "message_text" => "Salve, sono interessato all'appartamento ma ho alcune domande sul contratto di locazione. Potremmo discuterne?",
                "name_sender" => "Marco Gentile",
                "sent_at" => now()->subDays(5),
            ],
            [
                "apartment_id" => "7",
                "sender_email" => 'carla.D@example.com',
                "message_text" => "Ciao, mi piacerebbe prenotare una visita per l'appartamento. Potrebbe essere possibile nel fine settimana?",
                "name_sender" => "Carla D'Amico",
                "sent_at" => now()->subDays(3),
            ],
            [
                "apartment_id" => "13",
                "sender_email" => 'giovanni88@example.com',
                "message_text" => "Buongiorno, l'appartamento è dotato di lavastoviglie? Questo è un requisito importante per me.",
                "name_sender" => "Giovanni Trotta",
                "sent_at" => now()->subDays(4),
            ],
            [
                "apartment_id" => "8",
                "sender_email" => 'anna123@example.com',
                "message_text" => "Salve, vorrei avere informazioni sulla durata minima del contratto di locazione. Ho bisogno di affittare per almeno un anno.",
                "name_sender" => "Anna Baldinelli",
                "sent_at" => now()->subDays(6),
            ]
        ];

        foreach ($messages as $message) {
            $newMessage = new Message();

            $newMessage->apartment_id = $message["apartment_id"];
            $newMessage->sender_email = $message["sender_email"];
            $newMessage->message_text = $message["message_text"];
            $newMessage->name_sender = $message["name_sender"];
            $newMessage->sent_at = $message["sent_at"];

            $newMessage->save();
        }
    }
}
