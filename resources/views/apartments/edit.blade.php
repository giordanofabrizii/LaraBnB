@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit apartment</h1>
        </div>
        @if (Auth::user()->id == $apartment['user_id'])
        <div class="col-10">
            <form action="{{ route('apartments.update', $apartment) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-group p-2">
                    <label for="name">Apartment name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Type a name for the apartment" value="{{ old('name', $apartment->name) }}">
                    @error('name')
                        <div class="alert alert-danger">Type a valid name</div>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Add a description" value="{{ old('description', $apartment->description) }}">
                    @error('description')
                        <div class="alert alert-danger">Type a description</div>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="surface">Surface (in m2):</label>
                    <input type="text" class="form-control" name="surface" id="description" placeholder="How many m2" value="{{ old('surface', $apartment->surface) }}">
                    @error('surface')
                        <div class="alert alert-danger">Insert a valid number value</div>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label for="image">Image Url</label>
                    <input type="text" class="form-control" name="image" id="image" placeholder="Enter a valid url" value="{{ old('image', $apartment->image) }}">
                    @error('image')
                        <div class="alert alert-danger">Insert a valid url</div>
                    @enderror
                </div>
                <div class="form-group p-2">
                    <label class="me-2" for="n_room">How many rooms?</label>
                    <input type="number" name="n_room" id="n_room" value="{{ old('n_room', $apartment->n_room) }}">

                    <label class="mx-2" for="n_bed">How many beds?</label>
                    <input type="number" name="n_bed" id="n_bed" value="{{ old('n_bed', $apartment->n_bed) }}">

                    <label class="mx-2" for="n_bath">How many beds?</label>
                    <input type="number" name="n_bath" id="n_bath" value="{{ old('n_bath', $apartment->n_bath) }}">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Edit apartment</button>
            </form>
        </div>
        @else
        <h1>You can edit only your apartments</h1>
        @endif
    </div>
</div>
@endsection
