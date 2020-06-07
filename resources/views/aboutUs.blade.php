@extends('master')

@section('title')
Sobre nosotros
@endsection

@section('content')
<div class="container">

    <div class="container">

        <h1 class="mt-4 mb-3">Sobre Nosotros</h1>

        <hr class="mb-4">

        <!-- Intro Content -->
        <div class="row">
            <div class="col-lg-2">
                <img class="img-fluid rounded mb-4" id="aboutUsLuxDesignImage" src="{{ asset('Images\LuxDesignLogoLarge.jpg') }}" alt="">
            </div>
            <div class="col-lg-10">
                <h2>Nuestra misión</h2>
                <p>Destacar el producto de nuestros clientes en cada punto de venta, es lo que nos impulsa para trabajar
                    por el liderazgo en el área de equipamentos e instalaciones comerciales.</p>
                <p>Aplicando nuestro know how concretamos aplicaciones de marca y producto que generan experiencias de
                    relacionamiento positivas entre nuestros clientes y sus clientes.</p>
                <p>Esa es nuestra especialidad.</p>
                <hr>
                <h2>Nuestra visión</h2>
                <p>Nos enfocamos a ser proveedores eficientes de aquellas empresas que buscan y valoran la creatividad
                    al momento de comunicar y comercializar sus productos.</p>
                <p>En base a nuestro trabajo, aumentamos el valor percibido de las marcas de nuestros clientes.</p>
                <p>Ofrecemos diseños exclusivos y a medida para cada cliente y cada punto de venta.</p>
                <p>Trabajamos con excelente nivel de acabado final, utilizamos materia prima de primera calidad.</p>

                <hr>
                <p><i class="fas fa-phone"></i> (+598) 94 123 123</p>
                <p><i class="fas fa-envelope"></i> test@test.com</p>
            </div>
        </div>

        <!-- /.row -->

    </div><!-- /.container -->

    @endsection