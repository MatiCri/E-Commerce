@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="card-body col-md-12">
        <div class="separador col-md-12">
          <hr>
          <h3 class="destacados">EDITAR PRODUCTO</h3>
          <hr>
        </div>
        <form class="col-md-6" action="/editproduct/{{$product->id}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <div class="col-md-12">
              <input style="height:40px" id="editproductname" type="text" class="inputs form-control @error('editproductname') is-invalid @enderror" name="editproductname" value="{{$product->name}}"  autofocus placeholder="NOMBRE">

              @error('editproductname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <input style="height:40px" id="editproductprice" type="integer" class="inputs form-control @error('editproductprice') is-invalid @enderror" name="editproductprice" value="{{$product->price}}" autofocus placeholder="PRECIO">

              @error('editproductprice')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <input style="height:40px" id="editproductstock" type="integer" class="inputs form-control @error('editproductstock') is-invalid @enderror " name="editproductstock" value="{{$product->stock}}" autofocus placeholder="CANTIDAD STOCK">

              @error('editproductstock')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
              <div class="col-md-12">
                <select  style="height:40px" class='inputs col-md-12 @error('editproductcategory') is-invalid @enderror' name="editproductcategory" required>
                  <option value="" selected="" style="">Categoria</option>
                  <option value="1">Billetera</option>
                  <option value="2">Bolso</option>
                  <option value="3">Relojes</option>
                  <option value="4">Perfumes</option>
                  <option value="5">Zapatos</option>
                  <option value="6">Cinturon</option>
                </select>

                @error('editproductcategory')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label for="editproductdescription" style="color:white;">Descripcion del producto</label>
              <textarea name="editproductdescription" rows="8" cols="80" value="">
                {{$product->description}}
              </textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label for="editproductimg" style="color:white;">Seleccione foto en caso de querer cambiarla</label>
              <input style="height:40px; border:inherit;" id="editproductimg" type="file" class="inputs form-control @error('editproductimg') is-invalid @enderror" name="editproductimg" value="" autofocus placeholder="FOTO PRODUCTO">

              @error('editproductimg')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          <div class="form-group">
              <div class="col-md-12 ">
                  <button class="inputs col-md-12"  style="height:40px" type="submit" >
                      Editar Producto
                  </button>
              </div>
          </div>
        </form>
      </div>


    </div>
  </div>

@endsection
