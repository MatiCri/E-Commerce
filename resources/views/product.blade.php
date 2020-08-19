@section('header', '')
@extends('layouts.app')
@section('content')
  <div class="productcard">
      <img src="/storage/products/{{$product->featured_img}}" style="width:100%">
      <h1>{{$product->name}}</h1>
      <p>$ {{$product->price}}</p>
      <h3>Categoria: {{$product->categories->first()->name}} <br> <br>{{$product->description}}</h3>
      <br>
      <button type="button" class="btn" id="diseños"> <a href="/addtocart/{{$product->id}}">Agregar al Carrito</a></button>
  </div>
@endsection
