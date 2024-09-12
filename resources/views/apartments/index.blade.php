@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/apartments/index.scss'])
@endsection


@section('content')
<div class="container" id="index">
    <h1 class="mb-5">I tuoi appartamenti</h1>

    <div class="card-list d-flex flex-column justify-content-center">
        @foreach ($apartments as $apartment)
            @if (Auth::user()->id == $apartment['user_id'])
            <div class="card mb-4">
                <div class="row g-0 flex-column flex-md-row">
                    <div class="image col-12 col-lg-6 col-xl-4">
                        <img src="{{ asset('storage/' . $apartment->image) }}" class="img-fluid rounded-start" alt="{{ $apartment->name}} image">
                    </div>
                    <div class="col-12 col-lg-6 col-xl-8">
                        <div class="card-body p-5">
                            <a class="title" href="{{ route('apartments.show',$apartment) }}">
                                <h2 class="card-title mb-4">{{ $apartment->name}}</h2>
                            </a>
                            <span class="card-text me-2">Sponsorizzazione:</span>
                                @if ($apartment->sponsorships->isNotEmpty())
                                    @foreach ($apartment->sponsorships as $sponsorship)
                                            <span class="sponsorship
                                                @if ($sponsorship->id == 1) badge-silver
                                                @elseif($sponsorship->id == 2) badge-gold
                                                @elseif($sponsorship->id == 3) badge-platinum
                                                @endif">
                                                {{ $sponsorship->name }}
                                            </span>
                                    @endforeach
                                @else
                                    <span><small>Nessuna sponsorizzazione in corso</small></span>
                                @endif

                                <div class="visibility d-flex align-items-baseline mb-2">
                                    @if ( $apartment->visible == 1)
                                        <p class="card-text me-3" class="text-body-secondary"> Visibilità:</p>
                                        <div class="green circle"></div>
                                    @else
                                        <p class="card-text me-3" class="text-body-secondary"> Visibilità:</p>
                                        <div class="red circle"></div>
                                    @endif
                                </div>

                                <div class="buttons d-flex align-items-center justify-content-end mt-5">
                                    <a class="btn btn-lg me-3" href="{{ route('apartments.edit', $apartment) }}">
                                        Modifica
                                    </a>
                                    <form action="{{route('apartments.destroy', $apartment)}}" class="form-delete" method="POST" data-apartment-name="{{$apartment->name}}">
                                        @method("delete")
                                        @csrf
                                        <button class="btn btn-lg btn-outline-danger text-decoration-none my-2" type="submit">
                                            Elimina
                                        </button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>

@endsection


@section('scripts')
    @vite('resources/js/delete-confirmation.js')
@endsection
