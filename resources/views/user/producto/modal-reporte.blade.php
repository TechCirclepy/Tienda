<!-- Modal -->
<div class="modal fade" id="modal-reporte" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
  <form class="form" action="{{ url('postdenuncia')}}" method="post">
  <fieldset>
  {{ csrf_field() }}
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Reportar producto</h4>
          <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" id="producto" name="producto" class="form-control" style="display: none;">
            <input type="text" id="empresa" name="empresa" class="form-control" style="display: none;">
          </div>
          <div class="form-group text-inline">
            <label for="" type="text">Por que desea reportar</label>
            <b><label for="" class="pro" type="text"></label></b> ?
            <input type="text" class="form-control" name="motivoreporte" id="motivoreporte" required style="display: none;">
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
        <div class="modal-footer" text-inline>
          <p type="text">Todas las denuncias son confidenciales y se estara revisando tu reporte de
          <b type="text" class="pro"></b> en la brevedad posible
          </p>
        </div>
      </div>
    </fieldset>
    </form>
    </div>
</div>
<script>
    // modal para reportar producto
    $(document).on('click', '.report-modal', function() {
      $('.modal-title').text('Reportar producto');
      $('#producto').val($(this).data('proname'));
      $('.pro').text($(this).data('proname'));
      $('#empresa').val($(this).data('proempresa'));
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