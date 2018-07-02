@if(session()->has('busqueda-producto'))
<div class="alert alert-warning" id="success-alert">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Notificacion</strong>{{session()->get('busqueda-producto')}}
</div>
@endif
<script>
//oculta el div para que no se vea si el usuario no lo cierra
$("#success-alert").fadeOut(5000);
</script>


@if(session()->has('notify'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Notificacion</strong>{{session()->get('notify')}}
  </div>
@endif

