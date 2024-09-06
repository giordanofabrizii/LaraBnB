<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Service;
use App\Http\Requests\StoreApartmentRequest as StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest as UpdateApartmentRequest;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    /**
     * index of all the apartments
     *
     * @return view
     */
    public function index () {
        $apartments = Apartment::all();

        return view('apartments.index', compact('apartments'));
    }

    /**
     * show a specific apartment
     *
     * @param Apartment $apartment
     * @return view
     */
    public function show (Apartment $apartment) {

        $apartment->load('services');

        return view('apartments.show', compact('apartment'));
    }

    /**
     * create a new apartment
     *
     * @return view
     */
    public function create () {
        $services = Service::all();

        return view('apartments.create',compact('services'));
    }

    /**
     * store a new apartment with the custom request
     *
     * @return view
     */
    public function store (StoreApartmentRequest $request) {
        $data = $request->validated();
        // take the user logged id
        $data['user_id'] = Auth::user()->id;

        $apartment = new Apartment($data);
        $apartment->save();

        return redirect()->Route('apartments.show',$apartment);
    }

    /**
     * edit an existing apartment
     *
     * @param  Apartment $apartment
     * @return view
     */
    public function edit (Apartment $apartment){
        $services = Service::all();

        return view('apartments.edit',compact('services', 'apartment'));
    }

    /**
     * update an existing apartment with the request
     *
     * @param Apartment $apartment
     * @param UpdateApartmentRequest $request
     * @return view
     */
    public function update (Apartment $apartment, UpdateApartmentRequest $request) {
        $data = $request->validated();

        $apartment->update($data);
        return redirect()->Route('apartments.show',$apartment);
    }

    /**
     * Permanent delete an apartment
     *
     * @param Apartment $apartment
     * @return void
     */

  
    public function destroy (Apartment $apartment) {

        $apartment->delete();
        return redirect()->Route('apartments.index');
    }
}
