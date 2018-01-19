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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/clostyles-front.css">

    <!-- SELECT2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>

<body>

  <div id="app">

    <div class=""> <!-- Contenedor del header-->
      <div class="container" style="border-bottom: 2px black solid;">

        <div class="d-flex justify-content-between">
          <div class=""> <!-- Contenedor del Logo-->
            <a href="{{ url('/') }}"><img src="{{ asset('storage/closhop/closhopLogo.png') }}" alt="closhop" height="50px"></a>
          </div>

          <div class="align-self-end">
            <div class="searchbox">
              <form class="" action="{{url('/')}}" method="get">
                <div class="form-group searchbox-submit d-flex justify-content-between">
                  <input type="text" name="" value="" placeholder="BUSCAR">
                  <button type="submit" class="btn btn-link"><span class="glyphicon glyphicon-search"></span></button>
                </div>
              </form>
            </div>
          </div>

          <div class="align-self-center">
            <nav>
              <ul class="red-social">
                <li><a href="https://www.facebook.com/closhop.blog" target="_blank"><img src="{{ asset('storage/closhop/facebook.png') }}" alt="" height="30px"></a></li>
                <li><a href="https://www.instagram.com/closhop.ok/" target="_blank"><img src="{{ asset('storage/closhop/instagram.png') }}" alt="" height="30px"></a></li>
                <li><a href="#" target="_blank"><img src="{{ asset('storage/closhop/twitter.png') }}" alt="" height="30px"></a></li>
                <li><a href="https://closhop.blog/" target="_blank"><img src="{{ asset('storage/closhop/blog-icon.png') }}" alt="" height="30px"></a></li>
                <li><a href="#" target="_blank"><img src="{{ asset('storage/closhop/contact-icon.png') }}" alt="" height="31px"></a></li>
            </nav>
          </div>
        </div>

      </div>

    </div>


      @yield('content')


      <div class=""> <!-- Contenedor del footer -->

        <div class="container" style="border-top: 2px solid black;">
          <p>Preguntas Frecuentes</p>
          <p>Términos y Condiciones</p>
          <p>Políticas de privacidad</p>
          <p>2018 CLOSHOP - Todos los derechos reservados ©</p>
        </div>

      </div>

  </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- SELECT2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="/js/select2.min.js"></script>

    @yield('scripts')

</body>
</html>
