<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;
use App\Http\Requests\StoreApartmentRequest as StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest as UpdateApartmentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;


class ApartmentController extends Controller
{
    /**
     * index of all the apartments
     *
     * @return view
     */
    public function index() {
        $apartments = Apartment::with(['sponsorships' => function($query) {

            $query->orderBy('pivot_start_date', 'asc')
                    ->wherePivot('end_date', '>', now());
        }])->get();

        return view('apartments.index', compact('apartments'));
    }

    /**
     * show a specific apartment
     *
     * @param Apartment $apartment
     * @return view
     */
    public function show(Apartment $apartment) {
        $apartment->load(['services', 'sponsorships' => function($query) {
            $query->orderBy('pivot_start_date', 'asc');
        }]);


        $activeSponsorship = $apartment->sponsorships()
            ->wherePivot('end_date', '>', now())
            ->orderBy('pivot_start_date', 'asc')
            ->first();


        $futureSponsorships = $apartment->sponsorships()
            ->wherePivot('end_date', '>', now())
            ->where('sponsorship_id', '!=', optional($activeSponsorship)->id)
            ->orderBy('pivot_start_date', 'asc')
            ->get();

        return view('apartments.show', compact('apartment', 'activeSponsorship', 'futureSponsorships'));
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
        // store the image
        $img_path = $request->file('image')->store('uploads', 'public');
        $data['image'] = $img_path; // Save the path in the $data

        if ($request->filled('address')) {
            $data['address'] = $request->input('address');
        }

        if ($request->filled('latitude') && $request->filled('longitude')) {
        $data['latitude'] = $request->input('latitude');
        $data['longitude'] = $request->input('longitude');
        }

        $apartment = new Apartment($data);
        $apartment->save();
        $apartment->services()->sync($data['services']);
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
    public function update (UpdateApartmentRequest $request, Apartment $apartment) {
        $data = $request->validated();
        if ($request->hasFile('image')) { // if the user wants to replace the image
            if ($apartment->image) {
                Storage::disk('public')->delete($apartment->image); // delete the hold image
            }

            // save the image on the storage
            $img_path = $request->file('image')->store('uploads', 'public');

            // Aupdate the path in the $data
            $data['image'] = $img_path;
        }

        // Update address
        if ($request->filled('address')) {
            $data['address'] = $request->input('address');
        }

        // Update latitude and longitude
        if ($request->filled('latitude') && $request->filled('longitude')) {
        $data['latitude'] = $request->input('latitude');
        $data['longitude'] = $request->input('longitude');
        }

        $apartment->update($data);
        $apartment->services()->sync($data['services']);
        return redirect()->Route('apartments.show',$apartment);
    }

    /**
     * Soft delete an apartment
     *
     * @param Apartment $apartment
     * @return void
     */
    public function destroy (Apartment $apartment) {
        $apartment->delete();
        return redirect()->Route('apartments.index');
    }

    /**
     * Permanent delete an apartment
     *
     * @param Apartment $apartment
     * @return void
     */
    public function forceDestroy ($id) {
        $apartment = Apartment::onlyTrashed()->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $apartment->forceDelete();
        return redirect()->route('apartments.index');
    }

    /**
     * View all the deleted apartment
     *
     * @return view
     */
    public function trashed()
    {
        $apartments = Apartment::onlyTrashed()
                ->where('user_id', Auth::user()->id)
                ->get();
        return view('apartments.trashed', compact('apartments'));
    }

    /**
     * Restore a deleted apartment
     *
     * @param Apartment $apartment
     * @return void
     */
    public function restore($id)
    {
        $apartment = Apartment::onlyTrashed()->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $apartment->restore();
        return redirect()->route('apartments.index')->with('success', 'Apartment restored successfully.');
    }

    public function statistics() {
        $apartments = Apartment::where('user_id', Auth::user()->id)->get();
        return view('apartments.statistics', compact('apartments'));
    }


    //function to get views per month for every apartment
    public function getViewsData()
    {
        $data = [];

        $apartments = Apartment::with(['visualizations' => function($query) {
            // get last 6 months views
            $query->where('date', '>=', Carbon::now()->subMonths(12)->startOfMonth());
        }])->get();

        foreach ($apartments as $apartment) {
            $viewsByMonth = $apartment->visualizations
                ->groupBy(function($date) {
                    return Carbon::parse($date->date)->format('m-Y');
                })
                ->map(function($group) {
                    // get number of views by month
                    return $group->count();
                });

            // Ordina le visualizzazioni per mese in ordine crescente (m-Y)
            $viewsByMonth = $viewsByMonth->toArray(); // Converte in array
            uksort($viewsByMonth, function ($a, $b) {
                // Confronta le date in formato m-Y usando Carbon
                $dateA = Carbon::createFromFormat('m-Y', $a);
                $dateB = Carbon::createFromFormat('m-Y', $b);
                return $dateA->lt($dateB) ? -1 : 1;
            });

            $data[] = [
                'apartment_id' => $apartment->id,
                'apartment_name' => $apartment->name,
                'views_by_month' => $viewsByMonth
            ];
        }

        return response()->json($data);
    }


        public function getActiveSponsorship()
    {
        return $this->sponsorships()
            ->wherePivot('end_date', '>', now())
            ->orderByRaw("FIELD(name, 'Platinum', 'Gold', 'Silver') ASC")
            ->first();
    }
    // switch the visible attribute
        public function visibleToggle(Apartment $apartment){
            if ($apartment->visible === 0){
                $apartment->visible = 1;
            } else {
                $apartment->visible = 0;
            }

            $apartment->update();

            return redirect()->route('apartments.show',compact('apartment'));

    }

}
