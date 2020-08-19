@extends('layouts.app')


@section('content')
      <div class="card-body col-md-12">
        <div class="separador col-md-12">
          <hr>
          <h3 class="destacados"> TU COMPRA SE HA REALIZADO CON EXITO !</h3>
          <hr>
        </div>
        <div class="col-md-12">
            <h4 style="text-align:left; color:white;">Su compra llegara a su domicilio en los proximos 3 dias habiles:</h4>
        </div>
        <div style="color:white;" class="col-md-12">
          @forelse ($closeCart as $item)
          <li style="display:flex;" type="none" class="col-md-8">
              <div class="col-md-4">
                <h5>{{$item->cant}} x {{$item->name}} </h5>
              </div>
              <div class="col-md-4">
                <h5>Subtotal: $ {{$item->cant * $item->price}} </h5>
              </div>
         </li>
          @empty

          @endforelse
          <hr>
          <h3 style="text-align:right;">TOTAL: $ {{$total}}</h3>
        </div>
        </div>
      </div>

@endsection
