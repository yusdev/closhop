@extends('layouts.front')

@section('content')

  @foreach($products as $product)
    <div class="">
      <img width="300px" src="{{ asset('storage/' . $product->mainimage) }}">
      <h4>{{$product->name}}</h4>
      <p>$ {{$product->originalprice}}</p>
      <a href="{{route('front.products.show', ['id'=>$product->id])}}" class="btn btn-warning" type="button"style="margin-top:20px"> VER </a>
    </div>
  @endforeach


@endsection
