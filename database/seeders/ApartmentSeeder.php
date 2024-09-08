<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apartments = [
            [
                'user_id' => 1,
                'name' => 'Appartamento moderno a Trastevere',
                'description' => 'Luminoso appartamento con vista sul Tevere, vicino ai migliori ristoranti di Trastevere.',
                'surface' => 85,
                'image' => 'uploads/trastevere_moderno.jpg',
                'n_room' => 4,
                'n_bed' => 3,
                'n_bath' => 2,
                'address' => 'Via della Lungara, 00165 Roma',
                'latitude' => 41.895465,
                'longitude' => 12.466701,
                'price' => 120,
                'visible' => 0
            ],
            [
                'user_id' => 2,
                'name' => 'Elegante attico a Monti',
                'description' => 'Attico con terrazza privata e vista sui Fori Imperiali, nel cuore del rione Monti.',
                'surface' => 120,
                'image' => 'uploads/monti_attico.jpg',
                'n_room' => 5,
                'n_bed' => 3,
                'n_bath' => 2,
                'address' => 'Via dei Serpenti, 00184 Roma',
                'latitude' => 41.893683,
                'longitude' => 12.489873,
                'price' => 180,
                'visible' => 0
            ],
            [
                'user_id' => 3,
                'name' => 'Appartamento accogliente a San Giovanni',
                'description' => 'Delizioso bilocale in zona San Giovanni, perfetto per coppie o piccoli gruppi.',
                'surface' => 60,
                'image' => 'uploads/san_giovanni_accogliente.jpg',
                'n_room' => 3,
                'n_bed' => 2,
                'n_bath' => 1,
                'address' => 'Via Appia Nuova, 00183 Roma',
                'latitude' => 41.879544,
                'longitude' => 12.509348,
                'price' => 90,
                'visible' => 0
            ],
            [
                'user_id' => 4,
                'name' => 'Loft industriale a Testaccio',
                'description' => 'Affascinante loft con elementi di design industriale, situato nel vivace quartiere Testaccio.',
                'surface' => 70,
                'image' => 'uploads/testaccio_loft.jpg',
                'n_room' => 2,
                'n_bed' => 1,
                'n_bath' => 1,
                'address' => 'Via Marmorata, 00153 Roma',
                'latitude' => 41.876095,
                'longitude' => 12.474295,
                'price' => 110,
                'visible' => 0
            ],
            [
                'user_id' => 1,
                'name' => 'Bilocale con giardino a Monteverde',
                'description' => 'Bilocale spazioso con giardino privato, ideale per una vacanza rilassante a Monteverde.',
                'surface' => 65,
                'image' => 'uploads/monteverde_bilocale.jpg',
                'n_room' => 3,
                'n_bed' => 2,
                'n_bath' => 1,
                'address' => 'Via del Vascello, 00152 Roma',
                'latitude' => 41.881047,
                'longitude' => 12.456717,
                'price' => 85,
                'visible' => 1
            ],
            [
                'user_id' => 2,
                'name' => 'Monolocale a Campo de\' Fiori',
                'description' => 'Accogliente monolocale a pochi passi da Campo de\' Fiori, perfetto per un soggiorno romantico.',
                'surface' => 40,
                'image' => 'uploads/campo_de_fiori_monolocale.jpg',
                'n_room' => 1,
                'n_bed' => 1,
                'n_bath' => 1,
                'address' => 'Piazza Campo de\' Fiori, 00186 Roma',
                'latitude' => 41.895972,
                'longitude' => 12.472207,
                'price' => 95,
                'visible' => 1
            ],
            [
                'user_id' => 3,
                'name' => 'Appartamento di lusso a Parioli',
                'description' => 'Appartamento di lusso in zona Parioli, arredato con gusto e dotato di ogni comfort.',
                'surface' => 150,
                'image' => 'uploads/parioli_lusso.jpg',
                'n_room' => 6,
                'n_bed' => 4,
                'n_bath' => 3,
                'address' => 'Via Antonio Bertoloni, 00197 Roma',
                'latitude' => 41.923499,
                'longitude' => 12.483757,
                'price' => 250,
                'visible' => 1
            ],
            [
                'user_id' => 4,
                'name' => 'Appartamento vicino al Colosseo',
                'description' => 'Splendido appartamento a pochi passi dal Colosseo, ideale per visitare le meraviglie di Roma antica.',
                'surface' => 80,
                'image' => 'uploads/colosseo_vicino.jpg',
                'n_room' => 4,
                'n_bed' => 2,
                'n_bath' => 2,
                'address' => 'Via Labicana, 00184 Roma',
                'latitude' => 41.890202,
                'longitude' => 12.498392,
                'price' => 150,
                'visible' => 1
            ],
            [
                'user_id' => 1,
                'name' => 'Appartamento storico a Piazza Navona',
                'description' => 'Esclusivo appartamento situato in un palazzo storico a pochi passi da Piazza Navona.',
                'surface' => 110,
                'image' => 'uploads/navona_storico.jpg',
                'n_room' => 5,
                'n_bed' => 3,
                'n_bath' => 2,
                'address' => 'Via di Tor Millina, 00186 Roma',
                'latitude' => 41.899203,
                'longitude' => 12.472647,
                'price' => 200,
                'visible' => 1
            ],
            [
                'user_id' => 2,
                'name' => 'Appartamento con terrazza a Prati',
                'description' => 'Appartamento con terrazza panoramica, situato nel prestigioso quartiere Prati.',
                'surface' => 95,
                'image' => 'uploads/prati_terrazza.jpg',
                'n_room' => 4,
                'n_bed' => 2,
                'n_bath' => 2,
                'address' => 'Via Crescenzio, 00193 Roma',
                'latitude' => 41.904208,
                'longitude' => 12.463114,
                'price' => 160,
                'visible' => 1
            ],
            [
                'user_id' => 3,
                'name' => 'Appartamento familiare a Flaminio',
                'description' => 'Appartamento spazioso e accogliente, perfetto per famiglie, vicino al Museo MAXXI.',
                'surface' => 130,
                'image' => 'uploads/flaminio_familiare.jpg',
                'n_room' => 5,
                'n_bed' => 3,
                'n_bath' => 2,
                'address' => 'Via Guido Reni, 00196 Roma',
                'latitude' => 41.927448,
                'longitude' => 12.469853,
                'price' => 170,
                'visible' => 1
            ],
            [
                'user_id' => 4,
                'name' => 'Bilocale centrale a Termini',
                'description' => 'Bilocale moderno e ben arredato, a pochi passi dalla stazione Termini.',
                'surface' => 55,
                'image' => 'uploads/termini_bilocale.jpg',
                'n_room' => 3,
                'n_bed' => 2,
                'n_bath' => 1,
                'address' => 'Via Giovanni Giolitti, 00185 Roma',
                'latitude' => 41.899601,
                'longitude' => 12.505611,
                'price' => 80,
                'visible' => 1
            ],
            [
                'user_id' => 1,
                'name' => 'Loft spazioso a Garbatella',
                'description' => 'Loft moderno e spazioso, situato nel caratteristico quartiere Garbatella.',
                'surface' => 75,
                'image' => 'uploads/garbatella_loft.jpg',
                'n_room' => 3,
                'n_bed' => 2,
                'n_bath' => 1,
                'address' => 'Via Giovanni Battista Magnaghi, 00154 Roma',
                'latitude' => 41.863309,
                'longitude' => 12.485978,
                'price' => 100,
                'visible' => 1
            ],
            [
                'user_id' => 2,
                'name' => 'Monolocale a Piazza di Spagna',
                'description' => 'Elegante monolocale a due passi da Piazza di Spagna, ideale per una vacanza romantica.',
                'surface' => 45,
                'image' => 'uploads/piazza_di_spagna_monolocale.jpg',
                'n_room' => 2,
                'n_bed' => 1,
                'n_bath' => 1,
                'address' => 'Via dei Condotti, 00187 Roma',
                'latitude' => 41.905745,
                'longitude' => 12.482324,
                'price' => 130,
                'visible' => 1
            ],
            [
                'user_id' => 3,
                'name' => 'Appartamento moderno a Ostiense',
                'description' => 'Appartamento di design in zona Ostiense, vicino alla Stazione e alla Piramide Cestia.',
                'surface' => 85,
                'image' => 'uploads/ostiense_moderno.jpg',
                'n_room' => 4,
                'n_bed' => 2,
                'n_bath' => 2,
                'address' => 'Via del Porto Fluviale, 00154 Roma',
                'latitude' => 41.871099,
                'longitude' => 12.480868,
                'price' => 115,
                'visible' => 1
            ],
            [
                'user_id' => 4,
                'name' => 'Appartamento tranquillo a Nomentano',
                'description' => 'Ampio appartamento in una zona residenziale tranquilla, ideale per chi cerca relax.',
                'surface' => 100,
                'image' => 'uploads/nomentano_tranquillo.jpg',
                'n_room' => 5,
                'n_bed' => 3,
                'n_bath' => 2,
                'address' => 'Via Nomentana, 00198 Roma',
                'latitude' => 41.922663,
                'longitude' => 12.511126,
                'price' => 140,
                'visible' => 1
            ],
            [
                'user_id' => 1,
                'name' => 'Attico con vista a Gianicolense',
                'description' => 'Splendido attico con vista panoramica sulla città, situato in zona Gianicolense.',
                'surface' => 125,
                'image' => 'uploads/gianicolense_attico.jpg',
                'n_room' => 6,
                'n_bed' => 4,
                'n_bath' => 3,
                'address' => 'Via del Casaletto, 00151 Roma',
                'latitude' => 41.872852,
                'longitude' => 12.431706,
                'price' => 210,
                'visible' => 1
            ],
            [
                'user_id' => 2,
                'name' => 'Appartamento elegante a Balduina',
                'description' => 'Appartamento elegante e spazioso, situato nella zona residenziale di Balduina.',
                'surface' => 110,
                'image' => 'uploads/balduina_elegante.jpg',
                'n_room' => 5,
                'n_bed' => 3,
                'n_bath' => 2,
                'address' => 'Via della Balduina, 00136 Roma',
                'latitude' => 41.919544,
                'longitude' => 12.441545,
                'price' => 160,
                'visible' => 1
            ],
            [
                'user_id' => 3,
                'name' => 'Monolocale artistico a Trionfale',
                'description' => 'Monolocale con decorazioni artistiche uniche, situato nel vivace quartiere Trionfale.',
                'surface' => 50,
                'image' => 'uploads/trionfale_artistico.jpg',
                'n_room' => 2,
                'n_bed' => 1,
                'n_bath' => 1,
                'address' => 'Via Trionfale, 00195 Roma',
                'latitude' => 41.914636,
                'longitude' => 12.448457,
                'price' => 95,
                'visible' => 1
            ],
            [
                'user_id' => 4,
                'name' => 'Appartamento panoramico a Esquilino',
                'description' => 'Appartamento con splendida vista su Roma, situato nel quartiere Esquilino, vicino a Santa Maria Maggiore.',
                'surface' => 90,
                'image' => 'uploads/esquilino_panoramico.jpg',
                'n_room' => 4,
                'n_bed' => 2,
                'n_bath' => 2,
                'address' => 'Via Merulana, 00185 Roma',
                'latitude' => 41.894688,
                'longitude' => 12.499294,
                'price' => 150,
                'visible' => 1
            ]
        ];

        foreach ($apartments as $apartmentData) {
            $newApartment = new Apartment();
            $newApartment->user_id = $apartmentData['user_id'];
            $newApartment->name = $apartmentData['name'];
            $newApartment->description = $apartmentData['description'];
            $newApartment->surface = $apartmentData['surface'];
            $newApartment->image = $apartmentData['image'];
            $newApartment->n_room = $apartmentData['n_room'];
            $newApartment->n_bed = $apartmentData['n_bed'];
            $newApartment->n_bath = $apartmentData['n_bath'];
            $newApartment->address = $apartmentData['address'];
            $newApartment->latitude = $apartmentData['latitude'];
            $newApartment->longitude = $apartmentData['longitude'];
            $newApartment->price = $apartmentData['price'];
            $newApartment->visible = $apartmentData['visible'];
            $newApartment->save();
        }
    }
}
