@extends('back.afterlogin')

@section('subcontent')


        <a id="create-product" class="button" href= "{{ route('products.create') }}"> Publicar </a>

        <div class="product-list">
          <?php foreach ($products as $product): ?>
            <ul class="product-container clo-container" >
                <li>
                  <img src="{{ asset('storage/' . $product->mainimage) }}" width="100px">
                </li>

                <li>
                  <a target="_blank" href="{{route('front.products.show', ['id'=>$product->id])}}">{{ $product->name }}</a> <p> {{ '$ '.$product->originalprice }} </p>
                </li>

                <li>
                    @if($product->on)
                      <p>Publicada</p>
                    @else
                      <p>Pausada</p>
                    @endif
                </li>

                <li>
                  <ul>
                    <li>
                      <form class="" action="{{ route('products.edit', $product->id)}}" method="get">
                        {{ csrf_field() }}
                        <button type="submit" class="btn button-edit"><span class="fa fa-pencil"></span></button>
                      </form>
                    </li>

                    <li>
                      @if($product->on)
                        <form class="" action="{{route('products.pause', $product->id)}}" method="post">
                          {{ method_field('PUT') }}
                          {{ csrf_field() }}
                          <button type="submit" class="btn button-pause" onclick="return confirm('Seguro que querés pausar el producto?')"><span class="fa fa-pause" ></span> Pausar</button>
                        </form>
                      @else
                        <form class="" action="{{route('products.active', $product->id)}}" method="post">
                          {{ method_field('PUT') }}
                          {{ csrf_field() }}
                          <button type="submit" class="btn button-active"><span class="fa fa-repeat"></span> Activar</button>
                        </form>
                      @endif
                    </li>

                    <li>
                      <form class="" action="{{ route('products.destroy', $product->id)}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn button-delete" onclick="return confirm('Estás seguro de querer eliminar el producto?')"><span class="fa fa-trash-o"></span></button>
                      </form>
                    </li>
                  </ul>
                </li>

              </ul>
          <?php endforeach; ?>
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
