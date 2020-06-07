@extends('master')

@section('title')
    Crear categoria
@endsection

@section('content')

<div class="container">

    @if (session('mensaje'))
    <div class="alert alert-success" role="alert">
        {{session('mensaje') }}
    </div>
    @endif

    <form action="{{ url('/admin/categorias/crear') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="workType">Nombre</label>
            <input name="workType" type="text" class="form-control" id="workType" placeholder="Nombre">
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input name="imagen" type="file" class="form-control-file" id="imagen">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

</div>

@endsection