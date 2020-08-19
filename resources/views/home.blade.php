@extends('layouts.app')

@section('content')
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="IMG0/slides/banner_02.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="IMG0/slides/banner_03.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="IMG0/slides/banner_01.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container">
  <div class="row promos">
    <div class="col-lg-4 d-none d-lg-block">
      <h5><i class="fas fa-credit-card"></i> Mercado de pago</h5>
      <p>Tarjetas de credito, debito y Rapi Pago/Pago Facil</p>
    </div>
    <div class="col-lg-4 d-none d-lg-block">
      <h5><i class="fas fa-truck"></i> Mercado de envios</h5>
      <p>A todo el pais</p>
    </div>
    <div class="col-lg-4 d-none d-lg-block">
      <h5><i class="fas fa-tag"></i> Combos 15% off</h5>
      <p>Consultanos por los combos !</p>
    </div>
  </div>
  <div class="row">
    <div class="separador col-md-12">
      <hr>
      <h3 class="destacados">CATEGORIAS </h3>
      <hr>
    </div>
  </div>
<div class="row categorias">
  @foreach ($categories as $categorie)
    <div class="col-xl-4 col-lg-6 col-md-12 boxcat">
    <div class="ban banner">
    <div class="ban_img"><img style="width:100%; height:100%;" src="storage/products/{{$categorie->featured_img}}" alt="..." ></div>
    <div class="ban_wrap">
    <h3 style="color:black;">{{$categorie->name}}</h3>
    <div class="shop_now"><a style="color:white; border-radius:20px;" href="/categories/{{$categorie->id}}"><span style="color:black;">Ver mas !</span></a></div>
    </div>
    </a>
    </div>
    </div>
  @endforeach
</div>

<div class="row">
  <div class="separador col-md-12">
    <hr>
    <h3 class="destacados">DESTACADOS </h3>
    <hr>
  </div>
</div>

<div class="row">
  @foreach ($products as $product)
  <div class="col-xl-3 col-lg-4 col-md-6 ">
    <div class="productos thumbnail">
      <div class="caption">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product-{{$product->id}}">
            <img class="imgreloj" src="/storage/products/{{$product->featured_img}}" alt="...">
              <p class="textoimg">{{$product->name}}</p>
        </button>
      </div>
    </div>
  </div>

  <div class="modal fade" id="product-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Categoria: @if ($product->category)
              {{$product->category->name}} @endif </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body col-md-12">
        <img src="/storage/products/{{$product->featured_img}}" style="">
          <p class="price">${{$product->price}}</p>
          <h3>{{$product->name}}</h3>
          <br>
          <p style="color:white;">{{$product->description}}</p>
        </div>
        <div class="modal-footer">
          <a href="/addtocart/{{$product->id}}">Agregar al Carrito</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>

@endsection
