{!! Form::open(array('url'=>'user/producto/index','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<?php
    use Tienda\Ciudad;
    $ciudads = Ciudad::all();
?>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <select name="searchText2" class="custom-select" id="">
          <option value="" selected>Cordillera</option>
        @foreach($ciudads as $ciu)
          @if ($ciu->ciu_id==$searchText2)
            <option value="{{$ciu->ciu_id}}" selected>{{$ciu->ciu_nom}}</option>
          @else
            <option value="{{$ciu->ciu_id}}">{{$ciu->ciu_nom}}</option>
          @endif
        @endforeach
    </select>
  </div>
  <input type="text" name="searchText" value="{{$searchText}}" class="form-control" placeholder="¿Qué Buscas?">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" id="buscar" type="sumit">Buscar</button>
  </div>
</div>

{{Form::close()}}
