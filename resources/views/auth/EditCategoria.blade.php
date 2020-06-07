@extends('master')

@section('title')
    Editar categoria
@endsection

@section('content')

<div class="container">

    <form action="{{ url('/admin/categorias/editar/' . $categoria->id) }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="deletePrompt">
            <p><strong>Estas seguro de eliminar el trabajo {{ $categoria->workType }}?</strong></p>

            <div class="deletePromptButtons">

                <button type="button" class="btn btn-info cancelButton">Cancelar</button>
                <a href="{{ url("/admin/categorias/$categoria->id/eliminar") }}" class="btn btn-danger">
                    Eliminar
                </a>

            </div>
        </div>

        <div class="form-group">
            <label for="workType">Nombre</label>
            <input name="workType" type="text" class="form-control" id="workType" value="{{ $categoria->workType }}">
        </div>

        <div>
            <img src="{{ Storage::url($categoria->imagen) }}" alt="" style="height: 200px">
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input name="imagen" type="file" class="form-control-file" id="imagen">
        </div>

        <button type="submit" class="btn btn-primary" value="">Enviar</button>

    </form>

    <div class="deleteButton">
        <button type="button" class="btn btn-danger">Eliminar</button>
    </div>

</div>

@endsection