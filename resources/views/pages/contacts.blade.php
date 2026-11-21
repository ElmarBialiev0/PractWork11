
@extends('layouts.main')

@section('title', 'Контакты')

@section('content')
    <h1 class="text-center mb-4">Наши контакты</h1>

    <div class="row justify-content-center">
        @foreach($contacts as $contact)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $contact['title'] }}
                        </h5>

                        <p class="card-text">
                            {{ $contact['value'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
