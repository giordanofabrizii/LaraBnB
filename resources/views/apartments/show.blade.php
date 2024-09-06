@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
@endsection

@section('content')
    <div class="container apartment-show" id="show">
        <div class="row">
            <!-- Colonna Sinistra: Immagine e Servizi -->
            <div class="col-lg-8 col-md-8 col-sm-12 mb-4">
                <!-- Sezione Immagine -->
                <div class="apartment-img mb-4">
                    <img src="" alt="{{ $apartment->name }}" class="img-fluid apartment-image rounded shadow">
                </div>

                <!-- Sezione Servizi -->
                <div class="services">
                    <h3 class="mb-3">Servizi Offerti</h3>
                    @if ($apartment->services->isNotEmpty())
                        <ul class="list-unstyled">
                            @foreach ($apartment->services as $service)
                                    <span>
                                        <strong>
                                            {{ $service->name }}
                                        </strong>
                                        {{-- <i class="fa-solid fa-circle-check"></i> --}}
                                    </span>
                            @endforeach
                        </ul>
                    @else
                        <p>//</p>
                    @endif
                </div>
            </div>

            <!-- Colonna Destra: Dettagli e Pulsante Modifica -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="details">
                    <h1 class="apartment-name mb-3">{{ $apartment->name }}</h1>
                    <p class="apartment-description mb-2">{{ $apartment->description }}</p>
                    <p class="apartment-surface mb-2"><strong>Superficie:</strong> {{ $apartment->surface }} m²</p>
                    <p class="apartment-rooms mb-2"><strong>Stanze:</strong> {{ $apartment->n_room }}</p>
                    <p class="apartment-beds mb-2"><strong>Letti:</strong> {{ $apartment->n_bed }}</p>
                    <p class="apartment-bathrooms mb-2"><strong>Bagni:</strong> {{ $apartment->n_bath }}</p>
                    <p class="apartment-address mb-2"><strong>Indirizzo:</strong> {{ $apartment->address }}</p>
                    <p class="apartment-price mb-2"><strong>Prezzo:</strong> €{{ $apartment->price }}</p>
                    <p class="apartment-lat-lng mb-2"><strong>Latitudine:</strong> {{ $apartment->latitude }},
                        <strong>Longitudine:</strong> {{ $apartment->longitude }}
                    </p>
                    <p class="apartment-created mb-2"><strong>Creato il giorno:</strong> {{ $apartment->created_at }}</p>
                    <p class="apartment-updated mb-4"><strong>Ultimo aggiornamento:</strong> {{ $apartment->updated_at }}</p>

                    <!-- Pulsante Modifica -->
                    <div class="text-center">
                        <a href="{{ route('apartments.edit', $apartment->id) }}" class="btn custom-btn text-decoration-none">Modifica</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
