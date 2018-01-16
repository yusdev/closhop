@extends('layouts.app')

@section('content')
<div class="container">
  <form method="POST" enctype="multipart/form-data" action="{{route('products.store')}}">
  {{ csrf_field() }}

      <div class="col-md-10 col-md-offset-1 clo-container">

          <div class="form-group col-md-12">
            <label>Nombre del producto</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
          </div>

          <div class="form-group col-md-6">
            <label>Precio original</label>
            <input type="text" class="form-control" name="originalprice" value="{{ old('originalprice', $product->originalprice) }}">
          </div>

          <div class="form-group col-md-6">
            <label>Precio promocional (Rebaja)</label>
            <input type="text" class="form-control" name="saleprice" value="{{ old('saleprice', $product->saleprice) }}">
          </div>

          <div class="form-group col-md-12">
            <label for="name">Descripción del producto</label>
            <textarea style="min-height:15px" type="text" class="form-control" placeholder="Describe tu producto" name="description">{{ old('description', $product->description) }}</textarea>
          </div>

          <div class="form-group col-md-12">
            <?php foreach ($product->sizes as $size): ?>
              <div >
                {{$size->size}} / {{$size->pivot->color_id}}
                <input type="checkbox" name="" value="">
              </div>
            <?php endforeach; ?>
          </div>

          <div class="col-md-4">
            <label for="">Imagen principal</label>
            <input name="mainimage" type="file" maxFiles=1/>
          </div>

          <div class="col-md-4">
            <label for="">Imagen adicional</label>
            <input name="aditionalimage1" type="file" maxFiles=1/>
          </div>

          <div class="col-md-4">
            <label for="">Imagen adicional</label>
            <input name="aditionalimage2" type="file" maxFiles=1/>
          </div>

        </div>

      <button type="submit" name="button" class="col-md-10 col-md-offset-1 btn btn-warning" style="margin-top:20px">GUARDAR CAMBIOS</button>

  </form>

</div>
@endsection







@section('scripts')
<script type="text/javascript">
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

    $(".dropzone").dropzone({
        maxFiles: 1,
        maxfilesexceeded: function(file) {
            this.removeAllFiles();
        }
    })
</script>
@endsection
