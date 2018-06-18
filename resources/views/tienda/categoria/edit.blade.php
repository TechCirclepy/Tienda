@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoria: {{ $categoria->cat_nom }}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>
							{{$error}}
						</li>
					@endforeach
				</ul>
			</div>
			@endif

{!! Form::model($categoria,['method'=>'PATCH','route'=>['categoria.update',$categoria->cat_id]]) !!}
			{{Form::token()}}
			<div class="form-group">
				<input type="text" name="cat_nom" class="form-control" value="{{$categoria->cat_nom}}" />
			</div>
			<div class="form-group">
				<textarea name="cat_detalle" class="form-control">{{$categoria->cat_detalle}}</textarea>
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Limpiar</button>
			</div>
			
			{!!Form::close()!!}
		</div>
	</div>
@endsection