@extends('master')

@section('title')
Trabajos
@endsection

@section('content')

<div class="container">

    <div class="row justify-content-between">
        @foreach ($workTypes as $workType)

        <div class="col-sm-4" style="margin-bottom:5px">

            <div class="card" style="width: 18rem;">
                <a href="/trabajos/{{ $workType->workType }}"><img class="card-img-top"
                        src="{{ Storage::disk('s3')->url('categorias/' . $workType->imagen) }}" alt="Card image cap"
                        style="height: 180px"></a>
                <div class="card-body">
                    <p class="card-text">{{ $workType->workType }}</p>
                </div>
            </div>

        </div>

        @endforeach
    </div>
</div>

@endsection