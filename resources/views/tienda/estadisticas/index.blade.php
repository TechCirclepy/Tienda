@extends('layouts.admin')
@section('contenido')
{{--	
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
--}}
    <h1 class="text-center">Los 5 productos con mas "me gusta"</h1>
    @if (Auth::user()->admin==1)
    <div class="container">
	    <div class="row">
		    @foreach($productsAdminMeGusta as $product)
			    <div class="col-lg-3 col-sm-3 portfolio-item">
			        <div class="card h-100">
			            <a href="#">
			                <img class="card-img-top img-rounded open-modal" src="{{asset('imagenes/productos/'.$product->pro_foto)}}" style="width: 253px; height: 150px;">
			            </a>
			            <div class="card-body">
			                <h4 class="card-title">
			                    {{$product->pro_nom}}
			                </h4>
			                <p class="card-text">Cantidad de Me gusta: {{$product->pro_megusta}}</p>
			            </div>
			        </div>
			    </div>
			@endforeach
	    </div>
    </div>
    @else
    <div class="container">
	    <div class="row">
		    @foreach($products as $product)
			    <div class="col-lg-3 col-sm-3 portfolio-item">
			        <div class="card h-100">
			            <a href="#">
			                <img class="card-img-top img-rounded open-modal" src="{{asset('imagenes/productos/'.$product->pro_foto)}}" style="width: 253px; height: 150px;">
			            </a>
			            <div class="card-body">
			                <h4 class="card-title">
			                    {{$product->pro_nom}}
			                </h4>
			                <p class="card-text">Cantidad de Me gusta: {{$product->pro_megusta}}</p>
			            </div>
			        </div>
			    </div>
			@endforeach
	    </div>
    </div>
    @endif
    <h1 class="text-center">Los 5 productos con mas "no me gusta"</h1>
    @if (Auth::user()->admin==1)
    <div class="container">
	    <div class="row">
		    @foreach($productsAdminNoMeGusta as $product)
			    <div class="col-lg-3 col-sm-3 portfolio-item">
			        <div class="card h-100">
			            <a href="#">
			                <img class="card-img-top img-rounded open-modal" src="{{asset('imagenes/productos/'.$product->pro_foto)}}" style="width: 253px; height: 150px;">
			            </a>
			            <div class="card-body">
			                <h4 class="card-title">
			                    {{$product->pro_nom}}
			                </h4>
			                <p class="card-text">Cantidad de no me gusta: {{$product->pro_nomegusta}}</p>
			            </div>
			        </div>
			    </div>
			@endforeach
	    </div>
    </div>
    @else
    <div class="container">
	    <div class="row">
		    @foreach($productsN as $product)
			    <div class="col-lg-3 col-sm-3 portfolio-item">
			        <div class="card h-100">
			            <a href="#">
			                <img class="card-img-top img-rounded open-modal" src="{{asset('imagenes/productos/'.$product->pro_foto)}}" style="width: 253px; height: 150px;">
			            </a>
			            <div class="card-body">
			                <h4 class="card-title">
			                    {{$product->pro_nom}}
			                </h4>
			                <p class="card-text">Cantidad de no me gusta: {{$product->pro_nomegusta}}</p>
			            </div>
			        </div>
			    </div>
			@endforeach
	    </div>
    </div>
    @endif
@endsection