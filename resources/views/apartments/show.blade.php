@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
@endsection

@section('content')
    <div class="container apartment-show" id="show">
        <div class="row">
            <!-- Left Column: Image and Services -->
            <div class="col-lg-8 col-md-8 col-sm-12 mb-4 order-lg-2 order-md-2 order-sm-2">
                <!-- IMG section -->
                <div class="apartment-img mb-4">
                    <img src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->name }}" class="img-fluid apartment-image rounded shadow">
                </div>

                <!-- Services section -->
                <div class="apartment-services">
                    <h3 class="mb-3">Offered services</h3>
                    @if ($apartment->services->isNotEmpty())
                        <ul class="list-unstyled">
                            @foreach ($apartment->services as $service)
                                <span>
                                    <strong>
                                        {{ $service->name }}
                                    </strong>
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>
                            @endforeach
                        </ul>
                    @else
                        <p>//</p>
                    @endif
                </div>
            </div>

            <!-- Right column: Infos and edit button -->
            <div class="col-lg-4 col-md-4 col-sm-12 order-lg-2 order-md-2 order-sm-1 ">
                <div class="details">
                    <h1 class="apartment-name mb-3">{{ $apartment->name }}</h1>
                    <p class="apartment-description mb-2">{{ $apartment->description }}</p>
                    <!-- Badge Sponsorship -->
                    @if ($apartment->sponsorships->isNotEmpty())
                        @foreach ($apartment->sponsorships as $sponsorship)
                            <span
                                class="sponsorship
                        @if ($sponsorship->id == 1) badge-silver
                        @elseif($sponsorship->id == 2) badge-gold
                        @elseif($sponsorship->id == 3) badge-platinum
                        @endif">
                                {{ $sponsorship->name }}
                            </span>
                        @endforeach
                </div>
                @else
                    <p>No sponsorship plan active</p>
                @endif
                <p class="apartment-price mb-2"><strong>Price:</strong> €{{ $apartment->price }}</p>
                <p class="apartment-surface mb-2"><strong>Surface:</strong> {{ $apartment->surface }} m²</p>
                <p class="apartment-rooms mb-2"><strong>Rooms:</strong> {{ $apartment->n_room }}</p>
                <p class="apartment-beds mb-2"><strong>Beds:</strong> {{ $apartment->n_bed }}</p>
                <p class="apartment-bathrooms mb-2"><strong>Bathrooms:</strong> {{ $apartment->n_bath }}</p>
                <p class="apartment-address mb-2"><strong>Address:</strong> {{ $apartment->address }}</p>
                <p class="apartment-lat-lng mb-2"><strong>Latitude:</strong> {{ $apartment->latitude }},
                    <strong>Longitude:</strong> {{ $apartment->longitude }}
                </p>
                <p class="apartment-created mb-2"><strong>Created in date:</strong> {{ $apartment->created_at }}</p>
                <p class="apartment-updated mb-4"><strong>Last update:</strong> {{ $apartment->updated_at }}</p>

            </div>
            <!-- Edit button -->
            <div class="text-center order-lg-3 order-sm-3">
                <a href="{{ route('apartments.edit', $apartment->id) }}" class="btn custom-btn warning text-decoration-none">Edit</a>
                <form action="{{ route('apartments.destroy', $apartment) }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn custom-btn danger text-decoration-none" type="submit">Delete</button>
                </form>
            </div>



        </div>
    </div>
    </div>
@endsection
