@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="card-body col-md-12">
      <div class="separador col-md-12">
        <hr>
        <h3 class="destacados">TU CARRITO</h3>
        <hr>
      </div>
      <form class="col-md-12" action="/closecart" method="post">
        @csrf

        @forelse ($cart as $item)
          <div class="col-md-12 cartdiv" style="">
            <div class="cartimg col-md-4 col-sm-6">
              <img src="storage/products/{{$item->featured_img}}" alt="">
            </div>
            <div class="carttext col-md-4 col-sm-6">
              <h5 style="color:white;">{{$item->name}}<br>$ <span class='precioUnitario'>{{$item->price}} </span>
                <br>
              Cantidad:
               <input class="productcant" type="number" style="" name="{{$item->id}}" value="{{$item->cant}}" min="1" max="10">
             </h5>
            <a href="/deletecart/{{$item->id}}" style="color:white;"><i class="fas fa-trash-alt"></i></a>
            </div>
            <div class="carttotal col-md-4 col-sm-12">
              <h5 style="color:white;">Subtotal: $ <span class="subtotal">{{$item->price * $item->cant}}</span> </h5>
            </div>
          </div>
        @empty
          <h4>No hay productos en el carrito</h4>
        @endforelse

        @if ($cart->isNotEmpty())
          <div class="col-md-12">
            <h3 class="total" style="color:white; text-align:right;">TOTAL: $
              <span>{{$total}}</span>
            </h3>
          </div>
          <div class="buttondiv col-md-12">
            <button style="background:inherit; color:white; width:80%; height:50px; border:2px solid yellow; border-radius:20px; "type="submit" name="button">Comprar Productos</button>
          </div>
        @else

        @endif
      </form>
    </div>
  </div>
</div>
<script src="/js/cart.js"></script>
@endsection
@section('footer', '')
