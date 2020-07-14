@extends('master')

@section('title')
Editar trabajo
@endsection

@section('content')

<div class="container">

    <form action="{{ url('/admin/trabajos/editar/' . $trabajo->id) }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="deletePrompt">
            <p><strong>Estas seguro de eliminar el trabajo {{ $trabajo->nombre }}?</strong></p>

            <div class="deletePromptButtons">

                <button type="button" class="btn btn-info cancelButton">Cancelar</button>
                <a href="{{ url("/admin/trabajos/$trabajo->id/eliminar") }}" class="btn btn-danger">
                    Eliminar
                </a>

            </div>

        </div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="nombre" value="{{ $trabajo->nombre }}">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input name="descripcion" type="text" class="form-control" id="descripcion"
                value="{{ $trabajo->descripcion }}">
        </div>

        <div class="form-row">

            <div class="form-group col-sm-6">
                <label for="work_type_id">Categoria</label>
                <select name="work_type_id" class="form-control" id="work_type_id">

                    <option value="{{ $trabajo->workType->id }}">{{ $trabajo->workType->workType }}</option>

                    @foreach ($workTypes as $workType)
                    @if ($workType->workType != $trabajo->workType->workType)
                    <option value="{{ $workType->id }}">{{ $workType->workType }}</option>
                    @endif
                    @endforeach

                </select>
            </div>

            <div class="form-group col-sm-4">
                <label for="carrusel">Añadir al carrusel?</label>
                <select name="carrusel" class="form-control" id="carrusel">

                    @if ($trabajo->carrusel)

                    <option selected value="1">Sí</option>
                    <option value="0">No</option>

                    @else

                    <option selected value="0">No</option>
                    <option value="1">Sí</option>

                    @endif
                </select>
            </div>

        </div>

        <div>
            <img src="{{ Storage::disk('s3')->url('trabajos/' . $trabajo->imagen) }}" alt="{{ $trabajo->nombre }}"
                style="height: 200px">
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