@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar SubCategoria - detalle: {{ $detalle->det_nom }}</h3>
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

{!! Form::model($detalle,['method'=>'PATCH','route'=>['detalle.update',$detalle->det_id]]) !!}
			{{Form::token()}}
			<div class="form-group">
				<label for="Categoria">Categoria</label>
				<select name="categoria_cat_id" class="form-control" id="select-categoria">
						@foreach($categorias as $cat)
							@if ($cat->cat_id==$detalle->categoria_cat_id)
		                    	<option value="{{$cat->cat_id}}" selected>{{$cat->cat_nom}}</option>
							@else
								<option value="{{$cat->cat_id}}">{{$cat->cat_nom}}</option>
							@endif
						@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="SubCategoria">SubCategoria</label>
				<select name="subcategoria_sub_id" class="form-control" id="select-subcategoria">
						@foreach($subcategorias as $sub)
							@if ($sub->sub_id==$detalle->subcategoria_sub_id)
		                    	<option value="{{$sub->sub_id}}" selected>{{$sub->sub_nom}}</option>
							@else
								<option value="{{$sub->sub_id}}">{{$sub->sub_nom}}</option>
							@endif
						@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="Categoria">Nombre</label>
				<br /><input type="text" name="det_nom" class="form-control" value="{{$detalle->det_nom}}" />
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