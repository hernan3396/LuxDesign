@extends('master')

@section('title')
Categorias
@endsection

@section('content')

<div class="container">

    @if (session('mensaje'))
    <div class="alert alert-success" role="alert">
        {{session('mensaje') }}
    </div>
    @endif

    <div class="row">
        @foreach ($categorias as $categoria)
        <div class="col-sm-4">



            <div class="card" style="width: 18rem; margin-bottom:10px;">
                <img class="card-img-top" src="{{ Storage::disk('s3')->url('categorias/' . $categoria->imagen) }}"
                    alt="{{ $categoria->workType }}" style="height: 200px">

                <div class="row" style="margin-bottom:5px;">
                    <div class="col-sm-8">
                        <div class="card-body">
                            <a href="{{ url('/trabajos/' . $categoria->workType )}}"
                                style='color : black; display : inline-block;'>
                                <h5 class="card-title">{{ $categoria->workType }}</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4 editButton">
                        <a href="{{ url('/admin/categorias/editar/' . $categoria->id) }}"
                            class="btn btn-primary">Editar</a>
                    </div>
                </div>

            </div>

        </div>

        @endforeach
    </div>

</div>

@endsection