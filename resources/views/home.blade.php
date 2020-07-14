@extends('master')

@section('title')
Home
@endsection

@section('content')

<!--Carousel-->

<!--Revisa si existe algun elemento para el carrusel, en caso de que no exista, no lo muestra porque sino no funciona -->
@if ($primerTrabajo)

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner homeCarousel">
    <div class="carousel-item active">
      <img class="d-block homeCarouselImage" src="{{ Storage::disk('s3')->url('trabajos/' . $primerTrabajo->imagen) }}"
        alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <a href="{{ url("/trabajos/". $primerTrabajo->workType->workType )}}"
          style='color : white; display : inline-block;'>
          <h5>{{ $primerTrabajo->nombre }}</h5>
        </a>
        <p>{{ $primerTrabajo->descripcion }}</p>
      </div>
    </div>

    @foreach ($trabajos as $trabajo)
    @if ($trabajo->id != $primerTrabajo->id)
    <div class="carousel-item">
      <img class="d-block homeCarouselImage" src="{{ Storage::disk('s3')->url('trabajos/' . $trabajo->imagen) }}"
        alt="Slide">
      <div class="carousel-caption d-none d-md-block">
        <a href="{{ url("/trabajos/". $trabajo->workType->workType )}}" style='color : white; display : inline-block;'>
          <h5>{{ $trabajo->nombre }}</h5>
        </a>
        <p>{{ $trabajo->descripcion }}</p>
      </div>
    </div>
    @endif
    @endforeach

  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
<!--/Carousel-->

@endif



<hr>

<div class="row" style="justify-content: space-around; margin-left:0px; margin-right:0px">
  <div class="col-md-6">
    <div class="card mb-3">
      <div class="card-header">
        <h4><i class="fas fa-eye"></i> Trabajos</h4>
      </div>
      <div class="card-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in
          alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum
          quod?</p>
        <a href="{{ url('/trabajos') }}" class="btn btn-outline-secondary">Ver trabajos</a>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-3">
      <div class="card-header">
        <h4><i class="fas fa-address-card"></i> Sobre nosotros</h4>
      </div>
      <div class="card-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in
          alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum
          quod?</p>
        <a href="{{url('/sobre-nosotros')}}" class="btn btn-outline-secondary">Ver mas</a>
      </div>
    </div>
  </div>
</div><!-- /.row -->

@endsection