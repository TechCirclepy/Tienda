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
@foreach($productos as $producto)
	@if ($producto->users_id == $empresaID)
	<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-4">
	                        <div class="thumbnail">
	                            <img src="{{asset('imagenes/productos/'.$producto->pro_foto)}}" alt="" style="width: 320px; height: 150px;">
	                            <div class="caption">
			                    	<h4>Producto: {{$producto->pro_nom}}</h4>
			                    	@if ($producto->pro_ofer_active==1)
			                        	<h4 class="pull-right">Precio Oferta: {{$producto->pro_oferta}}</h4>
			                        @else
			                        	<h4 class="pull-right">Precio Normal: {{$producto->pro_precio}}</h4>
			                        @endif
			                        <br>
			                        <p>{{$producto->pro_info}}</p>
		                    	</div>
	                        </div>
                    	</div>
					</div>
				</div>
			</div>
		</div>	
    @endif	
@endforeach
@endsection