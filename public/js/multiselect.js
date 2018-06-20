$(function() {
	$('#select-categoria').on('change', onSelectCategoriaCambio);
	$('#select-subcategoria').on('change', onSelectSubCategoriaCambio);
});

function onSelectCategoriaCambio(){
	var categoria_cat_id = $(this).val();

	if (! categoria_cat_id)
		$('#select-subcategoria').html('<option value="">Seleccione Subcategoria</option>');

	//Ajax
	$.get('/api/producto/'+categoria_cat_id+'/subcategorias', function (data) {
		var html_select = '<option value="">Seleccione Subcategoria</option>';
		for (var i = 0; i<data.length; i++){
			html_select += '<option value='+data[i].sub_id+'>'+data[i].sub_nom+'</option>';
		}
		$('#select-subcategoria').html(html_select);
	});
}

function onSelectSubCategoriaCambio(){
	var subcategoria_sub_id = $(this).val();

	if (! subcategoria_sub_id)
		$('#select-subcategoria-detalle').html('<option value="">Seleccione Subcategoria - detalle</option>');

	//Ajax
	$.get('/api/producto/'+subcategoria_sub_id+'/subcategoriasdet', function (data) {
		var html_selecto = '<option value="">Seleccione Subcategoria - detalle</option>';
		for (var i = 0; i<data.length; i++){
			html_selecto += '<option value='+data[i].det_id+'>'+data[i].det_nom+'</option>';
		}
		$('#select-subcategoria-detalle').html(html_selecto);
	});
}