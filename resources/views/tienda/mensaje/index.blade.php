@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 class="title1">Buzón de Entrada</h3><br/>
			@include('tienda.mensaje.search')
		</div>
	</div>
	<div class="panel-group tool-tips widget-shadow" id="accordion" role="tablist" aria-multiselectable="true">
	  <div class="panel panel-default">
	  	@foreach($mensajes as $men)
	  	@if (Auth::user()->admin==1)
			<div class="panel-heading" role="tab" id="headingTwo">
		  		<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{$men->men_id}}" aria-expanded="false" aria-controls="collapseTwo">
			  		<b>Mensaje de:</b> {{$men->nombre}} | <b>Ciudad: </b>{{$men->ciudad}} | <b>Contacto:</b> <a href="tel:{{$men->celular}}">{{$men->celular}}</a>
					</a>
		  		</h4>
			</div>
			<div id="{{$men->men_id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
		  		<div class="panel-body">
					<b>Producto: </b>{{$men->producto}} | <b>Nº Ref.: </b>{{$men->pro_id}}<br />
					<img src="{{asset('imagenes/productos/'.$men->pro_foto)}}" class="img-responsive" height="300px" width="150px" alt="" />
					<b>Mensaje: </b>{{$men->mensaje}} <br />
					<p style="text-align: right;"><a href="" data-target="#modal-delete-{{$men->men_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></p>
		  		</div>
			</div>
	  	@else
	  		@if ($men->empresaid==Auth::user()->id)
			<div class="panel-heading" role="tab" id="headingOne">
		  		<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			  		<b>Mensaje de:</b> {{$men->nombre}} | <b>Ciudad: </b>{{$men->ciudad}} | <b>Contacto:</b> <a href="tel:{{$men->celular}}">{{$men->celular}}</a>
					</a>
		  		</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
		  		<div class="panel-body">
		  			<b>Producto: </b>{{$men->producto}} | <b>Nº Ref.: </b>{{$men->pro_id}}<br />
					<img src="{{asset('imagenes/productos/'.$men->pro_foto)}}" height="300px" width="150px" class="img-responsive" alt="" />
					<b>Mensaje: </b>{{$men->mensaje}} <br />
					<p style="text-align: right;"><a href="" data-target="#modal-delete-{{$men->men_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></p>
		  		</div>
			</div>
			@endif
		@endif	
		@include('tienda.mensaje.modal')
		@endforeach
	  </div>
	</div>
@endsection