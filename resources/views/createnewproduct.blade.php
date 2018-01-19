@extends('layouts.app')

@section('content')
<div class="container">

  <form method="POST" enctype="multipart/form-data" action="{{route('products.store')}}">
  {{ csrf_field() }}

      <div class="col-md-10 col-md-offset-1 clo-container">

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-12">
            <label>Nombre del producto</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('originalprice') ? ' has-error' : '' }} col-md-6">
            <label>Precio original</label>
            <input type="text" class="form-control" name="originalprice" value="{{old('originalprice')}}">
            @if ($errors->has('originalprice'))
                <span class="help-block">
                    <strong>{{ $errors->first('originalprice') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('saleprice') ? ' has-error' : '' }} col-md-6">
            <label>Precio promocional (Rebaja)</label>
            <input type="text" class="form-control" name="saleprice" value="{{old('saleprice')}}">
            @if ($errors->has('saleprice'))
                <span class="help-block">
                    <strong>{{ $errors->first('saleprice') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} col-md-12">
            <label>Descripción del producto</label>
            <textarea style="min-height:15px" type="text" class="form-control" placeholder="Describe tu producto" name="description">{{old('description')}}</textarea>
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('sizes') ? ' has-error' : '' }} col-md-6">
            <label>Talles</label>
            <select name="sizes[]" class="form-control" multiple="multiple" id="sizes"></select>
            @if ($errors->has('sizes'))
                <span class="help-block">
                    <strong>{{ $errors->first('sizes') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('colors') ? ' has-error' : '' }} col-md-6">
            <label>Colores</label>
            <select name="colors[]" class="form-control" multiple="multiple" id="colors"></select>
            @if ($errors->has('colors'))
                <span class="help-block">
                    <strong>{{ $errors->first('colors') }}</strong>
                </span>
            @endif
          </div>

          <div class="{{ $errors->has('mainimage') ? ' has-error' : '' }} col-md-4">
            <label for="">Imagen principal</label>
            <input name="mainimage" type="file" maxFiles=1 />
            @if ($errors->has('mainimage'))
                <span class="help-block">
                    <strong>{{ $errors->first('mainimage') }}</strong>
                </span>
            @endif
          </div>

          <div class="col-md-4">
            <label for="">Imagen adicional</label>
            <input name="aditionalimage[]" type="file" />
          </div>

          <div class="col-md-4">
            <label for="">Imagen adicional</label>
            <input name="aditionalimage[]" type="file" />
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
