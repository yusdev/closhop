@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <a href= "{{ route('products.create') }}" onclick="check()">
          <div class="clo-container" style="background-color:#000;margin-bottom:30px;text-align:center">
            <img src="https://www.dmanetwork.com/share/dma/gfx/icon-add-grey.png" width="30px" style="padding:10px 0">
            <p style="font-size:30px;display:inline-block"></p>
          </div>
        </a>

        <ul class="product-list">
          <?php foreach ($products as $product): ?>
            <div class="product-container clo-container" >
                  <li><img src="{{ asset('storage/' . $product->mainimage) }}" width="100px"></li>
                  <li style="margin:30px"><a href="{{route('products.show', ['id'=>$product->id])}}">{{ $product->name }}</a> <p> {{ '$ '.$product->originalprice }} </p></li>
                  <li style="margin:30px"><p> Publicada </p></li>
                  <li><a type="submit" class="btn btn-xs btn-primary">Eliminar</a></li>
                  <li><a type="submit" class="btn btn-xs btn-primary">Editar</a></li>
                  <li><a type="submit" class="btn btn-xs btn-primary">Pausar</a></li>
            </div>
          <?php endforeach; ?>
        </ul>

      </div>
    </div>
  </div>





  {{-- {{ $users->links() }} --}}



@endsection
