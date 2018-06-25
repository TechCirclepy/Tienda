@extends('layouts.user')
@section('principal')
<div class="container">
    <h1 class="text-center">Realizar pedido</h1>
    <div class="row">
      <div class="col-sm-6">
        @include('user.compra_producto.form', ['compra' => $compra, 'url' => '/comprar', 'method' => 'POST'])
      </div>
      <div class="col-sm-6">
        <div class="thumbnail">
          <img id="pro_foto" src="http://placehold.it/320x150" alt="" style="width: 400px; height: 250px;">
            <div class="caption">
              <h4 id="pro_precio" class="">$24.99</h4>
              <h4><a id="pro_nom" href="#">First Product</a></h4>
              <p id="pro_info" >See more snippets like this online store item at</p>
              <p id="pro_empresa"></p>
            </div>
          </div>
      </div>    
    </div>
</div>
<div class="container">
  @if(session()->has('notificacion'))
  <div class="row">
    <div class="alert alert-success">
      <button class="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <p>{{session()->get('notificacion')}}</p>
    </div>
  </div>
  @endif
</div>

<script>
  //script para estirar el ID del producto de la url
  var regex = /(\d+)/g;
  var URLactual = window.location.pathname;
  var convertir = URLactual.match(regex);//saca las cadenas de texto para que quede el id
  convertir = document.getElementsByName("producto_pro_id")[0].value = convertir;
  var EnteroConvert = Number(convertir);
</script>
@foreach($productos as $producto)
<!--script que captura el id del producto para pasar sus caracteristicas -->
<script>
  if ( {{$producto->pro_id}} == EnteroConvert) {
    document.getElementById("pro_nom").innerHTML = "{{$producto->pro_nom}}";

    if({{$producto->pro_ofer_active }} == 1) {
       document.getElementById("pro_precio").innerHTML = "Precio de Oferta: {{$producto->pro_oferta}}";
    } else {
      document.getElementById("pro_precio").innerHTML = "Precio: {{$producto->pro_precio}}";
    }
    
    document.getElementById("pro_info").innerHTML = "{{$producto->pro_info}}";
    var user_id = "{{$producto->users_id}}";
    user_id = document.getElementsByName("users_id")[0].value = user_id;
    document.getElementById("pro_foto").src = "{{asset('imagenes/productos/'.$producto->pro_foto)}}";
    document.getElementById("pro_empresa").innerHTML = "Tienda: {{$producto->pro_empresa}}";
  }
</script>
@endforeach
@endsection