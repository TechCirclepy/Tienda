{!! Form::open(array('url'=>'tienda/producto','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div class="input-group input-group-sm mb-3"">
  <input type="text" name="searchText" value="{{$searchText}}" class="form-control " placeholder="¿Qué Buscas?">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="sumit">Buscar</button>
  </div>
</div>

{{Form::close()}}




