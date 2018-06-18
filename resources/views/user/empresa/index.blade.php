@extends('layouts.user')
@section('principal')

@include('user.empresa.search')
<div class="row">
    @foreach($empresas as $emp)
    @if($emp->activo==1)
    <div class="col-lg-3 col-sm-3 portfolio-item">
        <div class="card h-100">
            <a href="#"><img class="card-img-top img-rounded" src="{{asset('imagenes/empresas/'.$emp->foto)}}"  height="200px" alt=""></a>
            <div class="card-body">
                <h4 class="card-title">
                    <a href="#">{{$emp->name}}</a>
                </h4>
                <p class="card-text">{{$emp->descripcion}}</p>
                <p>
                  <center><h4><b>Contacto</b></h4></center>
                  <p><b>Dirección:</b> {{$emp->direccion}}</p>
                  <p><b>Celular:</b> <a href="tel:0{{$emp->cel}}">0{{$emp->cel}}</a></p>
                </p>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>

{{$empresas->render()}}
@endsection