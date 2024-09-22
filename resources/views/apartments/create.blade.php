@extends('layouts.app')

@section('custom-scss')
    @vite(['resources/js/apartment-validation.js', 'resources/sass/apartments/form.scss', 'resources/js/tomtom.js'])
@endsection

@section('content')
    <div class="container" id="create">
        <div class="row">
            <div class="col-12 p-3">
                <h1>Aggiungi un nuovo appartamento</h1>
            </div>
            <div class="col-12">
                <form class="d-flex flex-column" id="formEl" action="{{ route('apartments.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group p-2">
                        <label class="mb-2" for="name">Il nome del tuo appartamento*</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Scrivi il nome del tuo appartamento" value="{{ old('name') }}">
                        <div class="error"></div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label class="mb-2" for="description">Descrizione*</label>
                        <input type="text" class="form-control" name="description" id="description"
                            placeholder="Aggiungi una descrizione" value="{{ old('description') }}">
                        <div class="error"></div>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <div class="form-group p-2">
                            <label for="address">Indirizzo*</label>

                            <input type="hidden" class="form-control" name="address" id="address"
                                placeholder="Aggiungi l'indirizzo">
                            <div id="map" style="width:70%; height: 290px;" class="m-auto"></div>
                            <div class="error"></div>
                            <input type="hidden" id="latitude" name="latitude">
                            <input type="hidden" id="longitude" name="longitude">

                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group p-2">
                        <label class="mb-2" for="surface">Superficie* (m<sup>2</sup>
                            )</label>
                        <input type="number" class="form-control" style="width: 7%" name="surface" id="surface"
                            value="{{ old('surface') }}">
                        <div class="error"></div>
                        @error('surface')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label for="image">Aggiungi una foto del tuo appartamento</label>
                        <input type="file" class="form-control" name="image" id="image"
                            placeholder="Carica un'immagine">
                        <div class="error"></div>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-2">
                        <label class="m-2" for="n_room">Stanze*</label>
                        <input type="number" class="me-5" name="n_room" style="width: 5%" id="n_room"
                            value="{{ old('n_room') }}">
                        <div class="error"></div>
                        @error('n_room')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label class="m-2" for="n_bed">Letti*</label>
                        <input type="number" class="me-5" style="width: 5%" name="n_bed" id="n_bed"
                            value="{{ old('n_bed') }}">
                        <div class="error"></div>
                        @error('n_bed')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label class="m-2" for="n_bath">Bagni*</label>
                        <input type="number" style="width: 5%" name="n_bath" id="n_bath" value="{{ old('n_bath') }}">
                        <div class="error"></div>
                        @error('n_bath')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="service_id">Servizi</label>
                        <div class="customChechBoxHolder">
                            @foreach ($services as $service)
                                <input type="checkbox" class="btn-check" value="{{ $service->id }}" name="services[]"
                                    id="service-check-{{ $service->id }}" autocomplete="off">
                                <label class="btn my-outline m-1"
                                    for="service-check-{{ $service->id }}">{{ $service->name }}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group p-2">
                        <label class="m-2" for="price">Prezzo per notte*</label>
                        <input type="price" style="width: 6%" name="price" id="price"
                            value="{{ old('price') }}">
                        &#8364;
                        <div class="error"></div>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <p class="text-end"><small>I campi contrassegnati con l'asterisco (*) sono obbligatori.</small></p>
                    <button type="submitEl" class="custom-btn custom-btn-green mt-3 align-self-end">Pubblica l'appartamento</button>
                </form>
            </div>
        </div>
    </div>
@endsection
