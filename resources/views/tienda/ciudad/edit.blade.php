@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Ciudad: {{ $ciudad->ciu_nom }}</h3>
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

{!! Form::model($ciudad,['method'=>'PATCH','route'=>['ciudad.update',$ciudad->ciu_id]]) !!}
			{{Form::token()}}
			<div class="form-group">
				<input type="text" name="ciu_nom" class="form-control" value="{{$ciudad->ciu_nom}}" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Limpiar</button>
			</div>
			
			{!!Form::close()!!}
		</div>
	</div>
@endsection