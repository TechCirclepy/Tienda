@extends('layouts.user')
@section('principal')

<!-- Container (Productos Sección) -->
@include('user.producto.search')
@include('user.producto.reportemensaje')
<div class="row">
    @foreach($productos as $pro)
    @if($pro->emp_activo==1)
    <div class="col-lg-3 col-sm-3 portfolio-item">
        <div class="card h-100">
            <i onclick="changefavorite(this)" id="{{$pro->pro_id}}" class="favorite fa fa-heart-o" style="font-size:30px;"></i>
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
                <span><button type="button" onclick="megusta(this)" id="{{$pro->pro_id}}" class="btn btn-block btn-info"><i class="fa fa-thumbs-up" aria-hidden="true"></i> ({{$pro->pro_megusta}}) </button></span>
                <span><button type="button" onclick="nomegusta(this)" id="{{$pro->pro_id}}" class="btn btn-block btn-danger"><i class="fa fa-thumbs-down" aria-hidden="true"></i> ({{$pro->pro_nomegusta}})</button></span>
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
            var e = "#"+captura_id[i];
            $(e).addClass("fa-heart").removeClass("fa-heart-o");
        }
    </script>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-3 portafolio-item">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.0&appId=166387793862237&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <div class="fb-share-button" data-href="http://moda.techcirclepy.com/user/producto/index" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmoda.techcirclepy.com%2Fuser%2Fproducto%2Findex&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
    </div>
</div>
@include('user.producto.modal-reporte')
<script>
//script de favoritos
function changefavorite(e) {
    var catureclass = $(e).attr('class'); // catura de la clase para comparar
    var id_prod = $(e).attr('id'); // extracción del id
    //datos para guardar cookies
    var d = new Date();
    d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    //capturas de ids contenidos en la cookies con la clave id
    var id_values = document.cookie.replace(/(?:(?:^|.*;\s*)id\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    
    //guardar cookies y agregar efecto corazón
    if (catureclass == "favorite fa fa-heart-o") {
        $(e).addClass("fa-heart").removeClass("fa-heart-o");
        var guardar_id = id_values+","+id_prod;
        document.cookie = "id=" + guardar_id + ";" + expires + ";path=/";
    }else{//eliminar id de cookies y agregar efecto corazón
        $(e).addClass("fa-heart-o").removeClass("fa-heart");
        var captura_id = id_values.split(",");
        var seleccion;
        for (var i in captura_id) {
            if(captura_id[i] != id_prod){
                seleccion = seleccion+","+captura_id[i];
            }
        }
        document.cookie = "id=" + seleccion + ";" + expires + ";path=/";
    }
}
function megusta(e) {
    var id_prod = $(e).attr('id');
    alert(id_prod);
}
function nomegusta(e) {
    var id_prod = $(e).attr('id');
    alert(id_prod);
}
</script>
{{$productos->render()}}
@endsection

