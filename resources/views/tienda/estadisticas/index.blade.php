@extends('layouts.admin')
@section('contenido')
	
	<script>
		var productos = 0;
		var megusta = 0;
		var megustatmp = 0;
		var nomegusta = 0;
		var nomegustatmp = 0;
	</script>
	@if (Auth::user()->admin==1)
		@foreach($productos as $producto)
			<script>
				productos = productos + 1;
			</script>
			@if ($producto->pro_megusta==True)
				<script>
					megustatmp = {{$producto->pro_megusta}}
					megusta = megusta + megustatmp;
				</script>
			@endif
			@if ($producto->pro_nomegusta==True)
				<script>
					nomegustatmp = {{$producto->pro_nomegusta}}
					nomegusta = nomegusta + nomegustatmp;
				</script>
			@endif
		@endforeach
	@else
		@foreach($productos as $producto)
			@if ($producto->empresaid==Auth::user()->id)
				<script>
					productos = productos + 1;
				</script>
				@if ($producto->pro_megusta==True)
					<script>
						megustatmp = {{$producto->pro_megusta}}
						megusta = megusta + megustatmp;
					</script>
				@endif
				@if ($producto->pro_nomegusta==True)
					<script>
						nomegustatmp = {{$producto->pro_nomegusta}}
						nomegusta = nomegusta + nomegustatmp;
					</script>
				@endif
			@endif
		@endforeach
	@endif
	<div class="row">
		<div class="alert alert-success col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<strong>Cantidad de Productos:</strong> <script>document.write(productos)</script>
		</div>
		<div class="alert alert-info col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<strong>Cantidad de Me gusta:</strong> <script>document.write(megusta)</script>
		</div>
		<div class="alert alert-danger col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<strong>Cantidad de No me gusta:</strong> <script>document.write(nomegusta)</script>
		</div>
	</div>
    </div>	
@endsection