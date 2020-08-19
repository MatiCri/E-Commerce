<?php
use App\Cart;
?>

@extends('layouts.app')
@section('content')
<div class="contactanos">
  <div class="row">
    <div class="col-md-12">
      <div class="separador col-md-12">
        <hr>
        <h3 class="destacados">CONTACTENOS</h3>
        <hr>
      </div>
    </div>
    <div  class="contactus d-none d-lg-block col-lg-4 col-xl-6">
      <h4> <strong>Te estamos esperando !</strong> </h4>
      <p>Cualquier duda o consulta no dude en comunicarse con nostros !</p>
      <p><i class="fas fa-phone"></i> 11 62625000</p>
      <p><i class="far fa-envelope"></i> kronos@gmail.com</p>
      <p><i class="fas fa-map-marker-alt"></i> Buenos Aires</p>
      <iframe class="d-none d-lg-block" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3286.186626182043!2d-58.44586488491008!3d-34.54882986210268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb436efe09303%3A0xfb39818e7624ac76!2sDigital+House!5e0!3m2!1ses-419!2sar!4v1564410428483!5m2!1ses-419!2sar" width="100%" height="390" frameborder="0" style="border:0; margin-bottom:20px;" allowfullscreen=""></iframe>
    </div>
    <div class="contactus col-lg-8 col-md-12 col-xl-6">
      <form class="col-md-12" action="" method="post">
        <div class="col-md-12">
          <label for="">Nombre</label>
          <input type="text" name="" value="" placeholder="">
        </div>
        <div class="col-md-12">
          <label for="">E-mail</label>
          <input type="text" name="" value="" placeholder="">
        </div>
        <div class="col-md-12">
          <label for="">Telefono (opcional)</label>
          <input type="text" name="" value="" placeholder="">
        </div>
        <div class="col-md-12">
          <label for="">Mensaje (opcional)</label>
          <textarea class="col-md-12"name="name" rows="8" cols="70">
          </textarea>
        </div>
        <div class="send">
          <a href="/">Enviar</a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
