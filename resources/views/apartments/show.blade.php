@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/sass/apartments/show.scss'])
@endsection

@php
use Carbon\Carbon;
@endphp


@section('content')
    @if (Auth::user()->id == $apartment->user_id)
        <div class="container apartment-show" id="show">
            <div class="row">
                <!-- Left Column: Image and Services -->
                <div class="col-lg-8 col-md-12 col-sm-12 mb-4 order-2 px-3">
                    <!-- IMG section -->
                    <div class="apartment-img mb-4">
                        <img src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->name }}"
                            class="img-fluid apartment-image rounded shadow">
                    </div>

                    <!-- Services section -->
                    <div class="apartment-services mt-3">
                        <h3 class="mb-3">Servizi offerti</h3>
                        @if ($apartment->services->isNotEmpty())
                            <ul class="list-unstyled">
                                @foreach ($apartment->services as $service)
                                    <span class="me-4">
                                        <i class="{{ $service->icon }} fs-5 mt-1"></i>
                                            {{ $service->name }}
                                    </span>
                                @endforeach
                            </ul>
                        @else
                            <p>Nessun servizio inserito</p>
                        @endif
                    </div>
                </div>
                <div class="container order-1">
                    <div class="row d-flex flex-column flex-md-row p-2">
                        <div class="col-md-8 col-12">
                            <h1 class="apartment-name mb-3">{{ $apartment->name }}</h1>
                            <p class="apartment-description mb-3">{{ $apartment->description }}</p>
                        </div>

                        <div class="col-md-4 col-12 d-flex justify-content-end justify-content-md-center align-items-center">
                            <!-- HTML !-->
                        <a class="custom-btn custom-btn-green" href="{{ route('checkout',$apartment) }}" role="button">Sponsorizza!</a>

                        </div>

                    </div>

                </div>

                <!-- Right column: Infos and edit button -->
                <div class="col-lg-4 col-12 order-3 rgt-column p-4">
                    <div class="details">

                        <!-- Sponsorizzazione attiva -->
                        @if ($activeSponsorship)
                        <div >
                            <p class="d-flex flex-column">
                                Sponsorizzazione attiva:
                                <span class="sponsorship
                                    @if ($activeSponsorship->id == 1) badge-silver
                                    @elseif($activeSponsorship->id == 2) badge-gold
                                    @elseif($activeSponsorship->id == 3) badge-platinum @endif">
                                    {{ $activeSponsorship->name }}
                                </span>
                                Fino a: {{ \Carbon\Carbon::parse($activeSponsorship->pivot->end_date)->format('d/m/Y H:i') }}
                            </p>
                        </div>
                        @endif

                        <!-- Sponsorizzazioni future -->
                        @if ($futureSponsorships->isNotEmpty())
                        <h4>Prossime sponsorizzazioni:</h4>
                        <div class="scrollable-sponsorships mt-3">
                            @foreach ($futureSponsorships as $sponsorship)
                                <div>
                                    <p class="ms-2">{{ $sponsorship->name }} fino a: {{ \Carbon\Carbon::parse($sponsorship->pivot->end_date)->format('d/m/Y H:i') }}</p>
                                </div>
                            @endforeach
                        </div>
                        @endif


                        <p class="apartment-price mb-2"><strong>Prezzo:</strong> €{{ $apartment->price }}</p>
                        <p class="apartment-surface mb-2"><strong>Superficie:</strong> {{ $apartment->surface }} m²</p>
                        <p class="apartment-rooms mb-2"><strong>Stanze:</strong> {{ $apartment->n_room }}</p>
                        <p class="apartment-beds mb-2"><strong>Letti:</strong> {{ $apartment->n_bed }}</p>
                        <p class="apartment-bathrooms mb-2"><strong>Bagni:</strong> {{ $apartment->n_bath }}</p>
                        <p class="apartment-address mb-2"><strong>Indirizzo:</strong> {{ $apartment->address }}</p>
                        <p class="apartment-lat-lng mb-2">
                            <strong>Latitudine:</strong> {{ $apartment->latitude }}
                            <strong>Longitudine:</strong> {{ $apartment->longitude }}
                        </p>
                        <p class="apartment-created mb-2"><strong>Creato il giorno:</strong> {{ $apartment->created_at }}</p>
                        <p class="apartment-updated mb-2"><strong>Ultimo aggiornamento:</strong>
                            {{ $apartment->updated_at }}
                        </p>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <p class="m-0"><strong>Visibilit&agrave;:</strong></p>
                        <form class="ms-2" action="{{route('apartment.visibility', $apartment)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Switch -->
                            <label class="switch">
                                <input type="checkbox" name="visible" {{ $apartment->visible === 1 ? 'checked' : '' }} onchange="this.form.submit()">
                                <span class="slider"></span>
                            </label>
                        </form>
                    </div>

                    <!-- Edit button -->
                    <div class="text-center order-lg-3 order-sm-3 d-flex flex-wrap justify-content-around mt-3">
                        <button href="{{ route('apartments.edit', $apartment) }}"
                            class="custom-btn custom-btn-yellow">Modifica
                        </button>
                        <form action="{{ route('apartments.destroy', $apartment) }}" class="form-delete" method="POST"
                            data-apartment-name="{{ $apartment->name }}">
                            @method('delete')
                            @csrf
                            <button class="custom-btn custom-btn-red" type="submit">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{ @abort(404) }} {{-- if it's not your apartment --}}
    @endif
@endsection


@section('scripts')
    @vite('resources/js/delete-confirmation.js')
@endsection
