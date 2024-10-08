<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::user()->id) // appartamenti dell'id
            ->take(3) // solo 3 appartamenti
            ->get();

        return view('home', compact('apartments'));
    }

    // Show the inbox
    public function inbox()
    {
        $userId = Auth::id();

        $messages = Message::whereIn('apartment_id', function($query) use ($userId) {
            $query->select('id')
                ->from('apartments')
                ->where('user_id', $userId);
            })
            ->with('apartment')
            ->get()
            ->groupBy('apartment_id');
        $notseen = Message::whereNull('seen_date')
            ->whereIn('apartment_id', function($query) use ($userId) {
                $query->select('id')
                    ->from('apartments')
                    ->where('user_id', $userId);
            })
            ->get()
            ->groupBy('apartment_id');
        return view('inbox', compact('messages', 'notseen'));
    }

    public function seen(Message $message){
        // update the message "seen_date" value
        $message['seen_date'] = Carbon::now('Europe/Rome');

        // Salva le modifiche nel database
        $message->save();

        return redirect()->route('inbox');
    }
}
