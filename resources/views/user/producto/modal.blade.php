<div class="modal fade" id="DetalleModal" role="dialog" id="{{$pro->pro_id}}">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detalle del producto</h4>
          <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label for="">Producto: </label>
                <input type="text" id="pro-nom" class="form-control" disabled>
              </div>
              <div class="col-sm-6" style="margin: -2.5% 0;">
                <p class="text-center">
                  <img id="pro-foto" class="rounded-circle" src="" alt="" style="width: 90px; height: 90px;">
                </p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Descripcion: </label>
            <textarea type="textarea" id="pro-info" class="form-control Fields" disabled></textarea>
          </div>
          <div class="form-group">
          @if($pro->empresa == "")
            <!-- nada que mostrar -->
          @else
            <label for="">Tienda: </label>
            <input type="text" id="pro-empresa" class="form-control" disabled>
          @endif
          </div>
          <div class="form-group">
            <label for="">Precio de oferta: </label>
            <input type="text" id="pro-oferta" class="form-control" disabled>
          </div>
          <div class="form-group">
            <label for="">Precio normal: </label>
            <input type="text" id="pro-precio" class="form-control" disabled>
          </div>
        </div>
        <!--
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
        -->
      </div>  
    </div>
  </div>
<script>
// Muestra el detalle del producto
  $(document).on('click', '.open-modal', function() {
    $('.modal-title').text('Detalle del producto');
    $('#pro-nom').val($(this).data('pro-nom'));
    $('#pro-info').val($(this).data('pro-info'));
    $('#pro-empresa').val($(this).data('pro-empresa'));
    $('#pro-foto').attr('src', $(this).data('pro-foto'));
    if ("{{$pro->pro_ofer_active}}" == 1) {
      $('#pro-oferta').val($(this).data('pro-oferta'));
      $('#pro-precio').val($(this).data('pro-precio'));

    } else {
      $('#pro-precio').val($(this).data('pro-precio'));
      $('#pro-oferta').val($(this).data('pro-oferta'));
    }
  });
</script>