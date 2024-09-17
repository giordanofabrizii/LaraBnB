<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\Message;

class ApiController extends Controller
{


    public function show(Apartment $apartment){

        $apartment->loadMissing("services");

        return response()->json([
            'success' => true,
            'results' => $apartment
        ]);
    }


    public function getSponsoredApartments()
    {
        $sponsoredApartments = Apartment::whereHas('sponsorships')->with('sponsorships')->get();

        return response()->json($sponsoredApartments);
    }

    public function research(Request $request)
    {
        $query = Apartment::query(); // take the parameters

        // # NAME
        if (!is_null($request->has('name'))) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        // # SURFACE
        if (!is_null($request->input('surface_min'))) { // minimum value
            $query->where('surface', '>=', $request->input('surface_min'));
        }
        if (!is_null($request->input('surface_max'))) { // maximum value
            $query->where('surface', '<=', $request->input('surface_max'));
        }

        // # ADDRESS
        if (!is_null($request->input('latitude')) && !is_null($request->input('longitude'))) {
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');
            $radius = $request->input('radius', 5000); // default radius of 5 km

            $query->select('*')
            ->selectRaw("
                ( 6371000 * acos( cos( radians(?) ) *
                    cos( radians( latitude ) ) *
                    cos( radians( longitude ) - radians(?) ) +
                    sin( radians(?) ) *
                    sin( radians( latitude ) ) )
                ) AS distance
            ", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance", 'asc');
        }


        // # ROOM
        if ($request->filled('room_number')) { // minimum value
            $query->where('n_room', '>=', $request->input('room_number'));
        }

        // # BATH
        if ($request->filled('bath_number')) { // minimum value
            $query->where('n_bath', '>=', $request->input('bath_number'));
        }

        // # BED
        if ($request->filled('bed_number')) { // minimum value
            $query->where('n_bed', '>=', $request->input('bed_number'));
        }

        // # PRICE
        if ($request->filled('price')){ // maximum value
            $query->where('price', '<=', $request->input('price'));
        }

        // # SERVICES
        if ($request->has('services') && is_array($request->input('services'))) {
            $services = $request->input('services');

            foreach ($services as $service) {
                $query->whereHas('services', function($q) use ($service) {
                    $q->where('name', $service);
                });
            }
        }


        // get the apartments
        $apartments = $query->get();

        return response()->json($apartments); // return the json

    }
    public function message(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'text' => 'required|string',
        ]);

        // Creazione del messaggio
        $message = new Message([
            'apartment_id' => $request['apartment_id'],
            'sender_email' => $validated['email'],
            'sender_name' => $request['name'],
            'text' => $validated['text'],
            'date' => now('Europe/Rome'),
            'seen_date' => null,
        ]);

        $message->save();

        // Risposta di successo
        return response()->json($message);
    }
}
