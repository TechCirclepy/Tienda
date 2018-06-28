<!-- Modal -->
<div class="modal fade" id="modal-reporte" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Reportar producto</h4>
          <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Por que desea reportar <b>"{{$pro->pro_nom}}"</b>?</label>
            <div class="checkbox">
              <label><input type="radio" name="radio" value=""> El producto no existe</label>
            </div>
            <div class="checkbox">
              <label><input type="radio" name="radio" value=""> Creo que el producto no deberia estar en FashionCaacupé</label>
            </div>
            <div class="checkbox disabled">
              <label><input type="radio" name="radio" value=""> Es contenido engañoso, ofensivo o inapropiado</label>
            </div>
          </div>
          <div class="form-group">
            <label for="">Otros</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-success pullright">Reportar</button>
          </div>
        </div>
        <div class="modal-footer">
          <p>Todas las denuncias son confidenciales y se estara revisando tu reporte de
          <b>"{{$pro->pro_nom}}"</b> en la brevedad posible
          </p>
        </div>
      </div>
    </div>
  </div>
<script>
    // modal para reportar producto
    $(document).on('click', '.report-modal', function() {
      $('.modal-title').text('Reportar producto');
      $('#pro-nombre').val($(this).data('pro-name'));
    });
</script>