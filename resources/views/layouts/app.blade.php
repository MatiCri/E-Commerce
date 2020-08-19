<?php
use App\Cart;
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <link rel = "icon" href =
"IMG0/logoicon.png"
        type = "image/x-icon">
    <meta charset="utf-8">
    <!-- BootStrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

@section('header')
  <nav class="top navbar">
    <div class="navtop col-md-12">
      @guest
      <a class="tupi nav-link" href="/login">Iniciar Sesion</a>
      @if (Route::has('register'))
      <a class="tupi nav-link" href="/register">Registrarme</a>
      @endif
      @else
        <div class="btn-group" role="group">
          <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <a class="listita" href=""><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
          </button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            @if (Auth::user()->role === 100)
              <a class="listita dropdown-item" href="/bestproducts">Mas vendidos</a>
              <a class="listita dropdown-item" href="/users">Usuarios</a>
              <a class="listita dropdown-item" href="/addproduct">Agregar producto</a>
              <a class="listita dropdown-item" href="/allproducts">Ver todos los productos</a>
            @endif
            <a class="listita d-lg-none dropdown-item" href="/cart">Carrito<i class="fas fa-shopping-cart"></i></a>
            <a class="listita dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir</a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
               </form>
          </div>
        </div>
      @endguest
    </div>
  </nav>
  <nav class="navbar">
      <div class="left d-none d-sm-block col-sm-3 col-md-6 col-lg-3 ">
            <a class="navbar-brand" href="/"><img  class="logocompany" src="/IMG0/logocompany01.png" class="logoexample" style="width:100px; height:45px; "alt=""></a>
      </div>
      <div class="center col-sm-9 col-md-6 col-lg-5 ">
        <a href="/">Inicio</a>
        <a href="/usertransactions">Mis Compras</a>
        <a href="/contactus">Contacto</a>
      </div>
      <div class="right col-md-12 col-lg-4">
        <form class="form-inline d-none d-lg-block" action="/products/search" method="get" >
          <input class="form-control mr-sm-2" type="text" name="search" placeholder="Buscar...">
          {{-- <button type="button" name="button"></button> --}}
        </form>
      <a class="nav-link d-none d-lg-block" href="/cart"><i class="fas fa-shopping-cart"></i>

          @if (Auth::user())
            <span style='color: white; background-color:red; border-radius:50%; padding:3px'>
              {{$cart=Cart::where('user_id','=', Auth::user()->id )->where('status','=', 0)->get()->count()}}
            </span>
          @else
            <span></span>
          @endif
     </a>
      </div>
    </nav>
@show

        <main class="py-4">
            @yield('content')
        </main>


        @section('footer')
          <footer>
            <div class="container footer">
              <div class="row">
                <div class="col-md-4">
                  <h5 class="service-title">Mercado Pago</h5>
                  <p class="service-text">Tarjetas de credito, debito y Rapi Pago/Pago Facil.</p>
                  <div class="text-center-xs">
                  <img src="//d26lpennugtm8s.cloudfront.net/assets/common/img/logos/payment/visa@2x.png" class="fototarjeta">
                  <img src="//d26lpennugtm8s.cloudfront.net/assets/common/img/logos/payment/mastercard@2x.png" class="fototarjeta">
                  <img src="//d26lpennugtm8s.cloudfront.net/assets/common/img/logos/payment/amex@2x.png" class="fototarjeta">
                  </div>
                </div>
                <div class="col-md-4">
                  <h5 class="service-title">Mercado de Envios</h5>
                  <p class="service-text">A todo el país</p>
                  <hr>
                  <h5 class="service-title">Combos 18% Off</h5>
                  <p class="service-text">Reloj + Billetera</p>
                </div>
                <div class="col-md-4">
                  <h5>BUSCANOS EN LAS REDES:</h5>
                <div class="js-service-item service-item ">
                  <h5 class="service-title">Facebook</h5>
                  <a href="http://facebook.com" target="_blank" style="color:white;">
                  <p class="service-text">
                    <i class="fab fa-facebook-square"> Kronos</i>
                  </p>
                </a>
                </div>
                <div class="js-service-item service-item ">
                  <h5 class="service-title">Instagram</h5>
                  <a href="http://instagram.com" target="_blank" style="color:white;">
                  <p class="service-text">
                    <i class="fab fa-instagram"> Kronos</i>
                  </p></a>
                </div>
                <div class="js-service-item service-item " >
                <h5 class="service-title">Twitter</h5>
                <a href="http://twitter.com" target="_blank" style="color:white;">
                <p class="service-text">
                <i class="fab fa-twitter-square"> Kronos</i>
                </p></a>
                </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h5>Contactanos:</h5>
                  </div>
                  <div class="col-md-4" id="contenidofooter">
                      <div class="js-service-item service-item ">
                      <h5 class="service-title">Telefono</h5>
                      <p class="service-text">
                        <i class="fa fa-phone fa-lg m-right-quarter"></i>
                         4444-4444
                      </p>
                  </div>
                  </div>
                  <div class="col-md-4" id="contenidofooter">
                      <div class="js-service-item service-item ">
                      <h5 class="service-title">Envianos un Mail:</h5>
                      <p class="service-text">
                      <i class="fa fa-envelope fa-lg m-right-quarter"></i>
                      kronos@gmail.com
                      </p>
                  </div>
                  </div>
                  <div class="col-md-4" id="contenidofooter">
                      <div class="js-service-item service-item ">
                      <h5 class="service-title">Veni a visitarnos</h5>
                      <p class="service-text">
                        <i class="fa fa-map-marker fa-lg m-right-quarter"></i> Ubicacion: Buenos Aires, Argentina
                      </p>
                  </div>
                  </div>

                  </div>
                </div>
          </footer>
        @show

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="/js/java.js"></script>
</body>
</html>
