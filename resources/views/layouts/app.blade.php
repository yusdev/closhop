<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CLOSHOP</title>

    <!-- Styles -->
      <!-- SELECT2 -->
      <link rel="stylesheet" href="/css/select2.min.css">
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

      <!-- HEADER + SIDEBAR START -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0;background-color:#000">
          <div class="navbar-header" style="background-color:#000">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" style="padding:5px"href="{{route('vendor.index')}}"><img src="{{ asset('storage/closhop/closhopLogoBlanco.png')}}" height=40px/></a>
          </div>

          <!-- HEADER START -->

          <ul class="nav navbar-top-links navbar-right" style="background-color:#000;margin-right:25px">
              @guest
                  <li><a href="{{ route('login') }}">Ingresar</a></li>
                  <li><a href="{{ route('register') }}">Registrate</a></li>
              @else
              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i style="padding-right:5px">{{ Auth::user()->name }}</i><i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li><a href="#"><i class="fa fa-user fa-fw"></i> Mi cuenta </a>
                      </li>
                      <li><a href="#"><i class="fa fa-gear fa-fw"></i> Productos</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Salir </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                          </form>
                      </li>

                  </ul>
              </li>
              @endguest
          </ul>
          <!-- HEADER END-->


          <!-- MENU SIDEBAR START -->
          <div class="navbar-default sidebar" role="navigation">
              <div class="sidebar-nav navbar-collapse">
                  <ul class="nav" id="side-menu">
                      <li class="sidebar-search">
                          <div class="input-group custom-search-form">
                              <input type="text" class="form-control" placeholder="Search...">
                              <span class="input-group-btn">
                              <button class="btn btn-default" type="button">
                                  <i class="fa fa-search"></i>
                              </button>
                          </span>
                          </div>
                      </li>

                      <!-- OPTION -->
                      <li>
                          <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                      </li>

                      <li>
                          <a href="{{ route('myaccount') }}"><i class="fa fa-user fa-fw"></i> Mi cuenta </a>
                      </li>

                      <!-- MENU OPTION WITH SUBOPTIONS -->
                      <li>
                          <a href="#"><i class="fa fa-tag fa-fw"></i> Productos <span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a href="{{ route('products.index') }}">Mis productos</a>
                              </li>
                              <li>
                                  <a href="{{route('products.create')}}">Nuevo producto</a>
                              </li>
                          </ul>
                      </li>

                      <!-- OPTION -->
                      <li>
                          <a href="#"><i class="fa fa-dollar fa-fw"></i> Mis ventas</a>
                      </li>

                      <!-- OPTION -->
                      <li>
                          <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Salir</a>
                      </li>


                  </ul>
              </div>
          </div> <!-- SIDEBAR END -->
      </nav> <!-- HEADER + SIDEBAR END -->



      {{-- CONTENT ----------------------------------------------------------- --}}

      <!-- ADMIN PANEL BODY START -->
      <div id="page-wrapper">
          @yield('content')
      </div>

      {{-- FOOTER ----------------------------------------------------------- --}}

      <footer class="footer">
        <div class="footer-content">
              <p> 2017 © CLOSHOP.  Todos los derechos reservados</p>
              <p>by CLO</p>
        </div>
      </footer>

    </div>



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
