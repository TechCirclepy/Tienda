@if(session()->has('notify'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Notificacion</strong>{{session()->get('notify')}}
  </div>
@endif