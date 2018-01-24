@extends('back.afterlogin')

@section('subcontent')



<div class="clo-form">
  <form method="POST" enctype="multipart/form-data" action="{{route('products.store')}}">
  {{ csrf_field() }}

    <div class="">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-12">
        <label>Nombre del producto</label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}">
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
        <input type="text" class="form-control" name="originalprice" value="{{old('originalprice')}}">
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
        <input type="text" class="form-control" name="saleprice" value="{{old('saleprice')}}">
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
        <input type="text" name="description" value="{{old('saleprice')}}">
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="middle">
      <div class="form-group{{ $errors->has('sizes') ? ' has-error' : '' }} col-md-6">
        <label>Talles</label>
        <select name="sizes[]" class="form-control" multiple="multiple" id="sizes" style="width:100%"></select>
        @if ($errors->has('sizes'))
            <span class="help-block">
                <strong>{{ $errors->first('sizes') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="middle">
      <div class="form-group{{ $errors->has('colors') ? ' has-error' : '' }} col-md-6">
        <label>Colores</label>
        <select name="colors[]" class="form-control" multiple="multiple" id="colors" style="width:100%"></select>
        @if ($errors->has('colors'))
            <span class="help-block">
                <strong>{{ $errors->first('colors') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="onethird">
      <div class="{{ $errors->has('mainimage') ? ' has-error' : '' }} col-md-4">
        <label for="">Imagen principal</label>
        <input name="mainimage" type="file" maxFiles=1 />
        @if ($errors->has('mainimage'))
            <span class="help-block">
                <strong>{{ $errors->first('mainimage') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="onethird">
      <div class="col-md-4">
        <label for="">Imagen adicional</label>
        <input name="aditionalimage[]" type="file" />
      </div>
    </div>

    <div class="onethird">
      <div class="col-md-4">
        <label for="">Imagen adicional</label>
        <input name="aditionalimage[]" type="file" />
      </div>
    </div>


    <button style="float:right" type="submit" class="button">PUBLICAR</button>

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

</script>
@endsection
