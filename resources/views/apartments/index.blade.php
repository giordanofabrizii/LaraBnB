@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/apartments/index.scss', 'resources/sass/apartments/modale.scss'])
@endsection


@section('content')
    <div class="container" id="index">
        <div class="top">
            <h1>I tuoi appartamenti</h1>
            <div class="trashed-link text-end mt-4">
                <a class="btn btn-lg btn-warning text-decoration-none text-end me-3" href="{{ route('apartments.trashed') }}">
                    Vai al cestino
                </a>
            </div>
        </div>
        <div class="card-list d-flex flex-column justify-content-center">
            @foreach ($apartments as $apartment)
                @if (Auth::user()->id == $apartment['user_id'])
                    <div class="card mb-4">
                        <div class="row g-0 flex-column flex-md-row">
                            <div class="image col-12 col-lg-6 col-xl-4">
                                <img src="{{ asset('storage/' . $apartment->image) }}" class="img-fluid rounded-start"
                                    alt="{{ $apartment->name }} image">
                            </div>
                            <div class="col-12 col-lg-6 col-xl-8">
                                <div class="card-body p-5">
                                    <a class="title" href="{{ route('apartments.show', $apartment) }}">
                                        <h2 class="card-title mb-4">{{ $apartment->name }}</h2>
                                    </a>
                                    <span class="card-text me-2">Sponsorizzazione:</span>
                                    @if ($apartment->sponsorships->isNotEmpty())
                                        @foreach ($apartment->sponsorships as $sponsorship)
                                            <span
                                                class="sponsorship
                                                @if ($sponsorship->id == 1) badge-silver
                                                @elseif($sponsorship->id == 2) badge-gold
                                                @elseif($sponsorship->id == 3) badge-platinum @endif">
                                                {{ $sponsorship->name }}
                                            </span>
                                        @endforeach
                                    @else
                                        <span><small>Nessuna sponsorizzazione in corso</small></span>
                                    @endif

                                    <div class="visibility d-flex align-items-baseline mb-2">
                                        @if ($apartment->visible == 1)
                                            <p class="card-text me-3" class="text-body-secondary"> Visibilità:</p>
                                            <div class="green circle"></div>
                                        @else
                                            <p class="card-text me-3" class="text-body-secondary"> Visibilità:</p>
                                            <div class="red circle"></div>
                                        @endif
                                    </div>

                                    <div class="buttons d-flex align-items-center justify-content-end mt-5" >
                                        <a class="btn btn-lg me-3" href="{{ route('apartments.edit', $apartment) }}">
                                            Modifica
                                        </a>
                                        <a href="{{ route('checkout',$apartment) }}" class="btn btn-primary me-3">
                                            Sponsorizza
                                        </a>
                                        <button type="button" class="btn btn-lg btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $apartment->id}}">
                                            Elimina
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grey" id="grey">

                    </div>
                    <div class="modal fade" id="deleteModal{{$apartment->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div>
                                    <h1 id="deleteModalLabel" class="orange">Elimina appartamento</h1>

                                </div>
                                <div class="modal-body">
                                    <p>Sei sicuro di voler eliminare <strong>"{{ $apartment->name }}"</strong>?</p>
                                    <div class="alert alert-warning warning">
                                        <h2><i class="fa-solid fa-triangle-exclamation"></i> Attenzione</h2>
                                        <p>L'eliminazione di questo appartamento non sarà definitiva. Puoi ripristinare il tuo appartamento nel cestino.</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route('apartments.destroy', $apartment) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

    @endsection
