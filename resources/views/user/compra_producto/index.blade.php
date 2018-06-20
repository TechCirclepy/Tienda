@extends('layouts.user')
@section('principal')
<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                  <small>Para comprar este pruducto contacta a la empresa</small>
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Nombre .." required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Celular</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="number" class="form-control" id="email" placeholder="celular" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Ciudad</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Ciudad ..</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Mensaje</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="mensaje .."></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Realizar pedido</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Informacion</legend>
            <address>
                <strong>Complete correctamente</strong><br>
                los campos solicitados para<br>
                que la empresa pueda<br>
                <abbr title="Phone">
                </abbr>
                 contactarse con usted
            </address>
            <address>
                <strong>Mas info:</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
            </form>
        </div>
    </div>
</div>
@endsection