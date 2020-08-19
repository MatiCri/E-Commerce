@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="card-body col-md-12">
        <div class="separador col-md-12">
          <hr>
          <h3 class="destacados">{{$user->name}}</h3>
          <hr>
        </div>
        <ul class="users col-md-10">
          @forelse ($products as $product)
          <h6 style="font-size:15px; color:white;">ID producto: {{$product->product_id}} </h6>
          <div style="display:none; color:white;" class="col-md-12">
            Nombre: {{$product->name}} <br>
            Cantidad comprada: {{$product->cantidad}} <br>
            Ingreso: {{$product->precio}}
          </div>
          @empty

          @endforelse
        </ul>
      </div>
    </div>
  </div>
  <script src="/js/userdetail.js" type="text/javascript">

  </script>
@endsection
