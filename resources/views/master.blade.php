<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lux Design - @yield('title')</title>
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />


  <!-- CSS de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- CSS de FontAwesome -->
  <script src="https://kit.fontawesome.com/a51f911cc7.js" crossorigin="anonymous"></script>

  <!-- CSS de Lightbox -->
  <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">

  <!-- CSS propio -->
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>

<body>

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" id="luxDesignNavBar">
    <a class="navbar-brand" href="/">Lux Design</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav">
        <li>
          <a class="nav-item nav-link" href="{{url('/trabajos')}}">Trabajos</a>
        </li>
        <li>
          <a class="nav-item nav-link" href="{{url('/sobre-nosotros')}}">Sobre nosotros</a>
        </li>
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Admin
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ url('/admin/trabajos/crear') }}">Crear trabajos</a>
            <a class="dropdown-item" href="{{ url('/admin/trabajos') }}">Ver trabajos</a>
            <a class="dropdown-item" href="{{ url('/admin/categorias/crear') }}">Crear categoria</a>
            <a class="dropdown-item" href="{{ url('/admin/categorias') }}">Ver categorias</a>
            <a class="dropdown-item" href="{{ url('/admin/carrusel') }}">Editar carrusel</a>
          </div>
        </li>
        @endauth
    </div>
  </nav>
  <!--/Navbar-->

  @yield('content')



  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- JS de Popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>

  <!-- JS de Bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

  <!-- JS de Vue.js -->
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>

  <!-- JS Lightbox -->
  <script src="{{ asset('js/lightbox.js') }}"></script>

  <!-- JS Propio -->
  <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>