<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Closhop vendor</title>
    <!-- <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/bootstrap4.css">
    <link rel="stylesheet" href="/css/clostyles-back.css">
    <link rel="stylesheet" href="/css/sb-admin/dist/css/sb-admin-2.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/fonts/fontawesome-webfont.eot">
    <link rel="stylesheet" href="/fonts/fontawesome-webfont.svg">
    <link rel="stylesheet" href="/fonts/fontawesome-webfont.ttf">
    <link rel="stylesheet" href="/fonts/fontawesome-webfont.woff">
    <link rel="stylesheet" href="/fonts/fontawesome-webfont.woff2">
    <link rel="stylesheet" href="/fonts/FontAwesome.otf">
    <!-- SB Admin 2 - Bootstrap Admin Theme -->
      <!-- Bootstrap Core CSS -->
      <link href="/css/sb-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- MetisMenu CSS -->
      <link href="/css/sb-admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="/css/sb-admin/dist/css/sb-admin-2.css" rel="stylesheet">
      <!-- Morris Charts CSS -->
      <link href="/css/sb-admin/vendor/morrisjs/morris.css" rel="stylesheet">
      <!-- Custom Fonts -->
      <link href="/css/sb-admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="wrapper">

            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0;background-color:#000">

    <div style="background-color:#000" class="">

    <header  class="d-flex justify-content-between">
      <a id="logo-back" style="padding:5px" href="{{route('vendor.index')}}">
        <img src="{{ asset('storage/closhop/closhopLogoBlanco.png')}}" height=40px/>
      </a>
      <div class="align-self-center">
        @guest
          <ul>
            <li><a href="{{ route('login') }}">Ingresar</a></li>
            <li><a href="{{ route('register') }}">Registrate</a></li>
          </ul>
        @else
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->shop_name }}
          </a>

          <ul class="dropdown-menu">
              <li> <a href="{{ route('myaccount') }}"> Mi cuenta </a> </li>
              <li> <a href="{{ route('products.index') }}"> Productos </a> </li>
              <li> <a href="#"> Mis ventas </a> </li>
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Salir
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
          </ul>
        </div>
        @endguest
      </div>
    </header>

</div>


<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li><a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
            <li><a href="{{ route('myaccount') }}"><i class="fa fa-user fa-fw"></i> Mi cuenta </a></li>
            <li><a href="#"><i class="fa fa-tag fa-fw"></i> Productos</a><li>
            <li><a href="#"><i class="fa fa-dollar fa-fw"></i> Mis ventas</a></li>
            <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Salir</a></li>

        </ul>
    </div>
</div>

</nav>





  <div id="page-wrapper">
    @yield('content')
  </div>


    <footer>
      <p>CLOSHOP 2018 - Todos los derechos reservados</p>
    </footer>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- SB Admin 2 - Bootstrap Admin Theme -->
      <!-- jQuery -->
      <script src="/sb-admin/vendor/jquery/jquery.min.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="/sb-admin/vendor/bootstrap/js/bootstrap.min.js"></script>

      <!-- Metis Menu Plugin JavaScript -->
      <script src="/sb-admin/vendor/metisMenu/metisMenu.min.js"></script>

      <!-- Morris Charts JavaScript -->
      <script src="/sb-admin/vendor/raphael/raphael.min.js"></script>
      <script src="/sb-admin/vendor/morrisjs/morris.min.js"></script>
      <script src="/sb-admin/data/morris-data.js"></script>

      <!-- Custom Theme JavaScript -->
      <script src="/sb-admin/dist/js/sb-admin-2.js"></script>

    <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}"></script>
    <!-- SELECT2 -->
      <script src="/js/select2.min.js"></script>

    @yield('scripts')

  </body>
</html>
