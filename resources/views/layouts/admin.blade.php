<!DOCTYPE HTML>
<html>
<head>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fashion Cordillera</title>

    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head> 
<body>
	<!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/tienda/producto') }}">Fashion Cordillera</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto align-items-center">
          	<li class="nav-item">
				@if (Auth::user()->admin==1)
					<a href="/tienda/empresa" class="nav-link"><i class="fa fa-home nav_icon"></i> Empresas</a>
				@else
					<a href="/tienda/empresa" class="nav-link"><i class="fa fa-home nav_icon"></i> Mi Empresa</a>
				@endif
			</li>
            <li class="nav-item">
              <a href="/tienda/producto" class="nav-link"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Productos</a>
            </li>
            @if (Auth::user()->admin==1)
            <li class="nav-item dropdown">
            	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            		<i class="fa fa-book nav_icon"></i> Categoria <span class="fa arrow"></span>
          		</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
            		<a class="dropdown-item" href="/tienda/categoria">Categorias</a>
					<a class="dropdown-item" href="/tienda/subcategoria">Subcategorias</a>
					<a class="dropdown-item" href="/tienda/detalle">Subcategorias - detalle</a>
				</div>
            </li>
            <li class="nav-item">
				<a class="nav-link" href="/tienda/mensaje"><i class="fa fa-envelope nav_icon"></i> Mensajes</a>
			</li>
			@endif
            <li class="nav-item">
              <a class="nav-link"href="/tienda/estadisticas" class="chart-nav"><i class="fa fa-bar-chart nav_icon"></i> Estadisticas</a>
            </li>
            <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('imagenes/empresas/'.Auth::user()->foto)}}" class="img-responsive rounded-circle" width="40px" height="40px">
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <p class="dropdown-item">{{ Auth::user()->name }}</p>
                <a class="dropdown-item" href="portfolio-2-col.html"><i class="fa fa-user"></i> Mi Perfil</i></a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Cerrar Sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <!-- Page Content -->
    <div class="container">
    	<br />
        @yield('contenido')
    </div>
    <div class="clearfix"></div>
    <!-- /.container -->

    <!-- Footer -->
    <br>
    <footer class="py-5 bg-dark">
      
        <p class="m-0 text-center text-white">Copyright &copy; Fashion Cordillera 2018</p>
      
    </footer>
    
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Funciones jquey -->
    <script src="{{ asset('js/image.js') }}"></script>
  </body>

</html>
