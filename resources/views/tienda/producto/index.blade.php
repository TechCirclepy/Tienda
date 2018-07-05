@extends('layouts.admin')
@section('contenido')
	
	<h3>Listado de Productos <a href="producto/create"><button class="btn btn-primary">Nuevo</button></a></h3><br/>
	@include('tienda.producto.search')
	@include('tienda.producto.mensajes')
	<table class="table table-bordered">
  		<thead class="thead-dark">
  			<tr>
				<th scope="col">Nombre</th>
				<th scope="col">Descripción</th>
				<th scope="col">Precio</th>
				<th scope="col" style="width: 40px; height: 40px; ">Foto</th>
				<th scope="col">Categoria</th>
				<th scope="col">Info</th>
				<th scope="col">Opciones</th>
			</tr>	
		</thead>
			@foreach($productos as $producto)
			@if (Auth::user()->admin==1)
				<tr>
					<td>
						{{$producto->pro_nom}}<hr />
						<strong>Tienda: </strong>{{$producto->empresa}}
					</td>
					<td>{{$producto->pro_info}}</td>
					<td>
						@if ($producto->pro_ofer_active==1)
		                	<strike style="color: red;">{{$producto->pro_precio}} </strike><br />
		                	<b>Oferta:</b><br />
		                	{{$producto->pro_oferta}}
						@else
							{{$producto->pro_precio}}
						@endif
					</td>
					<td>
					<style>
						.estilo {
							width: 40px !important; 
							height: 40px !important;; 
						}
					</style>
						<img src="{{asset('imagenes/productos/'.$producto->pro_foto)}}" class="estilo img-responsive"/>
					</td>
					<th>-> {{$producto->categoria}}<br />
						-> {{$producto->subcategoria}}<br />
						-> {{$producto->detalle}}
					</th>
					<td>
						<b>Me gusta:</b><br /> {{$producto->pro_megusta}}<br />
						<b>No me gusta:</b><br /> {{$producto->pro_nomegusta}}<br />
						@if ($producto->pro_denuncia==1)
		                	<b>Denunciado:</b><br /> Si
						@else
							<b>Denunciado:</b><br /> No
						@endif
					</td>
					<td>
						<a href="{{URL::action('ProductoController@edit',$producto->pro_id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$producto->pro_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('tienda.producto.modal')
			@else
				@if ($producto->empresaid==Auth::user()->id)
				<tr>
					<td>{{$producto->pro_nom}}</td>
					<td>{{$producto->pro_info}}</td>
					<td>
						@if ($producto->pro_ofer_active==1)
		                	<strike style="color: red;">{{$producto->pro_precio}} </strike><br />
		                	<b>Oferta:</b><br />
		                	{{$producto->pro_oferta}}
						@else
							{{$producto->pro_precio}}
						@endif
					</td>
					<td>
						<img src="{{asset('imagenes/productos/'.$producto->pro_foto)}}" class="img-responsive" alt="" />
					</td>
					<th>-> {{$producto->categoria}}<br />
						-> {{$producto->subcategoria}}<br />
						-> {{$producto->detalle}}
					</th>
					<td>
						<b>Me gusta:</b><br /> {{$producto->pro_megusta}}<br />
						<b>No me gusta:</b><br /> {{$producto->pro_nomegusta}}<br />
						@if ($producto->pro_denuncia==1)
		                	<b>Denunciado:</b><br /> Si
						@else
							<b>Denunciado:</b><br /> No
						@endif
					</td>
					<td>
						<a href="{{URL::action('ProductoController@edit',$producto->pro_id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$producto->pro_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@endif
				@include('tienda.producto.modal')
			@endif
		@endforeach

				</table>
				<nav aria-label="Page navigation">
					{{$productos->render()}}
				</nav>
@endsection