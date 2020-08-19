@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="card-body col-md-12">
        <div class="separador col-md-12">
          <hr>
          <h3 class="destacados">USUARIOS</h3>
          <hr>
        </div>
        <ul class="users col-md-10">
          @forelse ($users as $user)
          <li style="color:white; font-size: 20px;">{{$user->name}} <br>
              <a style="color:white; border:1px solid yellow; border-radius:30px; padding-left:10px; padding-right:10px; font-size:15px;" href="/users/{{$user->id}}">Ver compras</a>
          </li>
          @empty

          @endforelse
        </ul>
      </div>
    </div>
  </div>
@endsection
