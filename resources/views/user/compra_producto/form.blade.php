{!! Form::open(['url' => $url, 'method' => $method]) !!} <!-- $url y $method son variables y esperan un post o url diversas -->
		<div class="form-group">
		{{ Form::text('nombre',$compra->nombre,['class' => 'form-control', 'placeholder'=>'Nombre...']) }}
		</div>
		<div class="form-group">
		{{ Form::number('celular',$compra->celular,['class' => 'form-control', 'placeholder'=>'Celular...']) }}
		</div>
		<div class="form-group">
			{!! Form::select("ciudad", array(
                    'Caacupe' => 'Caacupe',
                    'Piribebuy' => 'Piribebuy',
                  ), null,["class"=>"form-control".($errors->has('ciudad')?" is-invalid":""),"required",'placeholder'=>'Eligir ciudad ...']) !!}
		</div>
		<div class="form-group">
		{{ Form::text('mensaje',$compra->mensaje,['class' => 'form-control', 'placeholder'=>'Mensaje...']) }}
		</div>
		<div class="form-group">
		{{ Form::number('producto_pro_id',$compra->producto_pro_id,['class' => 'form-control', 'placeholder'=>'Id...', 'style' => 'display: none']) }}
		</div>
		<div class="form-group">
		{{ Form::number('users_id',$compra->users_id,['id' => 'users_id','class' => 'form-control', 'placeholder'=>'Id...', 'style' => 'display: none']) }}
		</div>
		<div class="form-group text-right">
			<input type="submit" value="Realizar pedido" class="btn btn-success" >

			<a class="pull-left" href="{{ url('/') }}"><--Atras</a>
		</div>
{!! Form::close() !!}