@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/sass/apartments/show.scss'])
@endsection

@section('content')
    @if (Auth::user()->id == $apartment->user_id)
        <div class="container apartment-show" id="show">
            <div class="row">
                <!-- Left Column: Image and Services -->
                <div class="col-lg-8 col-md-12 col-sm-12 mb-4 order-lg-1 order-md-1 order-sm-1">
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
                                    <span>
                                        <i class= "{{ $service->icon }} me-1"></i>
                                        <strong>
                                            {{ $service->name }}
                                        </strong>
                                    </span>
                                @endforeach
                            </ul>
                        @else
                            <p>Nessun servizio inserito</p>
                        @endif
                    </div>
                </div>

                <!-- Right column: Infos and edit button -->
                <div class="col-lg-4 col-md-12 col-sm-12 order-lg-2 order-md-2 order-sm-2 rgt-column p-4">
                    <div class="details">
                        <h1 class="apartment-name mb-3">{{ $apartment->name }}</h1>
                        <p class="apartment-description mb-2">{{ $apartment->description }}</p>

                        <!-- Badge Sponsorship -->
                        @if ($apartment->sponsorships->isNotEmpty())
                            @foreach ($apartment->sponsorships as $sponsorship)
                                <div class="d-flex align-items-center gap-4">
                                    <p><strong>Il tuo piano attivo:</strong></p>
                                    <span
                                        class="sponsorship
                                        @if ($sponsorship->id == 1) badge-silver
                                        @elseif($sponsorship->id == 2) badge-gold
                                        @elseif($sponsorship->id == 3) badge-platinum @endif">
                                        {{ $sponsorship->name }}
                                    </span>
                                </div>
                            @endforeach
                        @else
                            <p>Nessuna sponsorizzazione in corso</p>
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
                        <p class="m-0"><strong>Visibilit&agrave;:</strong> {{ ($apartment->visible === 0) ? 'non visibile' : 'visibile' }}</p>
                        <form class="ms-2" action="{{route('apartment.visibility', $apartment)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <button class="btn btn-warning" type="submit">Switch</button>
                        </form>
                    </div>

                    <!-- Edit button -->
                    <div class="text-center order-lg-3 order-sm-3 d-flex flex-wrap justify-content-around mt-3">
                        <a href="{{ route('apartments.edit', $apartment) }}"
                            class="btn custom-btn warning text-decoration-none my-2">Modifica
                        </a>
                        <form action="{{ route('apartments.destroy', $apartment) }}" class="form-delete" method="POST"
                            data-apartment-name="{{ $apartment->name }}">
                            @method('delete')
                            @csrf
                            <button class="btn custom-btn danger text-decoration-none my-2" type="submit">Elimina</button>
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
