<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$pro->pro_id}}">

{!! Form::open(array('url'=>'tienda/mensaje','method'=>'POST','autocomplete'=>'off')) !!}
			{{Form::token()}}
	<div class="modal-dialog">
		<div class="modal-content"> 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Enviar mensaje</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<br /><label for="Nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" placeholder="Nombre del producto" />
				</div>
				<div class="form-group">
					<br /><label for="Nombre">Celular</label>
					<input type="text" name="celular" onkeypress="return permite(event, 'num')" class="form-control" placeholder="Nombre del producto" />
				</div>
				<div class="form-group">
					<br /><label for="Nombre">Ciudad</label>
					<input type="text" name="ciudad" class="form-control" placeholder="Nombre del producto" />
				</div>
				<div class="form-group">
					<br /><label for="Nombre">Mensaje</label>
					<textarea name="mensaje" id="" cols="30" rows="10"></textarea>
				</div>
				<div class="form-group">
					<br /><label for="Nombre">Empresa</label>
					<input type="text" name="users_id" class="form-control" value="{{$pro->empresaid}}" />
				</div>
				<div class="form-group">
					<br /><label for="Nombre">Producto</label>
					<input type="text" name="producto_pro_id" class="form-control" value="{{$pro->pro_id}}" />
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>

	{{Form::Close()}}
	
</div>