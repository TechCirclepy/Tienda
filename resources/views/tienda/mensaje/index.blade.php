@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3 class="title1">Buzón de Entrada</h3><br/>
			@include('tienda.mensaje.search')
		</div>
	</div>

	<div class="tab">
	  	@foreach($mensajes as $men)	
	  		@if ($men->empresaid==Auth::user()->id)
		  		<button class="tablinks" onclick="openMsg(event, {{$men->men_id}})" id="defaultOpen">
		  			Nueva compra de: {{$men->nombre}}
		  			@if ($men->leido == 0)
	              		<kbd class="{{$men->men_id}}" style="background-color: red; box-shadow: 0 0 10px 1px #969696; color:white;"> Nuevo </kbd>
	              	@endif
		  		</button>
		  	@endif
		@endforeach
	</div>
	@foreach($mensajes as $men)	
	  	@if ($men->empresaid==Auth::user()->id)
			<div id="{{$men->men_id}}" class="tabcontent">
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
		@endif
		@include('tienda.mensaje.modal')
	@endforeach
	<script>
		function openMsg(evt, Msg) {
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }
		    document.getElementById(Msg).style.display = "block";
		    evt.currentTarget.className += " active";
		}

		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
		
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
		            var cambiar = "."+id_prod;
		            $(cambiar).hide('slow');
		        },
		        error: function (data) {
		            console.log('Error:', data);
		        }
		    });
		}
	</script>
@endsection