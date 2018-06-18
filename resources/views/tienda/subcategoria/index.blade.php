@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de SubCategorias <a href="subcategoria/create"><button class="btn btn-primary">Nuevo</button></a></h3><br/>
			@include('tienda.subcategoria.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>SubCategoria</th>
						<th>Categoria</th>
						<th>Opciones</th>
					</thead>
					@foreach($subcategorias as $subcategoria)
					<tr>
						<td>{{$subcategoria->sub_nom}}</td>
						<td>{{$subcategoria->categoria}}</td>
						<td>
							<a href="{{URL::action('SubCategoriaController@edit',$subcategoria->sub_id)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$subcategoria->sub_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('tienda.subcategoria.modal')
					@endforeach
				</table>
			</div>
			{{$subcategorias->render()}}
		</div>
	</div>
@endsection