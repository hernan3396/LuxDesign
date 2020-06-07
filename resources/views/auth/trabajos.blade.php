@extends('master')

@section('title')
Trabajos
@endsection

@section('content')

<div class="container">

    @if (session('mensaje'))
    <div class="alert alert-success" role="alert">
        {{session('mensaje') }}
    </div>
    @endif

    <!-- Crea una seccion con su categoria de nombre y sus items dentro -->
    @foreach ($categorias as $categoria)
    <a href="{{ url('/trabajos/' . $categoria->workType )}}" style='color : black; display : inline-block;'>
        <h2>{{ $categoria->workType }}</h2>
    </a>

    <hr>


    <!-- esta parte se encarga de llenar de items a la seccion -->
    <div class="row">
        @foreach ($categoria->trabajos as $trabajo)

        <div class="col-sm-4">

            <div class="card" style="width: 18rem; margin-bottom:10px; position:relative;   ">
                <img class="card-img-top" src="{{ Storage::url($trabajo->imagen) }}" alt="{{ $trabajo->nombre }}"
                    style="height: 200px">

                <div class="row" style="margin-bottom:5px;">
                    <div class="col-sm-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $trabajo->nombre }}</h5>
                            <p class="card-text">{{ $trabajo->descripcion }}</p>
                        </div>
                    </div>

                    <div class="col-sm-4 editButton">
                        <a href="{{ url('/admin/trabajos/editar/' . $trabajo->id) }}" class="btn btn-primary">Editar</a>
                    </div>

                </div>

                @if ( $trabajo->carrusel)
                <span class="badge badge-info carruselBadge">Carrusel</span>
                @endif

            </div>

        </div>

        @endforeach
        <!-- foreach de trabajos -->
    </div>
    <!-- /.row -->

    @endforeach
</div>
<!-- foreach de categogrias -->

@endsection