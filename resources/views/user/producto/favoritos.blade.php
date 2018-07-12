@extends('layouts.user')
@section('principal')
<!-- Container (Productos Sección) -->
@include('user.producto.reportemensaje')
{{--
@include('user.producto.modal')
<center><h1 style="visibility: hidden; display:none;" class="msj_fav">No cuenta con Favoritos</h1></center>
<div class="container text">
    <div id="products">
        @foreach($productos as $pro)
            @if($pro->emp_activo==1)
                <div class="col-lg-3 col-sm-3 portfolio-item" style="visibility: hidden; display:none;" id="{{$pro->pro_id}}">
                    <div class="products white-panel">
                        <h3>
                            <a href="#" class="open-modal" data-toggle="modal" data-target="#DetalleModal" 
                            data-pro-id="{{$pro->pro_id}}" data-pro-nom="{{$pro->pro_nom}}" data-pro-info="{{$pro->pro_info}}" data-pro-foto="{{asset('imagenes/productos/'.$pro->pro_foto)}}" data-pro-empresa="{{$pro->empresa}}" data-pro-oferta="{{$pro->pro_oferta}}" data-pro-precio="{{$pro->pro_precio}}" 
                            data-pro-active="{{$pro->pro_ofer_active}}">{{$pro->pro_nom}}</a>
                        </h3><hr>
                        <i onclick="changefavorite(this)" id="{{$pro->pro_id}}" class="favorite fa fa-heart" style="font-size:30px;"></i>
                        <a href="#">
                            <img class="card-img-top img-rounded open-modal" src="{{asset('imagenes/productos/'.$pro->pro_foto)}}"  height="200px" alt="" data-toggle="modal" data-target="#DetalleModal" 
                            data-pro-id="{{$pro->pro_id}}" data-pro-nom="{{$pro->pro_nom}}" data-pro-info="{{$pro->pro_info}}" data-pro-foto="{{asset('imagenes/productos/'.$pro->pro_foto)}}" data-pro-empresa="{{$pro->empresa}}" data-pro-oferta="{{$pro->pro_oferta}}" data-pro-precio="{{$pro->pro_precio}}" 
                            data-pro-active="{{$pro->pro_ofer_active}}">
                        </a>
                        <div class="products-info panel">
                            <p>{{$pro->pro_info}}</p><br>
                            <p><b>Tienda:</b> {{$pro->empresa}}<br>
                                @if ($pro->pro_ofer_active==1)
                                <b>Precio: </b><strike style="color: red;">{{$pro->pro_precio}}</strike> | <b>Oferta: </b>{{$pro->pro_oferta}}
                                @else
                                <b>Precio: </b>{{$pro->pro_precio}}
                                @endif
                            </p>
                            <h3><p>
                                <a class="report-modal" href="" title="" data-toggle="modal" data-target="#modal-reporte" data-proid="{{$pro->pro_id}}" data-proname="{{$pro->pro_nom}}" data-proempresa="{{$pro->empresa}}"><i class="fa fa-exclamation-triangle"></i>Reportar</a>
                            </p></h3>
                            <p>
                                <span><a href="{{ url('/comprar',array($pro->pro_id)) }}" type="button" class="btn btn-block btn-success"><i class="fa fa-credit-card" aria-hidden="true"></i> Comprar</a></span>
                            </p>
                        </div>
                    </div>
            @endif
        @endforeach
    </div>
</div>
--}}
<div class="row">
    @foreach($productos as $pro)
    @if($pro->emp_activo==1)
    <div class="col-lg-3 col-sm-3 portfolio-item" style="visibility: hidden; display:none;" id="{{$pro->pro_id}}">
        <div class="card h-100">
            <i onclick="changefavorite(this)" id="{{$pro->pro_id}}" class="favorite fa fa-heart" style="font-size:30px;"></i>
            <a href="#">
                <img class="card-img-top img-rounded open-modal" src="{{asset('imagenes/productos/'.$pro->pro_foto)}}"  height="200px" alt="" data-toggle="modal" data-target="#DetalleModal" 
                data-pro-id="{{$pro->pro_id}}" data-pro-nom="{{$pro->pro_nom}}" data-pro-info="{{$pro->pro_info}}" data-pro-foto="{{asset('imagenes/productos/'.$pro->pro_foto)}}" data-pro-empresa="{{$pro->empresa}}" data-pro-oferta="{{$pro->pro_oferta}}" data-pro-precio="{{$pro->pro_precio}}" 
                data-pro-active="{{$pro->pro_ofer_active}}">
            </a>
            <div class="card-body">
                <h4 class="card-title">
                    <a href="#" class="open-modal" data-toggle="modal" data-target="#DetalleModal" 
                data-pro-id="{{$pro->pro_id}}" data-pro-nom="{{$pro->pro_nom}}" data-pro-info="{{$pro->pro_info}}" data-pro-foto="{{asset('imagenes/productos/'.$pro->pro_foto)}}" data-pro-empresa="{{$pro->empresa}}" data-pro-oferta="{{$pro->pro_oferta}}" data-pro-precio="{{$pro->pro_precio}}" 
                data-pro-active="{{$pro->pro_ofer_active}}">{{$pro->pro_nom}}</a>
                </h4>
                <p class="card-text">{{$pro->pro_info}}</p>
                <p><b>Tienda:</b> {{$pro->empresa}}<br>
                    @if ($pro->pro_ofer_active==1)
                    <b>Precio: </b><strike style="color: red;">{{$pro->pro_precio}}</strike> | <b>Oferta: </b>{{$pro->pro_oferta}}
                    @else
                    <b>Precio: </b>{{$pro->pro_precio}}
                    @endif
                </p>
                <span><a class="report-modal" href="" title="" data-toggle="modal" data-target="#modal-reporte" data-proid="{{$pro->pro_id}}" data-proname="{{$pro->pro_nom}}" data-proempresa="{{$pro->empresa}}"><i class="fa fa-exclamation-triangle"></i>Reportar</a> </span>
            </div>
            <div class="btn-group" style="margin: auto;">
                <span><a href="{{ url('/comprar',array($pro->pro_id)) }}" type="button" class="btn btn-block btn-success"><i class="fa fa-credit-card" aria-hidden="true"></i> Comprar</a></span>
                <span><button type="button" onclick="megusta(this)" data="{{$pro->pro_megusta}}" id="{{$pro->pro_id}}" class="btn btn-block btn-info"><i class="fa fa-thumbs-up" aria-hidden="true"></i> ({{$pro->pro_megusta}}) </button></span>
                <span><button type="button" onclick="nomegusta(this)" data="{{$pro->pro_nomegusta}}" id="{{$pro->pro_id}}" class="btn btn-block btn-danger"><i class="fa fa-thumbs-down" aria-hidden="true"></i> ({{$pro->pro_nomegusta}})</button></span>
            </div>
        </div>
    </div>
    @include('user.producto.modal')
    @endif
    @endforeach
    <script>
        //recuperar favoritos y cambiar coloración del corazón
        var id_values = document.cookie.replace(/(?:(?:^|.*;\s*)id\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var captura_id = id_values.split(",");

        for (var i in captura_id) {
            if(captura_id[i] != "" && captura_id[i] != 'undefined'){
                var e = "#"+captura_id[i];
                $(e).css('visibility', 'visible');
                $(e).css('display', 'inline'); 
            }else if (captura_id[i] == "" || captura_id[i] == 'undefined'){
                $('.msj_fav').css('visibility', 'visible');
                $('.msj_fav').css('display', 'inline');
            }
        }
    </script>
</div>
@include('user.producto.modal-reporte')
{{$productos->render()}}
@endsection

