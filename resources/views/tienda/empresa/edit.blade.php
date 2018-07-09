@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Empresa: {{ $empresa->name }}</h3>
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

{!! Form::model($empresa,['method'=>'PATCH','route'=>['empresa.update',$empresa->id],'files'=>'true']) !!}
			{{Form::token()}}
			<div class="form-group">
				<br /><label for="Nombre">Nombre</label>
				<input type="text" name="name" class="form-control" value="{{$empresa->name}}"  required />
			</div>
			@if (Auth::user()->admin==1)
			<div class="form-group">
				<label for="Oferta_activada">Es un administrador</label><br />
				@if ($empresa->admin==1)
                	<input type="radio" name="admin" value="1" checked required > Si 
  					<input type="radio" name="admin" value="0" required > No<br>
				@else
					<input type="radio" name="admin" value="1" required > Si 
  					<input type="radio" name="admin" value="0" checked required > No<br>
				@endif
  			</div>
  			@endif
  			<!--
			<div class="form-group">
				<br /><label for="Nombre">Contraseña</label>
				<input type="password" name="password" class="form-control" placeholder="Ingrese Contraseña" />
			</div>
			<div class="form-group">
				<br /><label for="Nombre">Confirmar Contraseña</label>
				<input type="password" name="password_confirmation" class="form-control" placeholder="Confirme contraseña" />
			</div>
			-->
			<div class="form-group">
				<label for="imagen">Logotipo</label>
				<input type="file" name="foto" value="{{asset('imagenes/empresas/'.$empresa->foto)}}" class="form-control" accept="image/jpeg, image/png, image/bmp">
				<img src="{{asset('imagenes/empresas/'.$empresa->foto)}}" class="img-responsive" alt="" style="width: 100px;" />
			</div>
			<div class="form-group">
				<label for="Descripción">Descripción</label>
				<textarea maxlength="200" name="descripcion" class="form-control" required>{{$empresa->descripcion}}</textarea>
			</div>
			<div class="form-group">
				<label for="Dirección">Dirección</label>
				<input type="text" name="direccion" class="form-control" value="{{$empresa->direccion}}" required />
			</div>
			<div class="form-group">
				<label for="Celular">Celular</label>
				<input type="phone" name="cel" class="form-control" onkeypress="return permite(event, 'num')" value="{{$empresa->cel}}" required />
			</div>
			<div class="form-group">
				<label for="ciudad">Ciudad</label>
				<select name="ciudad_ciu_id" class="form-control" required>
						@foreach($ciudads as $ciu)
							@if ($ciu->ciu_id==$empresa->ciudad_ciu_id)
		                    	<option value="{{$ciu->ciu_id}}" selected required>{{$ciu->ciu_nom}}</option>
							@else
								<option value="{{$ciu->ciu_id}}" required>{{$ciu->ciu_nom}}</option>
							@endif
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