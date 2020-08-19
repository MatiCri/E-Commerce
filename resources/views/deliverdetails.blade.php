@extends('layouts.app')


@section('content')
      <div class="card-body col-md-12">
        <div class="separador col-md-12">
          <hr>
          <h3 class="destacados"> DETALLES DE ENVIO !</h3>
          <hr>
        </div>
        <form class="col-md-6" method="POST" action="/thanks" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-md-12">
                    <input style="height:40px" id="direction" type="text" class="inputs form-control @error('direction') is-invalid @enderror" name="direction" value="{{ old('direction') }}" required autocomplete="direction" autofocus placeholder="DIRECCION DE ENVIO">

                    @error('direction')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input style="height:40px" id="localidad" type="text" class="inputs form-control @error('localidad') is-invalid @enderror" name="localidad" value="{{ old('localidad') }}" required autocomplete="localidad" placeholder="LOCALIDAD">

                    @error('localidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <input style="height:40px" id="codigopostal" type="text" class="inputs form-control @error('codigopostal') is-invalid @enderror" name="codigopostal" value="{{ old('codigopostal') }}" required autocomplete="codigopostal" placeholder="CODIGO POSTAL">

                    @error('codigopostal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                  <select  style="height:40px" class='inputs col-md-12' name="pago">
                    <option value="" selected="" style="">METODO DE PAGO</option>
                    <option value="ef">Efectivo en punto de entrega</option>
                    <option value="MP">Mercado Pago</option>
                  </select>

                    @error('pago')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-12 ">
                    <button class="inputs col-md-12"  style="height:40px" type="submit" >
                      COMPRAR
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection
