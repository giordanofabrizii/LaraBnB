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
                <div class="row g-0">
                    <div class="image col-md-4">
                        <img src="{{ asset('storage/' . $apartment->image) }}" class="img-fluid rounded-start" alt="{{ $apartment->name}} image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-5">
                            <a class="title" href="{{ route('apartments.show',$apartment) }}">
                                <h2 class="card-title mb-4">{{ $apartment->name}}</h2>
                            </a>
                            <p class="card-text">Sponsorizzazione:</p>

                            <div class="d-flex justify-content-between">
                                <div class="visibility d-flex align-items-baseline mb-2">
                                    @if ( $apartment->visible == 1)
                                        <p class="card-text me-3"><small class="text-body-secondary"> Visibilità:</small></p>
                                        <div class="green circle"></div>
                                    @else
                                        <p class="card-text me-3"><small class="text-body-secondary"> Visibilità:</small></p>
                                        <div class="red circle"></div>
                                    @endif
                                </div>

                                <div class="buttons d-flex align-items-center">
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
            </div>
            @endif
        @endforeach
    </div>








            <tbody>
                @foreach ($apartments as $apartment)
                    @if (Auth::user()->id == $apartment['user_id'])
                        <tr>
                            <td>
                                <a class="d-flex apartment-info align-items-center p-2" href="{{ route('apartments.show',$apartment) }}">
                                    <img class="mx-3" src="{{ asset('storage/' . $apartment->image) }}" alt="apartment image">
                                    <div>
                                        <strong>{{ $apartment->name}}</strong>
                                        <p class="m-0">{{ $apartment->address}}</p>
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
                                    <a href=""><i class="fa-regular fa-message mx-2"></i></a>
                                    <a href=""><i class="fa-solid fa-chart-column mx-2"></i></a>
                                    <div id="profile" class="dropdown ">
                                        <a id="navbarDropdown" class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-gear mx-2"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{ route('apartments.edit', $apartment) }}">
                                                Modifica
                                            </a>
                                            <form action="{{route('apartments.destroy', $apartment)}}" class="form-delete" method="POST" data-apartment-name="{{$apartment->name}}">
                                                @method("delete")
                                                @csrf
                                                <button class="dropdown-item text-danger" href="">
                                                    Elimina
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>

        </table>

        <div class="row my-4">
            <div class="col-12 d-flex flex-row-reverse">
                <a class="btn btn-success ms-2" href="{{route('apartments.create')}}">Aggiungi un nuovo appartamento</a>
                <a class="btn btn-warning" href="{{route('apartments.trashed')}}">Cestino</a>
            </div>
        </div>


</div>

@endsection

@section('scripts')
    @vite('resources/js/delete-confirmation.js')
@endsection
