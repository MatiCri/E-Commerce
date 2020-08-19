@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div style="justify-content:left;"class="card-body col-md-12">
        <div class="separador col-md-12">
          <hr>
          <h3 class="destacados">PRODUCTOS MAS VENDIDOS</h3>
          <hr>
        </div>
        @forelse ($products as $product)
          <div class="col-md-12">
            <h4 style="color:white;" class="titlebestproduct">Producto: {{$product->product_id}}</h4>
          </div>
          <div style="display:none;" class="divbestproduct col-sm-6 col-md-4 col-lg-3 ">
            <div class="productos thumbnail">
              <div class="caption">
                    <img class="imgreloj" src="storage/products/{{$product->featured_img}}" alt="...">
                    <p class="textoimg">ID producto: {{$product->product_id}}</p>
                    <p>Ventas: {{$product->cantidad}} <br> Ingreso por producto: ${{$product->ingreso}} </p>
              </div>
            </div>
          </div>
        @empty

        @endforelse
        <div class="separador col-md-12">
          <hr>
          <h3 class="destacados">TOTAL INGRESADO HASTA LA FECHA: {{$totIngresado}}</h3>
          <hr>
        </div>
      </div>
    </div>
  </div>
  <script src="js/bestproducts.js" type="text/javascript"></script>
@endsection

@section('footer', '')
