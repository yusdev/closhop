@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <div class="col-md-1" style="padding:0">
      <img src="{{ asset('storage/' . $product->mainimage) }}" class="col-md-12" style="padding:0">
      <img src="{{ asset('storage/' . $product->mainimage) }}" class="col-md-12" style="padding:0">
      <img src="{{ asset('storage/' . $product->mainimage) }}" class="col-md-12" style="padding:0">
    </div>


    <img src="{{ asset('storage/' . $product->mainimage) }}" class="col-md-4">


    <div class="col-md-6">
      <h2>{{ $product->name }}</h2>
      <h6>by {{$product->user->shop_name}}</h6>
      <p><span class="glyphicon glyphicon-map-marker"></span> {{$product->user->province}}, {{$product->user->location}}</p>
      <p>{{'$ '.$product->originalprice}}</p>

      <div class="clo-container" style="padding:20px">
        <p>{{$product->description}}</p>

        <select class="col-md-6" name="">
          <?php foreach ($sizes as $size): ?>
            <option value="{{$size->id}}">{{$size->size}}</option>
          <?php endforeach; ?>
        </select>

        <select class="col-md-6" name="">
          <?php foreach ($colors as $color): ?>
            <option value="{{$color->id}}">{{$color->color}}</option>
          <?php endforeach; ?>
        </select>

      </div>

      <a class="col-md-12 btn btn-warning" style="margin-top:20px" href="#">COMPRAR</a>
      <small style="display:block" class="form-text text-muted">*Al presionar comprar aceptas los términos y condiciones de Closhop</small>


      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">Diseñador/a</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Política de cambios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Métodos de envío</a>
        </li>
      </ul>

    </div>




@endsection
