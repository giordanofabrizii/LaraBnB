<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){

        $apartments = Apartment::with("services")->paginate(10);

        return response()->json(
        [
            'success' => true,
            'results' => $apartments
        ]);

    }


    public function show(Apartment $apartment){

        $apartment->loadMissing("services");

        return response()->json([
            'success' => true,
            'results' => $apartment
        ]);
    }
}