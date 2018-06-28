@extends('layouts.user')
@section('principal')
<!-- Container (Productos Sección) -->
@include('user.producto.search')
<div class="row">
    @foreach($productos as $pro)
    @if($pro->emp_activo==1)
    <div class="col-lg-3 col-sm-3 portfolio-item" id="{{$pro->pro_id}}">
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
</div>
<script>
function changefavorite(e) {
    var catureclass = $(e).attr('class');
    var id_prod = $(e).attr('id');
    if (catureclass == "favorite fa fa-heart-o") {
        $(e).addClass("fa-heart").removeClass("fa-heart-o");
    }else{
        $(e).addClass("fa-heart-o").removeClass("fa-heart");
    }
    console.log(id_prod);
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

