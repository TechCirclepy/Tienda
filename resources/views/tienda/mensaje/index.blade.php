@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 class="title1">Buzón de Entrada</h3><br/>
			@include('tienda.mensaje.search')
		</div>
	</div>
	<div class="mb-4" id="accordion" role="tablist" aria-multiselectable="true">
	  	@foreach($mensajes as $men)
	  	@if (Auth::user()->admin==1)
	  		<div class="card">
	          	<div class="card-header" role="tab" id="headingOne">
	            	<h5 class="mb-0">
	              		<a data-toggle="collapse" data-parent="#accordion" href="#{{$men->men_id}}" aria-expanded="true" aria-controls="collapseOne">Nueva compra de: {{$men->nombre}}</a>
	              		@if ($men->leido == 0)
	              			<kbd style="background-color: red;box-shadow: 0 0 10px 1px #969696;  position:absolute;right:5px;color:white;">Nuevo</kbd>
	              		@endif	
	            	</h5>
	          	</div>
				<div id="{{$men->men_id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
            		<div class="card-body">
            			<p>Cliente: {{$men->nombre}}</p>
            			<p>Contacto: {{$men->celular}}</p>
						<b>Producto: </b>{{$men->producto}} | <b>Nº Ref.: </b>{{$men->pro_id}}<br />
						<img src="{{asset('imagenes/productos/'.$men->pro_foto)}}" class="img-responsive" style="text-align: right;" height="50%" width="50%" alt="" />
						<b>Mensaje: </b>{{$men->mensaje}} <br />
						<p style="text-align: right;">
							@if ($men->leido == 0)
								<button class="btn btn-success">Macar como leído</button>
							@endif
							<a href="" data-target="#modal-delete-{{$men->men_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</p>
		  			</div>
		  		</div>
		  	</div>	
	  	@elseif ($men->empresaid==Auth::user()->id)
			<div class="card">
	          	<div class="card-header" role="tab" id="headingOne">
	            	<h5 class="mb-0">
	              		<a data-toggle="collapse" data-parent="#accordion" href="#{{$men->men_id}}" aria-expanded="true" aria-controls="collapseOne">Nueva compra de: {{$men->nombre}}</a>
	              		@if ($men->leido == 0)
	              			<kbd style="background-color: red;box-shadow: 0 0 10px 1px #969696;  position:absolute;right:5px;color:white;">Nuevo</kbd>
	              		@endif
	            	</h5>
	          	</div>
				<div id="{{$men->men_id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
            		<div class="card-body">
            			<p>Cliente: {{$men->nombre}}</p>
            			<p>Contacto: {{$men->celular}}</p>
						<b>Producto: </b>{{$men->producto}} | <b>Nº Ref.: </b>{{$men->pro_id}}<br />
						<img src="{{asset('imagenes/productos/'.$men->pro_foto)}}" class="img-responsive" height="25%" width="25%" alt="" />
						<b>Mensaje: </b>{{$men->mensaje}} <br />
						<p style="text-align: right;">
							@if ($men->leido == 0)
								<button class="btn btn-success" onclick="marcar_leido(this)" data="{{$men->men_id}}">Macar como leído</button>
							@endif
							<a href="" data-target="#modal-delete-{{$men->men_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</p>
		  			</div>
		  		</div>
		  	</div>	
		@endif	
		@include('tienda.mensaje.modal')
		@endforeach
	</div>
	<script>
		function marcar_leido(e) {
		    var token = '{{Session::token()}}';
		    var id_prod = $(e).attr('data');
		    
		    var formData = {
		        cantidad: 1,
		    }
		    type = "POST"; // para actualizar recursos existentes
		    my_url = 'leido/' + id_prod;
		    
		    console.log(formData);
		    $.ajaxSetup({
		      headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      }
		    });
		    $.ajax({
		        type: type,
		        url: my_url,
		        data: formData,
		        dataType: 'json',
		        success: function (data) {
		            $(e).hide('slow');
		        },
		        error: function (data) {
		            console.log('Error:', data);
		        }
		    });
		}
	</script>
@endsection