<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
class ApiController extends Controller
{
    public function getSponsoredApartments()
    {
        $sponsoredApartments = Apartment::whereHas('sponsorships')->with('sponsorships')->get();

        return response()->json($sponsoredApartments);
    }
}
