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
			<hr class="linea">
		</div>
	@endif
@endforeach
@include('user.producto.reportemensaje')
<div class="container text">
    <div id="products">
        @foreach($productos as $pro)
            @if ($pro->users_id == $empresaID)
                <div class="products white-panel">
                    <h3>
                        <a href="#" class="open-modal" data-toggle="modal" data-target="#DetalleModal" 
                        data-pro-id="{{$pro->pro_id}}" data-pro-nom="{{$pro->pro_nom}}" data-pro-info="{{$pro->pro_info}}" data-pro-foto="{{asset('imagenes/productos/'.$pro->pro_foto)}}" data-pro-empresa="{{$pro->empresa}}" data-pro-oferta="{{$pro->pro_oferta}}" data-pro-precio="{{$pro->pro_precio}}" 
                        data-pro-active="{{$pro->pro_ofer_active}}">{{$pro->pro_nom}}</a>
                    </h3><hr>
                    <i onclick="changefavorite(this)" id="{{$pro->pro_id}}" class="favorite fa fa-heart-o" style="font-size:30px;"></i>
                    <a href="#">
                        <img class="card-img-top img-rounded open-modal" src="{{asset('imagenes/productos/'.$pro->pro_foto)}}"  height="200px" alt="" data-toggle="modal" data-target="#DetalleModal" 
                        data-pro-id="{{$pro->pro_id}}" data-pro-nom="{{$pro->pro_nom}}" data-pro-info="{{$pro->pro_info}}" data-pro-foto="{{asset('imagenes/productos/'.$pro->pro_foto)}}" data-pro-empresa="{{$pro->empresa}}" data-pro-oferta="{{$pro->pro_oferta}}" data-pro-precio="{{$pro->pro_precio}}" 
                        data-pro-active="{{$pro->pro_ofer_active}}">
                    </a>
                    <div class="products-info panel">
                        <p>{{$pro->pro_info}}</p>
                        <p>
                            @if ($pro->pro_ofer_active==1)
                                <b>Precio: </b><strike style="color: red;">{{$pro->pro_precio}}</strike> | <b>Oferta: </b>{{$pro->pro_oferta}}
                                @else
                                <b>Precio: </b>{{$pro->pro_precio}}
                            @endif
                        </p>
                        <span>
                            <a class="report-modal" href="" title="" data-toggle="modal" data-target="#modal-reporte" data-proid="{{$pro->pro_id}}" data-proname="{{$pro->pro_nom}}"
                             @foreach ($empresas as $empresa)
                                @if($empresa->id == $pro->users_id)
                                    data-proempresa="{{$empresa->name}}">
                                @endif
                            @endforeach
                                <i class="fa fa-exclamation-triangle"></i>
                                    Reportar
                            </a>
                        </span>
                        <p>
                            <span><a href="{{ url('/comprar',array($pro->pro_id)) }}" type="button" class="btn btn-block btn-success"><i class="fa fa-credit-card" aria-hidden="true"></i> Comprar</a></span>
                        </p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@include('user.producto.modal-reporte')	
<script>
    cargafavorite();
</script>
<a type="button" href="javascript:history.go(-1)" class="btn btn-default">Atras</a>
@include('user.producto.modal')
@endsection