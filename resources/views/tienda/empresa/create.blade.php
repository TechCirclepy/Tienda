@extends('layouts.admin')
@section('contenido')
@if (Auth::user()->admin==1)
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Empresa</h3>
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

{!! Form::open(array('url'=>'tienda/empresa','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
			{{Form::token()}}
			<div class="form-group">
				<br /><label for="Nombre">Nombre</label>
				<input type="text" name="name" class="form-control" placeholder="Nombre de la empresa"  required />
			</div>
			<div class="form-group">
				<label for="Admin">Administrador</label><br />
				<input type="radio" name="admin" value="1" required > Si 
  				<input type="radio" name="admin" value="0" checked required > No<br>
  			</div>
			<div class="form-group">
				<br /><label for="Nombre">Contraseña</label>
				<input type="password" name="password" class="form-control" placeholder="Ingrese Contraseña"  required />
			</div>
			<div class="form-group">
				<br /><label for="Nombre">Confirmar Contraseña</label>
				<input type="password" name="password_confirmation" class="form-control" placeholder="Ingrese Contraseña"  required />
			</div>
			<div class="form-group">
				<label for="imagen">Logotipo</label>
				<input type="file" name="foto" class="form-control" accept="image/jpeg, image/png, image/bmp" >
			</div>
			<div class="form-group">
				<label for="Descripción">Descripción</label>
				<textarea maxlength="200" name="descripcion" class="form-control" placeholder="Detalla brevemente tu empresa" required ></textarea>
			</div>
			<div class="form-group">
				<label for="Dirección">Dirección</label>
				<input type="text" name="direccion" class="form-control" maxlength="200" placeholder="Dirección de la empresa" required  />
			</div>
			<div class="form-group">
				<label for="Celular">Celular</label>
				<input type="phone" name="cel" maxlength="15" class="form-control" onkeypress="return permite(event, 'num')" placeholder="Celular" required />
			</div>
			<div class="form-group">
				<label for="E-mail">E-mail</label>
				<input type="email" name="email" class="form-control" placeholder="E-mail" required />
			</div>
			<div class="form-group">
				<label for="ciudad">Ciudad</label>
				<select name="ciudad_ciu_id" class="form-control" required>
						@foreach($ciudads as $ciu)
							<option value="{{$ciu->ciu_id}}">{{$ciu->ciu_nom}}</option>
						@endforeach
				</select>
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Limpiar</button>
			</div>
			
			{!!Form::close()!!}
		</div>
	</div>
@endsection
@endif