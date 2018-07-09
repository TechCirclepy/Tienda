@extends('layouts.user')
@section('principal')
<?php
    use Tienda\User;
    $empresas = User::all();
    //funcionalidad para obtener el id de la empresa
    $url= $_SERVER["REQUEST_URI"];
    $productoID = intval(preg_replace('/[^0-9]+/', '', $url), 10); 
?>
<div class="container">
    <h1 class="text-center">Realizar pedido</h1>
    <div class="row">
      <div class="col-sm-6">
        @include('user.compra_producto.form', ['compra' => $compra, 'url' => '/comprar', 'method' => 'POST'])
      </div>
      @foreach($productos as $producto)
        @if($producto->pro_id == $productoID)
          <div class="col-sm-6">
            <div class="thumbnail">
              <img id="pro_foto" src="{{asset('imagenes/productos/'.$producto->pro_foto)}}" alt="" style="width: 400px; height: 250px;">
                <div class="caption">
                @if ($producto->pro_ofer_active==1)
                  <h4 id="pro_precio" class="">Precio Oferta: {{$producto->pro_oferta}}</h4>
                @else
                  <h4 id="pro_precio" class="">Precio Normal: {{$producto->pro_precio}}</h4>
                @endif
                  <h4><a id="pro_nom" href="#">{{$producto->pro_nom}}</a></h4>
                  <p id="pro_info" >{{$producto->pro_info}}</p>
                  <script>
                    var user_id = "{{$producto->users_id}}";
                    //alert('{{$producto->users_id}}');
                    user_id = document.getElementsByName("users_id")[0].value = user_id;
                  </script>
                @foreach($empresas as $empresa)
                  @if($empresa->id == $producto->users_id)
                    <p id="pro_empresa">Tienda: {{$empresa->name}}</p>
                  @endif
                @endforeach 
                  
                </div>
              </div>
          </div>
        @endif
      @endforeach    
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
  //script para guardar el id del producto y el usuario
  var productoIDjs = '<?php echo $productoID; ?>';
  productoIDjs = document.getElementsByName("producto_pro_id")[0].value = productoIDjs;
</script>
@endsection