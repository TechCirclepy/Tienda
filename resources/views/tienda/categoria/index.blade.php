@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Categorias <a href="categoria/create"><button class="btn btn-primary">Nuevo</button></a></h3><br/>
			@include('tienda.categoria.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Categoria</th>
						<th>Detalle</th>
						<th>Opciones</th>
					</thead>
					@foreach($categorias as $categoria)
					<tr>
						<td>{{$categoria->cat_nom}}</td>
						<td>{{$categoria->cat_detalle}}</td>
						<td>
							<a href="{{URL::action('CategoriaController@edit',$categoria->cat_id)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$categoria->cat_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('tienda.categoria.modal')
					@endforeach
				</table>
			</div>
			{{$categorias->render()}}
		</div>
	</div>
@endsection