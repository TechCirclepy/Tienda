@extends('layouts.user')
@section('principal')
<!-- Container (Productos Sección) -->
@include('user.producto.search')
@include('user.producto.reportemensaje')
@include('user.producto.modal')
<div class="container text">
    <div id="products">
        @foreach($productos as $pro)
            @if($pro->emp_activo==1)
                <div class="products white-panel">
                    <h3>
                        <a href="#" class="open-modal" data-toggle="modal" data-target="#DetalleModal" 
                        data-pro-id="{{$pro->pro_id}}" data-pro-nom="{{$pro->pro_nom}}" data-pro-info="{{$pro->pro_info}}" data-pro-foto="{{asset('imagenes/productos/'.$pro->pro_foto)}}" data-pro-empresa="{{$pro->empresa}}" data-pro-oferta="{{$pro->pro_oferta}}" data-pro-precio="{{$pro->pro_precio}}" 
                        data-pro-active="{{$pro->pro_ofer_active}}">{{$pro->pro_nom}}</a>
                    </h3><hr>
                    <i onclick="changefavorite(this)" id="{{$pro->pro_id}}" class="favorite fa fa-heart-o" style="font-size:30px;"></i>
                    <a href="#">
                        <img class="card-img-top img-rounded open-modal" src="{{asset('imagenes/productos/'.$pro->pro_foto)}}"  height="200px" alt="" data-toggle="modal" data-target="#DetalleModal" 
                        data-pro-id="{{$pro->pro_id}}" data-pro-nom="{{$pro->pro_nom}}" data-pro-info="{{$pro->pro_info}}" data-pro-foto="{{asset('imagenes/productos/'.$pro->pro_foto)}}" data-pro-empresa="{{$pro->empresa}}" data-pro-oferta="{{$pro->pro_oferta}}" data-pro-precio="{{$pro->pro_precio}}" 
                        data-pro-active="{{$pro->pro_ofer_active}}">
                    </a>
                    <div class="products-info panel">
                        <p>{{$pro->pro_info}}</p>
                        <p><b>Tienda:</b> {{$pro->empresa}}
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
    cargafavorite();
</script>
{{$productos->render()}}
@endsection

