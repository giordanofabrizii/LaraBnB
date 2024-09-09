<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'apartment_id' => 1,
                'sender_email' => 'mario.rossi@gmail.com',
                'sender_name' => 'Mario Rossi',
                'text' => 'Buongiorno, sono interessato a prenotare il tuo appartamento per un weekend. Quali sono le disponibilità per il prossimo mese? Grazie!',
                'date' => '2024-09-01 10:30:00',
                'seen_date' => '2024-09-01 12:00:00'
            ],
            [
                'apartment_id' => 2,
                'sender_email' => 'luigi.bianchi@gmail.com',
                'sender_name' => 'Luigi Bianchi',
                'text' => 'Ciao, stiamo cercando una casa per trascorrere una settimana di vacanza. L’appartamento è disponibile dal 10 al 17 agosto?',
                'date' => '2024-09-02 11:00:00',
                'seen_date' => null
            ],
            [
                'apartment_id' => 3,
                'sender_email' => 'giovanna.verdi@gmail.com',
                'sender_name' => 'Giovanna Verdi',
                'text' => 'Salve, è possibile prenotare la casa per 3 notti dal 15 al 18 luglio? Quanto sarebbe il prezzo totale?',
                'date' => '2024-09-02 14:45:00',
                'seen_date' => '2024-09-02 16:30:00'
            ],
            [
                'apartment_id' => 4,
                'sender_email' => 'alessandra.neri@gmail.com',
                'sender_name' => 'Alessandra Neri',
                'text' => 'Salve! Per caso, sono ammessi animali domestici? Graziie!',
                'date' => '2024-09-03 09:15:00',
                'seen_date' => null
            ],
            [
                'apartment_id' => 1,
                'sender_email' => 'francesco.marino@gmail.com',
                'sender_name' => 'Francesco Marino',
                'text' => 'Ciao, sto programmando una vacanza con la mia famiglia. L’appartamento è disponibile per 5 notti? Potresti confermarmi le date dall’ 1 al 6 settembre?',
                'date' => '2024-09-03 10:00:00',
                'seen_date' => '2024-09-03 11:20:00'
            ],
            [
                'apartment_id' => 2,
                'sender_email' => 'sara.galli@gmail.com',
                'sender_name' => 'Sara Galli',
                'text' => 'Buongiorno, siamo una coppia e stiamo cercando un alloggio per un weekend romantico. Il tuo appartamento sembra perfetto! È disponibile dal 20 al 22 ottobre?',
                'date' => '2024-09-04 12:10:00',
                'seen_date' => null
            ],
            [
                'apartment_id' => 3,
                'sender_email' => 'giorgio.lombardi@gmail.com',
                'sender_name' => 'Giorgio Lombardi',
                'text' => 'Sto pianificando una breve vacanza. Mi piacerebbe prenotare l’appartamento per 2 notti. Qual è l’orario di check-in e check-out?',
                'date' => '2024-09-04 13:45:00',
                'seen_date' => '2024-09-04 15:30:00'
            ],
            [
                'apartment_id' => 4,
                'sender_email' => 'elena.ferrari@gmail.com',
                'sender_name' => 'Elena Ferrari',
                'text' => 'Ciao, vorrei prenotare la tua casa per un soggiorno di 4 giorni il prossimo mese. Il prezzo include tutti i servizi o ci sono costi aggiuntivi?',
                'date' => '2024-09-04 08:00:00',
                'seen_date' => null
            ],
            [
                'apartment_id' => 1,
                'sender_email' => 'marco.damiani@gmail.com',
                'sender_name' => 'Marco Damiani',
                'text' => 'Vorrei affittare l’appartamento per una breve vacanza di 4 giorni. Ci sono sconti per soggiorni superiori a 3 giorni?',
                'date' => '2024-09-05 10:20:00',
                'seen_date' => '2024-09-05 12:00:00'
            ],
            [
                'apartment_id' => 2,
                'sender_email' => 'laura.rinaldi@gmail.com',
                'sender_name' => 'Laura Rinaldi',
                'text' => 'Buonasera, sto organizzando una vacanza di 3 giorni per la prossima settimana. Il tuo appartamento è disponibile?',
                'date' => '2024-09-05 11:30:00',
                'seen_date' => '2024-09-05 13:00:00'
            ],
            [
                'apartment_id' => 3,
                'sender_email' => 'paolo.borelli@gmail.com',
                'sender_name' => 'Paolo Borelli',
                'text' => 'Ciao! Vorrei sapere se accetti prenotazioni last-minute. Sto cercando un alloggio per il prossimo weekend.',
                'date' => '2024-09-06 14:00:00',
                'seen_date' => null
            ],
            [
                'apartment_id' => 4,
                'sender_email' => 'valeria.pellegrini@gmail.com',
                'sender_name' => 'Valeria Pellegrini',
                'text' => 'Ciao, vorrei prenotare la tua casa per un soggiorno di 4 giorni il prossimo mese. Possiammo accordarci sul prezzo?',
                'date' => '2024-09-06 15:30:00',
                'seen_date' => '2024-09-06 17:00:00'
            ],
            [
                'apartment_id' => 1,
                'sender_email' => 'andrea.parisi@gmail.com',
                'sender_name' => 'Andrea Parisi',
                'text' => 'Buongiorno, sono interessato a prenotare il tuo appartamento per un weekend. Quali sono le disponibilità per il prossimo mese? Grazie!',
                'date' => '2024-09-07 09:15:00',
                'seen_date' => null
            ],
        ];

        foreach ($messages as $messageData) {
            $newMessage = new Message();
            $newMessage->apartment_id = $messageData['apartment_id'];
            $newMessage->sender_email = $messageData['sender_email'];
            $newMessage->sender_name = $messageData['sender_name'];
            $newMessage->text = $messageData['text'];
            $newMessage->date = $messageData['date'];
            $newMessage->seen_date = $messageData['seen_date'];
            $newMessage->save();
        }
    }
}
