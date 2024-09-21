@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/trashed.scss', 'resources/sass/apartments/modale.scss'])
@endsection


@section('content')
<div class="container" id="trashed">
    <div class="row">
        <h1 class="col-12">Appartamenti nel cestino</h1>
        @if (count($apartments) > 0)
            <div class="card-list d-flex flex-column justify-content-center">
                @foreach ($apartments as $apartment)
                    @if (Auth::user()->id == $apartment['user_id'])
                        <div class="card mb-4">
                            <div class="row g-0 flex-column flex-md-row">
                                <div class="image-container col-12 col-md-4">
                                    <img src="{{ asset('storage/' . $apartment->image) }}" class="img-fluid rounded-start"
                                        alt="{{ $apartment->name }} image">
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="card-body p-4">
                                        <a class="title" href="{{ route('apartments.show', $apartment) }}">
                                            <h2 class="card-title mb-3">{{ $apartment->name }}</h2>
                                        </a>

                                        <p class="card-text"><strong>Indirizzo:</strong> {{ $apartment->address }}</p>

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <span class="card-text me-2"><strong>Camere da letto:</strong> {{ $apartment->n_room }}</span>
                                                <span class="card-text me-2"><strong>Letti:</strong> {{ $apartment->n_bed }}</span>
                                                <span class="card-text me-2"><strong>Bagni:</strong> {{ $apartment->n_bath }}</span>
                                            </div>
                                        </div>


                                        <div class="buttons d-flex gap-3 justify-content-end mt-4">
                                            <button type="button" class="custom-btn custom-btn-yellow" data-bs-toggle="modal" data-bs-target="#restoreModal{{ $apartment->id }}">
                                                Ripristina
                                            </button>
                                            <button type="button" class="custom-btn custom-btn-red" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $apartment->id }}">
                                                Elimina
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modale Ripristino --}}
                        <div class="modal fade" id="restoreModal{{ $apartment->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div>
                                        <h1 id="deleteModalLabel">Ripristina Appartamento</h1>
                                    </div>
                                    <div class="modal-body">
                                        <p>Sei sicuro di voler ripristinare <strong>"{{ $apartment->name }}"</strong>?</p>
                                        <div class="alert alert-warning warning">
                                            <h2><i class="fa-solid fa-triangle-exclamation"></i> Attenzione</h2>
                                            <p>Il ripristino dell'appartamento sarà immediato e risulterà automaticamente visibile.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{ route('apartments.restore', $apartment->id) }}" method="POST">
                                            @method('patch')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-warning">Ripristina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modale Eliminazione --}}
                        <div class="modal fade" id="deleteModal{{ $apartment->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div>
                                        <h1 id="deleteModalLabel">Elimina Appartamento Definitivamente</h1>
                                    </div>
                                    <div class="modal-body">
                                        <p>Sei sicuro di voler eliminare <strong>"{{ $apartment->name }}"</strong>?</p>
                                        <div class="alert alert-danger">
                                            <h2><i class="fa-solid fa-triangle-exclamation"></i> Attenzione</h2>
                                            <p>L'eliminazione di questo appartamento sarà definitiva, l'azione non è reversibile.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{ route('apartments.forceDestroy', $apartment->id) }}" method="POST">
                                            @method('delete')
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
        @else
            <p>Nessun appartamento presente nel cestino</p>
        @endif
    </div>
</div>
@endsection
