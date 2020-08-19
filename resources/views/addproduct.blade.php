@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="card-body col-md-12">
        <div class="separador col-md-12">
          <hr>
          <h3 class="destacados">AGREGAR PRODUCTO</h3>
          <hr>
        </div>
        <form class="col-md-6" action="/addproduct" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <div class="col-md-12">
              <input style="height:40px" id="productname" type="text" class="inputs form-control @error('productname') is-invalid @enderror" name="productname" value=""  autofocus placeholder="NOMBRE">

              @error('productname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <input style="height:40px" id="productprice" type="integer" class="inputs form-control @error('productprice') is-invalid @enderror" name="productprice" value="" autofocus placeholder="PRECIO">

              @error('productprice')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <input style="height:40px" id="productstock" type="integer" class="inputs form-control @error('productstock') is-invalid @enderror " name="productstock" value="" autofocus placeholder="CANTIDAD STOCK">

              @error('productstock')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
              <div class="col-md-12">
                <select  style="height:40px" class='inputs col-md-12 @error('productcategory') is-invalid @enderror' name="productcategory">
                  <option value="" selected="" style="">Categoria</option>
                  <option value="1">Reloj</option>
                  <option value="2">Billetera</option>
                  <option value="3">Eco-Biletera</option>
                  <option value="4">Mate</option>
                  <option value="5">Bombilla</option>
                  <option value="6">Combos</option>
                </select>

                @error('productcategory')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label for="productdescription" style="color:white;">Descripcion del producto</label>
              <textarea name="productdescription" rows="8" cols="80"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label for="productimg" style="color:white;">Foto del producto</label>
              <input style="height:40px; border:inherit;" id="productimg" type="file" class="inputs form-control @error('productimg') is-invalid @enderror" name="productimg" value="" autofocus placeholder="FOTO PRODUCTO">

              @error('productimg')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          <div class="form-group">
              <div class="col-md-12 ">
                  <button class="inputs col-md-12"  style="height:40px" type="submit" >
                      Agregar Producto
                  </button>
              </div>
          </div>
        </form>
      </div>


    </div>
  </div>

@endsection
