@extends('back.afterlogin')

@section('subcontent')

  @if(!$user->complete)
    <div class="alert alert-info">
      Hola <strong>{{ Auth::user()->shop_name }}</strong>, Bienvenida a Closhop :) !!!<br/>
      Recordá completar tu perfil con todos tus datos. No olvides vincular tu cuenta de MercadoPago, de otra forma no podrás publicar tus productos.
    </div>
  @endif

  <div class="account"> <!-- TABS -->

    <input id="tab1" type="radio" name="tabs" checked>
    <label class="label-tab" for="tab1">Mis datos</label>

    <input id="tab2" type="radio" name="tabs">
    <label class="label-tab" for="tab2">MercadoPago</label>

    <input id="tab3" type="radio" name="tabs">
    <label class="label-tab" for="tab3">Envios</label>

    <input id="tab4" type="radio" name="tabs">
    <label class="label-tab" for="tab4">Cambios & Devoluciones</label>

    <input id="tab5" type="radio" name="tabs">
    <label class="label-tab" for="tab5">Cuenta</label>


    <section id="content1"> <!-- Mi cuenta -->
      @if (count($errors) > 0)
          <div class="alert alert-danger col-md-12">
            <p>Por favor completa tu perfil con todos tus datos. Todos los campos son obligatorios.</p>
          </div>
      @endif

      <div class="clo-form">
        <form method="POST" action="{{ route('updateaccount', ['id'=>Auth::user()->id]) }}">
          {{ csrf_field() }}

          <div class="inline middle">
            <label for="name">Nombre*</label>
            <input type="text" id="name" name="name" value="{{old('name', $user->name)}}">
          </div>

          <div class="middle">
            <label for="lastname">Apellido*</label>
            <input type="text" id="lastname" name="lastname" value="{{ old('lastname', $user->lastname) }}">
          </div>

          <div class="onethird">
            <label for="dni_cuit">DNI/CUIT/CUIL*</label>
            <input type="text" class="form-control" id="dni_cuit" name="dni_cuit" value="{{ old('dni_cuit', $user->dni_cuit) }}">
          </div>

          <div class="onethird">
            <label for="mobile">Celular*(Whatsapp)</label>
            <input type="text" class="form-control" id="mobile" name="cellphone" value="{{ old('cellphone', $user->cellphone) }}">
          </div>

          <div class="onethird">
            <label for="shop_name">Nombre del Local</label>
            <input type="text" class="form-control" id="shop_name" value="{{Auth::user()->shop_name}}" readonly="readonly">
          </div>

          <div class="full">
            <label for="address">Dirección del local*</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Calle Número Piso Dpto" value="{{old('address', $user->address)}}">
          </div>

          <div class="onethird">
            <label for="provincia">Provincia*</label>
            <select id="provincia" class="form-control" name="province">
                <option disabled <?php if(!$user->province){ echo "selected"; }?>>Seleccionar</option>
                @foreach ($provincias['provincias'] as $provincia)
                  <option value="{{$provincia['nombre']}}" <?php if($user->province == $provincia['nombre']){ echo "selected"; }?>>{{$provincia['nombre']}}</option>
                @endforeach
            </select>
          </div>

          <div class="onethird">
            <label for="ciudad">Ciudad*</label>
            <input type="text" class="form-control" id="ciudad" name="city" value="{{ old('city', $user->city) }}">
          </div>

          <div class="onethird">
            <label for="codigopostal">CP</label>
            <input type="text" class="form-control" id="codigopostal" name="postalcode" value="{{old('postalcode', $user->postalcode)}}">
          </div>


          <button style="float:right" type="submit" class="button">GUARDAR</button>

        </form>
      </div>

    </section>

    <section id="content2"> <!-- MercadoPago -->
      <div class="mercadopago">
        <a href="" type="button" class="button" style="width: 50%;">Vincular cuenta de MercadoPago</a>
        <p class="" style="display:block">¿Por qué debo vincular mi cuenta de MercadoPago?</p>
      </div>
    </section>

    <section id="content3"> <!-- Envios -->
      </form>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="met-envios">Métodos de envío</label>
            <textarea type="text" class="form-control" id="met-envios" placeholder="Ingrese los métodos y las características de los envíos que realiza"></textarea>
          </div>
        </div>
        <div class="form-row col-md-12" >
          <button style="float:right" type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </section>

    <section id="content4"> <!-- cambios y devoluciones -->
      </form>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="met-envios">Cambios y Devoluciones</label>
            <textarea type="text" class="form-control" id="met-envios" placeholder="Describe tus políticas de cambios y devoluciones"></textarea>
          </div>
        </div>
        <div class="form-row col-md-12" >
          <button style="float:right" type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </section>

    <section id="content5"> <!-- cuenta -->
      <div class="form-group col-md-12">
        <label for="email">Correo electrónico</label>
        <input type="text" class="form-control" id="email" value="{{Auth::user()->email}}" readonly="readonly">
      </div>
      <a class="col-md-12" style="display:block" href="#">Modificar contraseña</a>
      <a class="col-md-12" style="display:block" href="#">Eliminar cuenta</a>
    </section>

  </div>

  @include('modals.success')

  <?php if(session()->has('saved')){
    $saved = true;
  }else{
    $saved = false;
  }
  ?>

@endsection

@section('scripts')
  <script type="text/javascript">
    window.onload = function(){

      var modal = document.getElementById('myModal');
      var span = document.getElementsByClassName("close")[0];
      var ok = document.querySelector(".ok-btn");

      var saved = <?php echo $saved; ?>;

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
    }

  </script>
@endsection
