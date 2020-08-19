@extends('layouts.app')

@section('content')
<div class="container login">

    <div class="row">
    <div class="card-body col-md-12">
      <div class="separador col-md-12">
        <hr>
        <h3 class="destacados">INICIAR SESION</h3>
        <hr>
      </div>
      <form class="col-md-8"  method="POST" action="{{ route('login') }}">
          @csrf
                        <div class="form-group row col-md-12">
                            <div class="col-md-12">
                                <input id="email" type="email" class="inputs form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-MAIL">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-md-12">

                            <div class="col-md-12">
                                <input id="password" type="password" class="inputs form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="CONTRASENA">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-md-12">
                            <div class="col-md-12 offset-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label col-md-12" for="remember">
                                        Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Iniciar Sesion
                                </button>
                          </div>
                                <div class="col-md-12">
                                  @if (Route::has('password.request'))
                                      <a class="btn btn-link col-md-12" href="{{ route('password.request') }}">
                                          Olvidaste la contraseña ?
                                      </a>
                                  @endif
                                </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
