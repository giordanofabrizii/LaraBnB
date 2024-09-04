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
                'text' => 'Buongiorno, sono interessato al vostro appartamento e vorrei avere maggiori informazioni. Potreste dirmi se le utenze sono incluse nel prezzo dell’affitto? Inoltre, vorrei sapere se c’è la possibilità di fare una visita all’appartamento la prossima settimana. Grazie per l’attenzione.',
                'date' => '2024-09-01 10:30:00',
                'seen_date' => '2024-09-01 12:00:00'
            ],
            [
                'apartment_id' => 2,
                'sender_email' => 'luigi.bianchi@gmail.com',
                'sender_name' => 'Luigi Bianchi',
                'text' => 'Salve, ho visto l’annuncio per l’appartamento e sarei molto interessato. Potreste fornirmi ulteriori dettagli riguardo la vicinanza ai servizi principali come supermercati, farmacie e fermate dei mezzi pubblici? Inoltre, vorrei sapere se l’appartamento è disponibile per un contratto di lungo termine.',
                'date' => '2024-09-02 11:00:00',
                'seen_date' => null
            ],
            [
                'apartment_id' => 3,
                'sender_email' => 'giovanna.verdi@gmail.com',
                'sender_name' => 'Giovanna Verdi',
                'text' => 'Buongiorno, vi contatto per sapere se l’appartamento è ancora disponibile e se è possibile programmare una visita nel fine settimana. Sono alla ricerca di un appartamento nella zona e il vostro sembra avere tutte le caratteristiche che sto cercando. Vorrei anche sapere se l’edificio è dotato di ascensore.',
                'date' => '2024-09-02 14:45:00',
                'seen_date' => '2024-09-02 16:30:00'
            ],
            [
                'apartment_id' => 4,
                'sender_email' => 'alessandra.neri@gmail.com',
                'sender_name' => 'Alessandra Neri',
                'text' => 'Salve, volevo sapere se l’appartamento accetta animali domestici. Ho un cane di piccola taglia e vorrei sapere se ci sono regole specifiche riguardo gli animali nel condominio. Inoltre, vorrei maggiori informazioni sulla disponibilità del parcheggio nella zona e se è incluso un posto auto privato.',
                'date' => '2024-09-03 09:15:00',
                'seen_date' => null
            ],
            [
                'apartment_id' => 1,
                'sender_email' => 'francesco.marino@gmail.com',
                'sender_name' => 'Francesco Marino',
                'text' => 'Buongiorno, sono molto interessato all’appartamento che avete messo in affitto. Volevo chiedere se è possibile organizzare una visita durante il fine settimana. Inoltre, mi interesserebbe sapere se il prezzo è trattabile e se c’è qualche costo aggiuntivo oltre all’affitto mensile, come le spese condominiali.',
                'date' => '2024-09-03 10:00:00',
                'seen_date' => '2024-09-03 11:20:00'
            ],
            [
                'apartment_id' => 2,
                'sender_email' => 'sara.galli@gmail.com',
                'sender_name' => 'Sara Galli',
                'text' => 'Salve, vorrei sapere se l’appartamento è ancora disponibile per un affitto a lungo termine. Sto cercando un appartamento per me e la mia famiglia e il vostro sembra essere perfetto. Vorrei sapere se l’affitto include tutte le spese e quali sono i termini del contratto. Grazie per la disponibilità.',
                'date' => '2024-09-04 12:10:00',
                'seen_date' => null
            ],
            [
                'apartment_id' => 3,
                'sender_email' => 'giorgio.lombardi@gmail.com',
                'sender_name' => 'Giorgio Lombardi',
                'text' => 'Buongiorno, sono interessato a visionare l’appartamento. Vorrei sapere se ci sono restrizioni per quanto riguarda le ristrutturazioni o modifiche interne, in quanto sto cercando un appartamento in cui poter personalizzare alcuni dettagli. Inoltre, sarei grato se poteste confermarmi la disponibilità di un garage o di un posto auto.',
                'date' => '2024-09-04 13:45:00',
                'seen_date' => '2024-09-04 15:30:00'
            ],
            [
                'apartment_id' => 4,
                'sender_email' => 'elena.ferrari@gmail.com',
                'sender_name' => 'Elena Ferrari',
                'text' => 'Salve, sto cercando un appartamento per un contratto di affitto di lungo termine. Mi chiedevo se fosse possibile avere maggiori dettagli sui costi aggiuntivi, come le spese condominiali o eventuali costi di manutenzione straordinaria. Inoltre, potreste dirmi se c’è un limite massimo di persone che possono abitare nell’appartamento?',
                'date' => '2024-09-04 08:00:00',
                'seen_date' => null
            ],
            [
                'apartment_id' => 1,
                'sender_email' => 'marco.damiani@gmail.com',
                'sender_name' => 'Marco Damiani',
                'text' => 'Buongiorno, vorrei avere maggiori informazioni sull’appartamento. Sarei interessato a visitarlo, ma prima vorrei sapere se il riscaldamento è autonomo o centralizzato e quali sono le spese medie per le utenze. Inoltre, volevo chiedere se c’è un balcone o una terrazza privata nell’appartamento.',
                'date' => '2024-09-05 10:20:00',
                'seen_date' => '2024-09-05 12:00:00'
            ],
            [
                'apartment_id' => 2,
                'sender_email' => 'laura.rinaldi@gmail.com',
                'sender_name' => 'Laura Rinaldi',
                'text' => 'Salve, sono alla ricerca di un appartamento nella vostra zona e ho visto il vostro annuncio. Vorrei sapere se l’appartamento è disponibile da subito e se il contratto di affitto prevede delle penali in caso di risoluzione anticipata. Sarei interessata a una visita quanto prima.',
                'date' => '2024-09-05 11:30:00',
                'seen_date' => '2024-09-05 13:00:00'
            ],
            [
                'apartment_id' => 3,
                'sender_email' => 'paolo.borelli@gmail.com',
                'sender_name' => 'Paolo Borelli',
                'text' => 'Buongiorno, vorrei sapere se l’appartamento è arredato o se è vuoto. Sto cercando una soluzione già arredata per non dover comprare nuovi mobili. In aggiunta, mi piacerebbe avere informazioni sulla connessione Internet nella zona e se l’appartamento è già dotato di una linea o se è necessario installarla.',
                'date' => '2024-09-06 14:00:00',
                'seen_date' => null
            ],
            [
                'apartment_id' => 4,
                'sender_email' => 'valeria.pellegrini@gmail.com',
                'sender_name' => 'Valeria Pellegrini',
                'text' => 'Salve, vorrei sapere se c’è la possibilità di fare una visita virtuale dell’appartamento. Sono molto interessata ma vivo attualmente in un’altra città, quindi una visita di persona potrebbe essere complicata. Vorrei inoltre sapere se l’appartamento è disponibile per una famiglia con bambini.',
                'date' => '2024-09-06 15:30:00',
                'seen_date' => '2024-09-06 17:00:00'
            ],
            [
                'apartment_id' => 1,
                'sender_email' => 'andrea.parisi@gmail.com',
                'sender_name' => 'Andrea Parisi',
                'text' => 'Buongiorno, sono interessato all’affitto dell’appartamento e vorrei avere maggiori dettagli riguardo la durata minima del contratto. Sto cercando una soluzione per almeno un anno, ma vorrei sapere se ci sono clausole particolari che riguardano la durata. Grazie per la risposta.',
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
