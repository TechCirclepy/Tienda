@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva SubCategorias - Detalle </h3>
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

{!! Form::open(array('url'=>'tienda/detalle','method'=>'POST','autocomplete'=>'off')) !!}
			{{Form::token()}}
			<div class="form-group">
				<label for="Categoria">Categoria</label>
				<select name="categoria_cat_id" class="form-control" id="select-categoria">
						<option value="">Seleccione Categoria</option>
						@foreach($categorias as $cat)
							<option value="{{$cat->cat_id}}">{{$cat->cat_nom}}</option>
						@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="SubCategoria">SubCategoria</label>
				<select name="subcategoria_sub_id" class="form-control" id="select-subcategoria">
						<option value="">Seleccione Subcategoria</option>
				</select>
			</div>
			<div class="form-group">
				<label for="Categoria">Nombre</label>
				<br /><input type="text" name="det_nom" class="form-control" placeholder="SubCategoría - Detalle" />
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