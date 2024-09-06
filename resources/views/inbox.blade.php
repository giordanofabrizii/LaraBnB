@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Your messages</h1>
        </div>
        <div class="col-12">
            <div class="accordion" id="inbox">
                @foreach ($messages as $message)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$message->id}}" aria-expanded="true" aria-controls="{{$message->id}}">
                            @if ($message->seen_date == null)
                                <strong>{{ $message->sender_name}}</strong>
                            @else
                                {{ $message->sender_name}}
                            @endif
                        </button>
                    </h2>
                    <div id="{{$message->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">From: {{ $message->sender_name}}</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $message->sender_email}}</h6>
                                    <p class="card-text">{{ $message->text}}</p>
                                    <p class="card-text"><em>Sended at: {{ $message->date}}</em></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
