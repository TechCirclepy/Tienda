@extends('layouts.user')
@section('principal')
<div class="container">
    <h1>Realizar pedido</h1>
    @include('user.compra_producto.form', ['compra' => $compra, 'url' => '/comprar', 'method' => 'POST'])
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
<?php
    $variablePHP = '<script> document.write(EnteroConvert) </script>';
    echo 'variablePHP = '.$variablePHP;
    $variablePHP = (int) $variablePHP;
?>

@endsection