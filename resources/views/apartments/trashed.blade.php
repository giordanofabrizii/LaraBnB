@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/sass/index.scss', 'resources/sass/apartments/modale.scss'])
@endsection


@section('content')
<div class="container" id="index">
    <div class="row">
        <h1 class="col-12">Appartamenti nel cestino</h1>
        @if (count($apartments) > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col" class="text-center">Visibilità</th>
                        <th scope="col" class="text-center">Camere da letto</th>
                        <th scope="col" class="text-center">Letti</th>
                        <th scope="col" class="text-center">Bagni</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($apartments as $apartment)
                        @if (Auth::user()->id == $apartment['user_id'])
                            <tr>
                                <td>
                                    <a class="d-flex apartment-info" href="{{ route('apartments.show',$apartment) }}">
                                        <img class="mx-3" src="{{ asset('storage/' . $apartment->image) }}" alt="apartment image">
                                        <div>
                                            <strong>{{ $apartment->name}}</strong>
                                            <p>{{ $apartment->address}}</p>
                                        </div>
                                    </a>
                                </td>
                                    @if ( $apartment->visible == 1)
                                        <td class="text-center align-middle"><div class="green circle mx-auto"></div>
                                        </td>
                                    @else
                                        <td class="text-center align-middle"><div class="grey circle mx-auto"></td>
                                    @endif
                                <td class="text-center align-middle">{{ $apartment->n_room}}</td>
                                <td class="text-center align-middle">{{ $apartment->n_bed}}</td>
                                <td class="text-center align-middle">{{ $apartment->n_bath}}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn btn-lg btn-outline-warning" data-bs-toggle="modal" data-bs-target="#restoreModal{{$apartment->id}}">
                                            Ripristina
                                        </button>
                                        <button type="button" class="btn btn-lg btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$apartment->id}}">
                                            Elimina
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            {{-- Restore --}}
                            <div class="modal fade" id="restoreModal{{$apartment->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
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
                                            <form action="{{route('apartments.restore',$apartment->id)}}" method="POST">
                                                @method('patch')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-warning">Ripristina</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Perma Delete --}}
                            <div class="modal fade" id="deleteModal{{$apartment->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div>
                                            <h1 id="deleteModalLabel">Elimina appartamento definitivamente</h1>

                                        </div>
                                        <div class="modal-body">
                                            <p>Sei sicuro di voler eliminare <strong>"{{ $apartment->name }}"</strong>?</p>
                                            <div class="alert alert-danger">
                                                <h2><i class="fa-solid fa-triangle-exclamation"></i> Attenzione</h2>
                                                <p>L'eliminazione di questo appartamento sarà definitivo, l'azione non è reversibile.</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{route('apartments.forceDestroy', $apartment->id)}}" method="POST">
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
                </tbody>

            </table>
        @else
            <p>Nessun appartamento presente nel cestino</p>
        @endif
    </div>
</div>

@endsection
