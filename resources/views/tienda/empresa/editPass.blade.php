@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Cambiar Contrasena</h3>
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

{!! Form::model($empresa,['method'=>'PATCH','url'=>['/cambiar-pass/'.$empresa->id]]) !!}
			{{Form::token()}}
			<div class="form-group">
				<br /><label for="Nombre">Contraseña</label>
				<input type="password" name="password" class="form-control" placeholder="Ingrese Contraseña" />
			</div>
			<div class="form-group">
				<br /><label for="Nombre">Confirmar Contraseña</label>
				<input type="password" name="password_confirmation" class="form-control" placeholder="Confirme contraseña" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" href="{{url('tienda/empresa')}}">Volver</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection