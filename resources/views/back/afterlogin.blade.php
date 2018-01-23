@extends('layouts.back')

@section('content-after-login')
<div id="wrapper">
  <!-- SIDEBAR -->
  <div class="sidebar">

      <ul>
          <li><a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
          <li><a href="{{ route('myaccount') }}"><i class="fa fa-user fa-fw"></i> Mi cuenta </a></li>
          <li><a href="{{ route('products.index') }}"><i class="fa fa-tag"></i> Productos</a></li>
          <li><a href="#"><i class="fa fa-dollar"></i> Mis ventas</a></li>
          <li><a href="#" style="color:red;"><i class="fa fa-sign-out"></i> Salir</a></li>
      </ul>

  </div>

  <div id="page-wrapper">
    @yield('subcontent')
  </div>
</div>

@endsection
