<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;


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
        $messages = Message::all();
        $notseen = Message::where('seen_date', null)
            ->get();
        return view('inbox', compact('messages', 'notseen'));
    }
}
