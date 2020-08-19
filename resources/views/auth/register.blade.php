@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="card-body col-md-12">
                  <div class="separador col-md-12">
                    <hr>
                    <h3 class="destacados">REGISTRATE</h3>
                    <hr>
                  </div>
                    <form class="col-md-6" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input style="height:40px" id="name" type="text" class="inputs form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="NOMBRE">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input style="height:40px" id="email" type="email" class="inputs form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-MAIL">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                              <select  style="height:40px" class='inputs col-md-12' name="nationality">
                                <option value="" selected="" style="">NACIONALIDAD</option>
                                <option value="arg">Argentina</option>
                                <option value="cl" >Chile</option>
                                <option value="uru">Uruguay</option>
                                <option value="br">Brasil</option>
                                <option value="ecu">Ecuador</option>
                                <option value="par">Paraguay</option>
                                <option value="bol">Bolivia</option>
                                <option value="ven">Venezuela</option>
                              </select>

                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="birth_date" class="col-md-4 col-form-label text-md-right">Fecha Nacimiento</label> --}}

                            <div class="col-md-12">
                                <input style="height:40px" id="birth_date" type="date" class="inputs form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date">

                                @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-12">
                                <input  style="height:40px" id="password" type="password" class="inputs form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="CONTRASENA">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                            <div class="col-md-12">
                                <input  style="height:40px" id="password-confirm" type="password" class="inputs form-control" name="password_confirmation" required autocomplete="new-password" placeholder="CONFIRMAR CONTRASENA">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 ">
                                <button class="inputs col-md-12"  style="height:40px" type="submit" >
                                    Registrarme
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
