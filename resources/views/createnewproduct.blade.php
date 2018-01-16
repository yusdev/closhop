@extends('layouts.app')

@section('content')
<div class="container">
  <form method="POST" enctype="multipart/form-data" action="{{route('products.store')}}">
  {{ csrf_field() }}

      <div class="col-md-10 col-md-offset-1 clo-container">

          <div class="form-group col-md-12">
            <label>Nombre del producto</label>
            <input type="text" class="form-control" name="name">
          </div>

          <div class="form-group col-md-6">
            <label>Precio original</label>
            <input type="text" class="form-control" name="originalprice">
          </div>

          <div class="form-group col-md-6">
            <label>Precio promocional (Rebaja)</label>
            <input type="text" class="form-control" name="saleprice">
          </div>

          <div class="form-group col-md-12">
            <label for="name">Descripción del producto</label>
            <textarea style="min-height:15px" type="text" class="form-control" placeholder="Describe tu producto" name="description"></textarea>
          </div>

          <div class="form-group col-md-6">
            <label for="sizes" class="control-label">Talles</label>
            <select name="sizes[]" class="form-control" multiple="multiple" id="sizes"></select>
          </div>

          <div class="form-group col-md-6">
            <label for="colors" class="control-label">Colores</label>
            <select name="colors[]" class="form-control" multiple="multiple" id="colors"></select>
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

      <button type="submit" name="button" class="col-md-10 col-md-offset-1 btn btn-warning" style="margin-top:20px">PUBLICAR</button>

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
