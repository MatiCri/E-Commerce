@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="separador col-md-12">
      <hr>
      <h3 class="destacados">{{$categories->name}}</h3>
      <hr>
    </div>
  </div>
<div class="row">
  @foreach ($categories->products as $product)
    <div class="col-sm-6 col-md-4 col-lg-3">
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
            <h5 class="modal-title" id="exampleModalCenterTitle">Categoria: {{$product->category->name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body col-md-12">
          <img src="/storage/products/{{$product->featured_img}}" style="">
            <p class="price">${{$product->price}}</p>
            <h3>{{$product->name}}</h3>
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
