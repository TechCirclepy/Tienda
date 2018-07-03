@if(session()->has('agregar-producto'))
<div class="alert alert-success" id="success-alert">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Notificacion</strong>{{session()->get('agregar-producto')}}
</div>
@endif