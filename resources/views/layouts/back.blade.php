<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>Closhop vendor</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/clostyles.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/fonts/fontawesome-webfont.svg">

  </head>

  <body>
    <div class="header">
      <div class="header-container">
        <header>
          <a class="logo" href="{{route('vendor.index')}}">
            <img src="{{ asset('storage/closhop/closhopLogoBlanco.png')}}" alt="logo"/>
          </a>

            @guest
            <div class="vendor">
              <ul class="login-register">
                <li><a href="{{ route('login') }}">INGRESAR</a></li>
                <li><a href="{{ route('register') }}">REGISTRATE</a></li>
              </ul>
            </div>
            @else

            <div class="share-wrap">
              <div class="main-bar"> {{ Auth::user()->shop_name }} <span class="fa fa-sort-desc"></span> </div>
              <ul>
                <li> <a href="{{ route('myaccount') }}"> <span class="fa fa-user"></span> Mi cuenta</a> </li>
                <li> <a href="{{ route('products.index') }}"> <span class="fa fa-tag"></span> Productos </a> </li>
                <li> <a href="{{ route('products.index') }}"> <span class="fa fa-dollar"></span> Ventas </a> </li>
                <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                               <span class="fa fa-sign-out"></span> Salir
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </div>




            <!-- <div class="dropdown" >
              <a class="user"> {{ Auth::user()->shop_name }} <span class="fa fa-sort-desc"></span> </a>

              <ul class="dropdown-content">
                  <li> <a href="{{ route('myaccount') }}"> <span class="fa fa-user"> Mi cuenta<span> </a> </li> <br>
                  <li> <a href="{{ route('products.index') }}"> Productos </a> </li> <br>
                  <li> <a href="#"> Mis ventas </a> </li> <br>
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                   <span class="fa fa-sign-out">
                          Salir</span>
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
            </div> -->
            @endguest
        </header>
      </div>
    </div>

    @yield('content-before-login')
    @yield('content-after-login')

    <footer>
      <p>CLOSHOP 2018 - Todos los derechos reservados</p>
    </footer>



    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    @yield('scripts')

    <script type="text/javascript">


        // var dropdown = document.querySelector('.user');
        // var dropdownContent = document.querySelector('.dropdown-content');
        // dropdown.addEventListener('click', function(){
        //   if(dropdownContent.style.display == 'none'){
        //     dropdownContent.style.display = 'block';
        //   }else{
        //     dropdownContent.style.display = 'none';
        //   }
        // });

        window.onload = function(){

          $(document).ready(function(e){
             $('.main-bar').on('click',function(){
                $('.share-wrap>ul').slideToggle(280);
             });
          });
        }




    </script>

  </body>
</html>
