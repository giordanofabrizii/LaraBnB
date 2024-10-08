@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/js/apartment-validation.js', 'resources/sass/apartments/form.scss', 'resources/js/tomtom.js'])
@endsection

@section('content')
<div class="container" id="edit-form">
    <div class="row">
        @if (Auth::user()->id == $apartment['user_id'])
            <div class="col-12">
                <h1>Modifica l'appartamento</h1>
            </div>
            <div class="col-12">
                <form class="d-flex flex-column" id="formEl" action="{{ route('apartments.update', $apartment) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="form-group p-2">
                        <label for="name">Nome dell'appartamento*</label>
                        <input type="text" class="form-control to-control" name="name" id="name" placeholder="Inserisci un nuovo nome per il tuo appartamento" value="{{ old('name', $apartment->name) }}">
                        <div class="error"></div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label for="description">Descrizione*</label>
                        <input type="text" class="form-control to-control" name="description" id="description" placeholder="Aggiungi una descrizione" value="{{ old('description', $apartment->description) }}">
                        <div class="error"></div>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <div class="form-group mb-1 mt-1">
                            <div class="accordion" id="accordionMap">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            L'indirizzo corrente è: {{ old('address', $apartment->address) }}
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p><strong>Modifica l'indirizzo:</strong></p>
                                            <input type="hidden" class="form-control" name="address" id="address"
                                                placeholder="Aggiungi un indirizzo" value="{{ old('address', $apartment->address) }}">
                                            <div id="map" style="width:70%; height: 290px;" class="m-auto"></div>
                                            <div class="error"></div>
                                            <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude', $apartment->latitude) }}">
                                            <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude', $apartment->longitude) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="error"></div>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group p-2 d-flex flex-wrap">
                        <label for="surface" class="me-5">Superficie*: (m<sup>2</sup>)</label>
                        <input type="number" class="form-control to-control me-3" style="width: 80px" name="surface" id="surface" value="{{ old('surface', $apartment->surface) }}">
                        <div class="error"></div>
                        @error('surface')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2 mb-3">
                        <label for="image">Vuoi modificare la foto?</label><br>
                        <img src="{{ asset('storage/' . $apartment->image) }}" class="me-4 my-3 apartment" alt="apartment old image">
                        <input type="file" class="form-control to-control" name="image" id="image" placeholder="Upload an image">
                        <div class="error"></div>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label class="m-2" for="n_room">Stanze*</label>
                        <input type="number" class="to-control me-5 rounded-2" style="width: 60px" name="n_room" id="n_room" value="{{ old('n_room', $apartment->n_room) }}">
                        <div class="error"></div>
                        @error('n_room')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label class="m-2" for="n_bed">Letti*</label>
                        <input type="number" class="to-control me-5 rounded-2" style="width: 60px"  name="n_bed" id="n_bed" value="{{ old('n_bed', $apartment->n_bed) }}">
                        <div class="error"></div>
                        @error('n_bed')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label class="m-2" for="n_bath">Bagni*</label>
                        <input type="number" class="to-control rounded-2" style="width: 60px"  name="n_bath" id="n_bath" value="{{ old('n_bath', $apartment->n_bath) }}">
                        <div class="error"></div>
                        @error('n_bath')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label for="service_id">Servizi</label>
                        <div class="customChechBoxHolder to-control">
                            @foreach ($services as $service)
                                <input type="checkbox" class="btn-check " value="{{ $service->id }}" name="services[]" id="service-check-{{ $service->id }}" autocomplete="off"
                                {{ in_array($service->id, old('services', $apartment->services->pluck('id')->toArray())) ? "checked" : ""}}>
                                <label class="btn my-outline m-1" for="service-check-{{$service->id}}">{{ $service->name }}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group p-2">
                        <label class="m-2" for="price">Prezzo per notte*</label>
                        <input type="price" class="to-control" style="width: 5%" name="price" id="price" value="{{ old('price', $apartment->price) }}">
                        &#8364;
                        <div class="error"></div>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <p class="text-end"><small>I campi contrassegnati con l'asterisco (*) sono obbligatori.</small></p>
                    <button id="submitEl" type="submit" class="btn btn-lg btn-primary mt-3 align-self-end">Modifica l'appartamento</button>
                </form>
            </div>
        @else
            {{@abort(404)}} {{-- if it's not your apartment --}}
        @endif

        </div>
    </div>
@endsection
