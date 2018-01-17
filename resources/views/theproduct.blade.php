@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <!-- imagenes inicio -->

    <div class="col-md-1" style="padding:0">
      <img src="{{ asset('storage/' . $product->mainimage) }}" class="col-md-12" style="padding:0">
      <img src="{{ asset('storage/' . $product->mainimage) }}" class="col-md-12" style="padding:0">
      <img src="{{ asset('storage/' . $product->mainimage) }}" class="col-md-12" style="padding:0">
    </div>

    <div class="slideshow-container col-md-4">
      <div class="mySlides">
        <img src="{{ asset('storage/' . $product->mainimage) }}" style="width:100%">
      </div>
      <div class="mySlides">
        <img src="{{ asset('storage/' . $product->mainimage) }}" style="width:100%">
      </div>
      <div class="mySlides">
        <img src="{{ asset('storage/' . $product->mainimage) }}" style="width:100%">
      </div>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <!-- imagenes fin -->

    <!-- <div class="col-md-1" style="padding:0">
      <img src="{{ asset('storage/' . $product->mainimage) }}" class="col-md-12" style="padding:0">
      <img src="{{ asset('storage/' . $product->mainimage) }}" class="col-md-12" style="padding:0">
      <img src="{{ asset('storage/' . $product->mainimage) }}" class="col-md-12" style="padding:0">
    </div>

    <img src="{{ asset('storage/' . $product->mainimage) }}" class="col-md-4"> -->


    <div class="col-md-6">
      <h2>{{ $product->name }}</h2>
      <h6>by {{$product->user->shop_name}}</h6>
      <p><span class="glyphicon glyphicon-map-marker"></span> {{$product->user->province}}, {{$product->user->city}}</p>
      <p>{{'$ '.$product->originalprice}}</p>

      <div class="clo-container" style="padding:20px">
        <p>{{$product->description}}</p>

        <select class="col-md-6" id="size-selects" name="selects" onchange="checkstock()">
            <option value="#" selected disabled>Talle</option>
          <?php foreach ($sizes as $size): ?>
            <option value="{{$size->id}}">{{$size->size}}</option>
          <?php endforeach; ?>
        </select>

        <select class="col-md-6" id="color-selects" name="colors" onchange="checkstock()">
            <option value="#" selected disabled>Color</option>
          <?php foreach ($colors as $color): ?>
            <option value="{{$color->id}}">{{$color->color}}</option>
          <?php endforeach; ?>
        </select>

      </div>

      <input id="buy-button" class="col-md-12 btn btn-warning" type="button" value="COMPRAR" style="margin-top:20px"></input>
      <small style="display:block" class="form-text text-muted">*Al presionar comprar aceptas los términos y condiciones de Closhop</small>


      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">Métodos de envío</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Políticas de cambio</a>
        </li>
      </ul>

    </div>
  </div>
</div>


<script type="text/javascript">

// checkstock
var stocks = <?php echo json_encode($stock) ?>;

  function checkstock(){
    var button = document.getElementById('buy-button');
    var size = document.getElementById('size-selects').value;
    var color = document.getElementById('color-selects').value;
    var stock = stocks.find(function(v){
      return (v.size_id == size && v.color_id == color)
    });
    if(stock.stock == 0) {
      button.className = "col-md-12 btn btn-secondary";
      button.disabled = true;
      button.value = "SIN STOCK";
    } else {
      button.className = "col-md-12 btn btn-warning";
      button.disabled = false;
      button.value = "COMPRAR";
    }
  }

  // imagenes
  var slideIndex = 1;
  showSlides(slideIndex);
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
  }
</script>




@endsection
