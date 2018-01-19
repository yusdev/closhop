@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <a id="create-product" href= "{{ route('products.create') }}">
          <div class="clo-container" style="background-color:#000;margin-bottom:30px;text-align:center">
            <img src="https://www.dmanetwork.com/share/dma/gfx/icon-add-grey.png" width="30px" style="padding:10px 0">
            <p style="font-size:30px;display:inline-block"></p>
          </div>
        </a>

        <ul class="product-list">
          <?php foreach ($products as $product): ?>
            <div class="product-container clo-container" >
                  <li><img src="{{ asset('storage/' . $product->mainimage) }}" width="100px"></li>
                  <li style="margin:30px"><a target="_blank" href="{{route('front.products.show', ['id'=>$product->id])}}">{{ $product->name }}</a> <p> {{ '$ '.$product->originalprice }} </p></li>
                  <li style="margin:30px">
                    @if($product->on)
                      <p>Publicada</p>
                    @else
                      <p>Pausada</p>
                    @endif
                  </li>
                  <li><a href="{{route('products.edit', $product->id)}}" type="submit" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-pencil"></span></a></li>
                  <li>
                    @if($product->on)
                      <form class="" action="{{route('products.pause', $product->id)}}" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pause"></span>Pausar</button>
                      </form>
                    @else
                      <form class="" action="{{route('products.active', $product->id)}}" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-repeat"></span> Activar</button>
                      </form>
                    @endif
                  </li>
                  <li>
                    <form class="" action="{{ route('products.destroy', $product->id)}}" method="post">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Estás seguro de querer eliminar el producto?')"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                  </li>
            </div>
          <?php endforeach; ?>
        </ul>

      </div>
    </div>
  </div>

  @include('modals.complete')

  <script type="text/javascript">
    window.onload = function(){

      var perfilcomplete = <?php echo $user->complete ?>;
      var button = document.getElementById('create-product');
      var modal = document.getElementById('myModal');
      var span = document.getElementsByClassName("close")[0];
      var ok = document.querySelector(".ok-btn");
      button.addEventListener('click', function(event){
        event.preventDefault();
        if(perfilcomplete){
          window.location = this.href;
        }else{
          modal.style.display = "block";
        }
      });
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
          modal.style.display = "none";
      }
      ok.onclick = function() {
          modal.style.display = "none";
      }
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }

    }

  </script>




  {{-- {{ $users->links() }} --}}



@endsection
