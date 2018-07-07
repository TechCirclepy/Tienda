@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Producto</h3>
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

{!! Form::open(array('url'=>'tienda/producto','method'=>'POST', 'enctype' => 'multipart/form-data', 'autocomplete'=>'off','files'=>'true')) !!}
			{{Form::token()}}
			<div class="contacto">
			<div class="form-group">
				<br /><label for="Nombre">Nombre</label>
				<input type="text" name="pro_nom" maxlength="45" class="form-control" placeholder="Nombre del producto"  required />
			</div>
			<div class="form-group">
				<label for="Descripción">Información</label>
				<textarea maxlength="200" name="pro_info" class="form-control" placeholder="Detalla brevemente el producto" required ></textarea>
			</div>
			<div class="form-group">
				<label for="precio">Precio</label>
				<input type="number" maxlength="11" min="50" max="99999999" onkeypress="return permite(event, 'num')" name="pro_precio" class="form-control" placeholder="Precio" required  />
			</div>
			<div class="form-group">
				<label for="Oferta_activada">Oferta activa</label><br />
				<input type="radio" name="pro_ofer_active" onclick="pro_oferta.disabled = false" value="1" checked required > Si 
  				<input type="radio" name="pro_ofer_active" onclick="pro_oferta.disabled = true" value="0" required > No<br>
  			</div>
  			<div class="form-group">
				<label for="precio_oferta">Precio Oferta</label>
				<input type="number" maxlength="11" min="50" max="99999999" onkeypress="return permite(event, 'num')" name="pro_oferta" class="form-control" placeholder="Precio de oferta" required  />
			</div>
			<div class="form-group">
				<label for="imagen">Producto</label>
				<input type="file" name="pro_foto" class="form-control" accept="image/jpeg, image/png, image/bmp">
			</div>
			<div class="form-group">
				<label for="Categoria">Categoria</label>
				<select name="categoria_cat_id" class="form-control" id="select-categoria" required accept="image/gif, image/jpeg, image/png">
						<option value="">Seleccione Categoria</option>
						@foreach($categorias as $cat)
							<option value="{{$cat->cat_id}}">{{$cat->cat_nom}}</option>
						@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="SubCategoria">SubCategoria</label>
				<select name="subcategoria_sub_id" class="form-control" id="select-subcategoria" required accept="image/gif, image/jpeg, image/png">
						<option value="">Seleccione Subcategoria</option>
				</select>
			</div>
			<div class="form-group">
				<label for="Categoria">SubCategoria - Detalla</label>
				<select name="categoriadetalle_det_id" class="form-control" id="select-subcategoria-detalle" required accept="image/gif, image/jpeg, image/png">
						<option value="">Seleccione Subcategoria - detalle</option>
				</select>
			</div>
			<div class="form-group">
				<label for="empresa">Empresa</label>
				<select name="users_id" class="form-control" required accept="image/gif, image/jpeg, image/png">
					<option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
				</select>
			</div>
			<div class="form-group">
				<label for="ciudad">Ciudad</label>
				<select name="ciudad_ciu_id" class="form-control" required accept="image/gif, image/jpeg, image/png">
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
			{!!Form::close()!!}
		</div>
		<script src="{{asset('js/multiselect.js')}}"></script>
	</div>
	</div>
@endsection