@extends('master')

@section('title')
Editar carrusel
@endsection

@section('content')

<div class="container">

    @if (session('mensaje'))
    <div class="alert alert-success" role="alert">
        {{session('mensaje') }}
    </div>
    @endif


    <form action="{{ url('/admin/carrusel') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row justify-content-between">
            @foreach ($trabajos as $trabajo)

            <div class="col-sm-4" style="margin-bottom: 5px">

                <img src="{{ Storage::url($trabajo->imagen) }}" alt="{{ $trabajo->nombre }}" style="height: 200px"
                    class="card-img-top hover-shadow">
                <p style="text-align: center">Posición:
                    <div class="form-group">
                        <input type="number" class="form-control" id="carrusel" placeholder="{{ $trabajo->carrusel }}"
                            name="carrusel[{{$trabajo->id}}]">
                    </div>
                </p>

            </div>

            @endforeach
        </div>

        <button type="submit" class="btn btn-primary" value="">Enviar</button>

    </form>
</div>


@endsection