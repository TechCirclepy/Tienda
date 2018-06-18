@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar SubCategoria: {{ $subcategoria->sub_nom }}</h3>
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

{!! Form::model($subcategoria,['method'=>'PATCH','route'=>['subcategoria.update',$subcategoria->sub_id]]) !!}
			{{Form::token()}}
			<div class="form-group">
				<br /><input type="text" name="sub_nom" class="form-control" value="{{$subcategoria->sub_nom}}" />
			</div>
			<div class="form-group">
				<label for="Categoria">Categoria</label>
				<select name="categoria_cat_id" class="form-control">
						@foreach($categorias as $cat)
							@if ($cat->cat_id==$subcategoria->categoria_cat_id)
		                    	<option value="{{$cat->cat_id}}" selected>{{$cat->cat_nom}}</option>
							@else
								<option value="{{$cat->cat_id}}">{{$cat->cat_nom}}</option>
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