<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fashion Cordillera</title>
    <?php
        use Tienda\Mensaje;
        $mensajes = Mensaje::all();
    ?>
    <script>
        var cantidad = 0;
    </script>
    @foreach($mensajes as $men) 
        @if ($men->leido==0)
            <script>
                cantidad += 1;
            </script>
        @endif
    @endforeach
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alertify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <script src="{{ asset('js/favorite.js') }}"></script>
    <script src="{{ asset('js/likes.js') }}"></script>
    <script src="{{ asset('js/alertify.min.js') }}"></script>
    <script type="text/javascript">
        //override defaults
        alertify.defaults.transition = "slide";
        alertify.defaults.theme.ok = "btn btn-primary";
        alertify.defaults.theme.cancel = "btn btn-danger";
        alertify.defaults.theme.input = "form-control";
    </script>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('images/LOGO.png')}}" height="55px"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/user/producto/index">Prendas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/user/empresa/index">Empresas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/user/producto/favoritos">Favoritos</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ url('mail') }}">Contacto</a>
            </li>
            @guest

            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
            </li>
            @else
            <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="{{ url('/tienda/producto') }}">Panel de Control</a>
                <a class="dropdown-item" href="{{url('/tienda/producto/create')}}">Agregar Articulo</a>
                <a class="dropdown-item" href="{{url('/tienda/mensaje')}}">Mensajes (<script>document.write(cantidad)</script>)</a>
                <a class="dropdown-item" href="{{url('/tienda/estadisticas')}}">Estadisticas</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Cerrar Sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </li>
            
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <!-- Page Content -->
    <div class="container">
        @yield('principal')
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
    <script src="{{ asset('js/pinterest_grid.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>

</html>
