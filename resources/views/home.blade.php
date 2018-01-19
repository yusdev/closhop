@extends('layouts.front')

@section('content')

<div class="container" style="padding:0;margin-top:20px">
  <img style="width:100%;"src="{{ asset('storage/closhop/banner.jpg') }}" alt="">
</div>

<div class="container" style="margin-top:30px;">
  @foreach($products as $product)
    <div class="col-md-3">
      <a href="{{route('front.products.show', ['id'=>$product->id])}}"><img width="100%" src="{{ asset('storage/' . $product->mainimage) }}"></a>
      <a href="#"><h4>{{$product->name}}</h4></a>
      <p>$ {{$product->originalprice}}</p>
    </div>
  @endforeach
</div>



@endsection
