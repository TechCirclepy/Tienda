
@if(session()->has('busqueda-producto'))
<div class="alert alert-warning mostrar" id="success-alert">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Notificacion</strong>{{session()->get('busqueda-producto')}}
</div>
@endif

@if(session()->has('notify'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Notificacion</strong>{{session()->get('notify')}}
  </div>
@endif

