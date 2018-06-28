@extends('layouts.user')
@section('principal')
<?php
	//funcionalidad para obtener el id de la empresa
	$url= $_SERVER["REQUEST_URI"];
	$empresaID = intval(preg_replace('/[^0-9]+/', '', $url), 10);
?>
@foreach ($empresas as $empresa)
	@if($empresa->id == $empresaID)
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img id="empresa-foto" class="img-responsive" src="{{asset('imagenes/empresas/'.$empresa->foto)}}" alt="" style="width: 400px; height: 300px;">
				</div>
				<div class="col-md-6">
					<h3 id="empresa-name">{{$empresa->name}}</h3>
		            <p id="empresa-info">{{$empresa->descripcion}}</p>
		            <h3>Contactos</h3>
		            <ul>
		                <li id="empresa-direccion"><b>Direccion: </b>{{$empresa->direccion}}</li>
		                <li id="empresa-celular"><b>Celular: </b> {{$empresa->cel}}</li>
		            </ul>
				</div>
			</div>
			<hr>
		</div>
	@endif
@endforeach
@foreach($productos as $pro)
	@if ($pro->users_id == $empresaID)
	<div class="row">
		<div class="col-lg-3 col-sm-3 portfolio-item" id="{{$pro->pro_id}}">
        <div class="card h-100">
            <i onclick="changefavorite(this)" id="{{$pro->pro_id}}" class="favorite fa fa-heart-o" style="font-size:30px;"></i>
            <a href="#">
                <img class="card-img-top img-rounded open-modal" src="{{asset('imagenes/productos/'.$pro->pro_foto)}}"  height="200px" alt="" data-toggle="modal" data-target="#DetalleModal" 
                data-pro-id="{{$pro->pro_id}}" data-pro-nom="{{$pro->pro_nom}}" data-pro-info="{{$pro->pro_info}}" data-pro-foto="{{asset('imagenes/productos/'.$pro->pro_foto)}}" data-pro-empresa="{{$pro->empresa}}" data-pro-oferta="{{$pro->pro_oferta}}" data-pro-precio="{{$pro->pro_precio}}" 
                data-pro-active="{{$pro->pro_ofer_active}}">
            </a>
            <div class="card-body">
                <h4 class="card-title">
                    <a href="#">{{$pro->pro_nom}}</a>
                </h4>
                <p class="card-text">{{$pro->pro_info}}</p>
                <p><b>Tienda:</b> {{$pro->empresa}}<br>
                    @if ($pro->pro_ofer_active==1)
                    <b>Precio: </b><strike style="color: red;">{{$pro->pro_precio}}</strike> | <b>Oferta: </b>{{$pro->pro_oferta}}
                    @else
                    <b>Precio: </b>{{$pro->pro_precio}}
                    @endif
                </p>
            </div>
            <div class="btn-group" style="margin: auto;">
                <span><a href="{{ url('/comprar',array($pro->pro_id)) }}" type="button" class="btn btn-block btn-success"><i class="fa fa-credit-card" aria-hidden="true"></i> Comprar</a></span>
                <span><button type="button" onclick="megusta(this)" id="{{$pro->pro_id}}" class="btn btn-block btn-info"><i class="fa fa-thumbs-up" aria-hidden="true"></i> ({{$pro->pro_megusta}}) </button></span>
                <span><button type="button" onclick="nomegusta(this)" id="{{$pro->pro_id}}" class="btn btn-block btn-danger"><i class="fa fa-thumbs-down" aria-hidden="true"></i> ({{$pro->pro_nomegusta}})</button></span>
            </div>
        </div>
    </div>
	</div>	
    @endif	
@endforeach
<a href="javascript:history.go(-1)">Atras</a>
@include('user.producto.modal')
@endsection