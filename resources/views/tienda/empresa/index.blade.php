@extends('layouts.admin')
@section('contenido')
	@if (Auth::user()->admin==1)
		<h3>Listado de Empresas <a href="empresa/create"><button class="btn btn-primary">Nuevo</button></a></h3><br/>
		@include('tienda.empresa.search')
	@else

	@endif
	<table class="table table-bordered">
  		<thead class="thead-dark">
  			<tr>
				<th scope="col">Nombre</th>
				<th scope="col">Descripción</th>
				<th scope="col">Dirección</th>
				<th scope="col">Celular</th>
				<th scope="col">Email</th>
				<th scope="col">Logotipo</th>
				<th scope="col">Opciones</th>
			</tr>
		</thead>
		@foreach($empresas as $empresa)
		@if (Auth::user()->admin==1)
			<tr>
				<td>{{$empresa->name}}</td>
				<td>{{$empresa->descripcion}}</td>
				<td>{{$empresa->direccion}}</td>
				<td>{{$empresa->cel}}</td>
				<td>{{$empresa->email}}</td>
				<td>
					<img src="{{asset('imagenes/empresas/'.$empresa->foto)}}" class="img-responsive" height="200px" alt="" />
				</td>
				<td>
					<a href="{{URL::action('EmpresaController@edit',$empresa->id)}}"><button class="btn btn-info">Editar</button></a>
					@if ($empresa->activo==1)
						<a href="" data-target="#modal-delete-{{$empresa->id}}" data-toggle="modal"><button class="btn btn-danger">Desactivar</button></a>
					@else
						<a href="" data-target="#modal-delete-{{$empresa->id}}" data-toggle="modal"><button class="btn btn-success">Activar</button></a>
					@endif
				</td>
			</tr>
		@else 
			@if ($empresa->id==Auth::user()->id)
				<tr>
					<td>{{$empresa->name}}</td>
					<td>{{$empresa->descripcion}}</td>
					<td>{{$empresa->direccion}}</td>
					<td>{{$empresa->cel}}</td>
					<td>{{$empresa->email}}</td>
					<td>
						<img src="{{asset('imagenes/empresas/'.$empresa->foto)}}" class="img-responsive" alt="" />
					</td>
					<td>
						<a href="{{URL::action('EmpresaController@edit',$empresa->id)}}"><button class="btn btn-info">Editar</button></a>
					</td>
				</tr>
			@endif
		@endif
		@include('tienda.empresa.modal')
		@endforeach
	</table>
</div>
{{$empresas->render()}}
</div>
</div>

@endsection