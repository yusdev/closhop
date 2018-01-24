@extends('back.afterlogin')

@section('subcontent')


<div class="clo-form">
  <form method="POST" enctype="multipart/form-data" action="{{route('products.update', $product->id)}}">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}

    <div class="">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-12">
        <label>Nombre del producto</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="middle">
      <div class="form-group{{ $errors->has('originalprice') ? ' has-error' : '' }} col-md-6">
        <label>Precio original</label>
        <input type="text" class="form-control" name="originalprice" value="{{old('originalprice', $product->originalprice)}}">
        @if ($errors->has('originalprice'))
            <span class="help-block">
                <strong>{{ $errors->first('originalprice') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="middle">
      <div class="form-group{{ $errors->has('saleprice') ? ' has-error' : '' }} col-md-6">
        <label>Precio promocional (Rebaja)</label>
        <input type="text" class="form-control" name="saleprice" value="{{old('saleprice', $product->saleprice)}}">
        @if ($errors->has('saleprice'))
            <span class="help-block">
                <strong>{{ $errors->first('saleprice') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="">
      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} col-md-12">
        <label>Descripción del producto</label>
        <input type="text" name="description" value="{{old('description', $product->description)}}">
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
      </div>
    </div>


      <div class="stocks">

        @foreach ($stocks as $stock)

          <div class="onethird">
            <label>Talle</label>
            @foreach ($sizes as $size)
              @if($size->id == $stock->size_id)
                <p>{{$size->size}}</p>
                @break
              @endif
            @endforeach
          </div>

          <div class="onethird">
            <label>Color</label>
            @foreach ($colors as $color)
              @if($color->id == $stock->color_id)
                <p>{{$color->color}}</p>
                @break
              @endif
            @endforeach
          </div>

          <div class="onethird">
            <label>Stock</label>
            <p style="text-align:center"><input type="checkbox" name="variants[]" value="{{$stock->id}}" <?php if($stock->stock == 1){ echo "checked"; }?>></p>
          </div>

        @endforeach
      </div>

    </div>


    <button type="submit" name="button" class="button">GUARDAR CAMBIOS</button>

  </form>
</div>



@include('modals.success')

@endsection


<?php if(session()->has('saved')){
  $saved = true;
}else{
  $saved = false;
}?>

<script type="text/javascript">
    window.onload = function(){
      var sizes = '<?php echo $sizes; ?>'
      var modal = document.getElementById('myModal');
      var span = document.getElementsByClassName("close")[0];
      var ok = document.querySelector(".ok-btn");

      var saved = '<?php echo $saved; ?>'

      if(saved){
        modal.style.display = "block";
      }

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

      $(document).ready(function () {
          // inicializamos el plugin
          $('#sizes').select2({
              // Activamos la opcion "Tags" del plugin select2
              tags: true,
          });
          $('#colors').select2({
              // Activamos la opcion "Tags" del plugin select2
              tags: true,
          });
      });
    }
</script>
