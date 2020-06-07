@extends('master')

@section('title')
    Crear trabajo
@endsection

@section('content')

<div class="container">

    @if (session('mensaje'))
    <div class="alert alert-success" role="alert">
        {{session('mensaje') }}
    </div>
    @endif

    <form action="{{ url('/admin/trabajos/crear') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input name="descripcion" type="text" class="form-control" id="descripcion"
                placeholder="Descripcion">
        </div>

        <div class="form-group">
            <label for="work_type_id">Categoria</label>
            <select name="work_type_id" class="form-control" id="work_type_id">

                @foreach ($categorias as $workType)
                <option value="{{ $workType->id }}">{{ $workType->workType }}</option>
                @endforeach
                
            </select>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input name="imagen" type="file" class="form-control-file" id="imagen">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

</div>

@endsection