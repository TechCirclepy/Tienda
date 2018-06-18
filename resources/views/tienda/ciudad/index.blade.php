@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Ciudades <a href="ciudad/create"><button class="btn btn-primary">Nuevo</button></a></h3><br/>
			@include('tienda.ciudad.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Ciudad</th>
						<th>Opciones</th>
					</thead>
					@foreach($ciudads as $ciudad)
					<tr>
						<td>{{$ciudad->ciu_nom}}</td>
						<td>
							<a href="{{URL::action('CiudadController@edit',$ciudad->ciu_id)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$ciudad->ciu_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('tienda.ciudad.modal')
					@endforeach
				</table>
			</div>
			{{$ciudads->render()}}
		</div>
	</div>
@endsection