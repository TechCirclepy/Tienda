<!-- Modal -->
<div class="modal fade" id="modal-reporte" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
  <form class="form" action="/postdenuncia" method="post">
  {{ csrf_field() }}
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Reportar producto</h4>
          <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" id="producto" name="producto" class="form-control" disabled style="display: none;">
            <input type="text" id="empresa" name="empresa" class="form-control" disabled style="display: none;">
          </div>
          <div class="form-group">
            <label for="">Por que desea reportar <b>"{{$pro->pro_nom}}"</b>?</label>
            <input type="text" class="form-control" name="motivoreporte" id="motivoreporte" disabled required>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label><input type="radio" name="radio" value="" class="radio radio1" required> El producto no existe</label>
            </div>
            <div class="checkbox">
              <label><input type="radio" name="radio" value="" class="radio radio2" required> Creo que el producto no deberia estar en FashionCaacupé</label>
            </div>
            <div class="checkbox disabled">
              <label><input type="radio" name="radio" value="" class="radio radio3" required> Es contenido engañoso, ofensivo o inapropiado</label>
            </div>
            <div class="checkbox disabled">
              <label><input type="radio" name="radio" value="" class="radio4" id="radio-otros" required>Otros</label>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="otros" id="otros" class="form-control">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success pullright">Reportar</button>
          </div>
        </div>
        <div class="modal-footer">
          <p>Todas las denuncias son confidenciales y se estara revisando tu reporte de
          <b>"{{$pro->pro_nom}}"</b> en la brevedad posible
          </p>
        </div>
      </div>
    </form>
    </div>
  </div>
  @if(session()->has('notify'))
      <div class="row">
        <div class="alert alert-success">
          <button class="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Notificacion</strong>{{session()->get('notify')}}
        </div>
      </div>
    @endif
<script>
    // modal para reportar producto
    $(document).on('click', '.report-modal', function() {
      $('.modal-title').text('Reportar producto');
      $('#producto').val($(this).data('pro-name'));
      $('#empresa').val($(this).data('pro-empresa'));
      $('#otros').hide();
    });
    
    $(document).ready(function() {
      $('.radio').click(function() {
        $('#otros').hide();
      });
      $('#radio-otros').click(function() {
        $('#otros').show();
      });
      $('.radio1').click(function() {
        $('#motivoreporte').val("El producto no existe");
      });
      $('.radio2').click(function() {
        $('#motivoreporte').val('Creo que el producto no deberia estar en FashionCaacupé');
      });
      $('.radio3').click(function() {
        $('#motivoreporte').val('Es contenido engañoso, ofensivo o inapropiado');
      });
      $('.radio4').click(function() {
        $('#motivoreporte').val('otros');
      });

    });
</script>