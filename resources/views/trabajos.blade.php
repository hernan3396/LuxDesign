@extends('master')

@section('title')
Trabajos
@endsection

@section('content')

<div class="container">

    <div class="row justify-content-between">
        
        @foreach ($categoria->trabajos as $trabajo)
        <div class="col-sm-4" style="margin-bottom:5px">
            <a href="{{ asset('storage/' . $trabajo->imagen) }}" data-lightbox="roadtrip">

                <img class="card-img-top hover-shadow" src="{{ asset('storage/' . $trabajo->imagen) }}"
                    alt="{{ $trabajo->nombre }}" style="height: 200px" data-lightbox="roadtrip"></a>

            <p class="card-text" style="text-align: center">{{ $trabajo->nombre }}</p>
        </div>
        @endforeach

    </div>
    
    @endsection