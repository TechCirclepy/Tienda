@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de SubCategorias - Detalle <a href="detalle/create"><button class="btn btn-primary">Nuevo</button></a></h3><br/>
			@include('tienda.detalle.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>SubCategoria - Detalle</th>
						<th>SubCategoria</th>
						<th>Categoria</th>
						<th>Opciones</th>
					</thead>
					@foreach($detalles as $detalle)
					<tr>
						<td>{{$detalle->det_nom}}</td>
						<td>{{$detalle->subcategoria}}</td>
						<td>{{$detalle->categoria}}</td>
						<td>
							<a href="{{URL::action('CatDetalleController@edit',$detalle->det_id)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$detalle->det_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('tienda.detalle.modal')
					@endforeach
				</table>
			</div>
			{{$detalles->render()}}
		</div>
	</div>
@endsection