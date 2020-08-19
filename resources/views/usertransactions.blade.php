@extends('layouts.app')
@section('content')
  <div class="">
      <div class="usertransactions card-body">
        <div class="separador col-md-12">
          <hr>
          <h3 class="destacados">MIS COMPRAS</h3>
          <hr>
        </div>
        <li type="none">
          @forelse ($carts as $cart)
          <h5 class="compra" style="color:white;">Compra {{$cart[0]->cart_number}}</h5>
            <div class="productos">
                    @forelse ($cart as $item)
                      <div style="display:none;"class="div col-sm-6 col-md-6 col-lg-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product-{{$item->id}}">
                            <img class="imgreloj" src="storage/products/{{$item->featured_img}}" alt="...">
                              <p>{{$item->name}}</p>
                              <p>Cantidad: {{$item->cant}}</p>
                              <p>Total gastado:{{$item->cant * $item->price}}</p>
                        </button>
                      </div>
                    @empty

                    @endforelse
            </div>
          @empty
          @endforelse
        </li>
    </div>
</div>
<script src="/js/transactions.js"></script>
@endsection
