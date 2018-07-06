@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar producto: {{ $producto->pro_nom }}</h3>
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

{!! Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->pro_id],'files'=>'true']) !!}
			{{Form::token()}}
			<div class="form-group">
				<br /><label for="Nombre">Nombre</label>
				<input type="text" name="pro_nom" class="form-control" value="{{$producto->pro_nom}}"  required />
			</div>
			<div class="form-group">
				<label for="Descripción">Información</label>
				<textarea maxlength="200" name="pro_info" class="form-control">{{$producto->pro_info}}</textarea>
			</div>
			<div class="form-group">
				<label for="precio">Precio</label>
				<input type="number" min="50" max="99999999" onkeypress="return permite(event, 'num')" name="pro_precio" class="form-control" value="{{$producto->pro_precio}}"  required />
			</div>
			<div class="form-group">
				<label for="Oferta_activada">Oferta activa</label><br />
				@if ($producto->pro_ofer_active==1)
                	<input type="radio" name="pro_ofer_active" onclick="pro_oferta.disabled = false" value="1" checked required > Si 
  					<input type="radio" name="pro_ofer_active" onclick="pro_oferta.disabled = true" value="0" required> No<br>
				@else
					<input type="radio" name="pro_ofer_active" onclick="pro_oferta.disabled = false" value="1" required> Si 
  					<input type="radio" name="pro_ofer_active" value="0" onclick="pro_oferta.disabled = true" checked required> No<br>
				@endif
  			</div>
  			<div class="form-group">
				<label for="precio_oferta">Precio Oferta</label>
				@if ($producto->pro_ofer_active==1)
					<input type="number" min="50" max="99999999" onkeypress="return permite(event, 'num')" name="pro_oferta" class="form-control" value="{{$producto->pro_oferta}}"  required />
				@else
					<input type="number" min="50" max="99999999" onkeypress="return permite(event, 'num')" name="pro_oferta" disabled="disabled" class="form-control" value="{{$producto->pro_oferta}}"  required />
				@endif
			</div>
			<div class="form-group">
				<label for="imagen">Producto</label>
				<input type="file" name="pro_foto" class="form-control" value="{{$producto->pro_foto}}" accept="image/jpeg, image/png, image/bmp" required >
				<img src="{{asset('imagenes/productos/'.$producto->pro_foto)}}" class="img-responsive" alt="" />
			</div>
			<div class="form-group">
				<label for="Categoria">Categoria</label>
				<select name="categoria_cat_id" class="form-control" id="select-categoria" required>
						@foreach($categorias as $cat)
							@if ($cat->cat_id==$producto->categoria_cat_id)
		                    	<option value="{{$cat->cat_id}}" selected>{{$cat->cat_nom}}</option>
							@else
								<option value="{{$cat->cat_id}}">{{$cat->cat_nom}}</option>
							@endif
						@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="SubCategoria">SubCategoria</label>
				<select name="subcategoria_sub_id" class="form-control" id="select-subcategoria" required>
						@foreach($subcategorias as $sub)
							@if ($sub->sub_id==$producto->subcategoria_sub_id)
		                    	<option value="{{$sub->sub_id}}" selected>{{$sub->sub_nom}}</option>
							@else
								<option value="{{$sub->sub_id}}">{{$sub->sub_nom}}</option>
							@endif
						@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="Categoria">SubCategoria - Detalle</label>
				<select name="categoriadetalle_det_id" class="form-control" id="select-subcategoria-detalle" required>
						@foreach($detalles as $det)
							@if ($det->det_id==$producto->categoriadetalle_det_id)
		                    	<option value="{{$det->det_id}}" selected>{{$det->det_nom}}</option>
							@else
								<option value="{{$det->det_id}}">{{$det->det_nom}}</option>
							@endif
						@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="empresa">Empresa</label>
				<select name="users_id" class="form-control" required>
					<option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
				</select>
			</div>
			<div class="form-group">
				<label for="ciudad">Ciudad</label>
				<select name="ciudad_ciu_id" class="form-control" required>
					@foreach($ciudads as $ciu)
						@if ($ciu->ciu_id==Auth::user()->ciudad_ciu_id)
							<option value="{{Auth::user()->ciudad_ciu_id}}">{{$ciu->ciu_nom}}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Limpiar</button>
			</div>
			<script src="{{asset('js/multiselect.js')}}"></script>
			{!!Form::close()!!}
		</div>

	</div>
@endsection