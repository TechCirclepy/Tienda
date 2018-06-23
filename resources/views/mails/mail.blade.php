@extends('layouts.user')
@section('principal')
<div class="container">
  @if(session()->has('notif'))
  <div class="row">
    <div class="alert alert-success">
      <button class="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Notificacion</strong>{{session()->get('notif')}}
    </div>
  </div>
  @endif
</div>
	<div class="row">
      <div class="col-md-12">
          <form class="form-horizontal" action="/postmail" method="post">
          {{ csrf_field() }}
          <fieldset>
            <legend class="text-center">Contactanos</legend>
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Nombre y Apellido</label>
              <div class="col-md-9">
                <input id="nombre" name="nombre" type="text" placeholder="Nombre y Apellido" class="form-control" required>
              </div>
            </div>
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Email</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Email" class="form-control" required>
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="subject">Asunto</label>
              <div class="col-md-9">
                <input id="subject" name="subject" type="text" placeholder="Asunto" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="celular">Celular</label>
              <div class="col-md-9">
                <input id="celular" name="celular" type="number" placeholder="celular" class="form-control" required>
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Mensaje</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="mensaje .." rows="5" required></textarea>
              </div>
            </div>

            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
	</div>
@endsection