@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="alert alert-info">
            Hola <strong>{{ Auth::user()->shop_name }}</strong>, Bienvenida a Closhop :) !!!<br/>
            Recordá completar tu perfil con todos tus datos. No olvides vincular tu cuenta de MercadoPago, de otra forma no podrás publicar tus productos.
          </div>
            <div class="clo-container panel-default">
                <div class="panel-heading">
                  <ul class="nav justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="misdatos-tab" data-toggle="tab" href="#misdatos" role="tab" aria-controls="misdatos" aria-selected="true"> Mis datos </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="mp-tab" data-toggle="tab" href="#mercadopago" role="tab" aria-controls="mercadopago" aria-selected="false">MercadoPago</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="envios-tab" data-toggle="tab" href="#envios" role="tab" aria-controls="envios" aria-selected="false">Envíos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="cambios-tab" data-toggle="tab" href="#cambios" role="tab" aria-controls="cambios" aria-selected="false">Cambios & Devoluciones</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="cuenta-tab" data-toggle="tab" href="#cuenta" role="tab" aria-controls="cuenta" aria-selected="false">Cuenta</a>
                    </li>
                  </ul>
                </div>

                <div class="panel-body">
                  <div class="tab-content" id="myTabContent">

                    <!-- MIS DATOS -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger col-md-12">
                          <p>Por favor completa tu perfil con todos tus datos. Todos los campos son obligatorios.</p>
                        </div>
                    @endif
                    <div class="tab-pane fade active in" id="misdatos" role="tabpanel" aria-labelledby="misdatos-tab">

                      <form method="POST" action="{{ route('updateaccount', ['id'=>Auth::user()->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="name">Nombre*</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="lastname">Apellido*</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', $user->lastname) }}">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="dni_cuit">DNI/CUIT/CUIL*</label>
                            <input type="text" class="form-control" id="dni_cuit" name="dni_cuit" value="{{ old('dni_cuit', $user->dni_cuit) }}">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="mobile">Celular*(Whatsapp)</label>
                            <input type="text" class="form-control" id="mobile" name="cellphone" value="{{ old('cellphone', $user->cellphone) }}">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="shop_name">Nombre del Local</label>
                            <input type="text" class="form-control" id="shop_name" value="{{Auth::user()->shop_name}}" readonly="readonly">
                          </div>
                          <div class="form-group col-md-8">
                            <label for="address">Dirección del local*</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Calle Número Piso Dpto" value="{{old('address', $user->address)}}">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="provincia">Provincia*</label>
                            <select id="provincia" class="form-control" name="province">
                              <option selected disabled>Seleccionar</option>
                              <?php foreach ($provincias['provincias'] as $provincia): ?>
                                <option value="{{$provincia['nombre']}}">{{$provincia['nombre']}}</option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="ciudad">Ciudad*</label>
                            <input type="text" class="form-control" id="ciudad" name="city" value="{{ old('city', $user->city) }}">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="codigopostal">CP</label>
                            <input type="text" class="form-control" id="codigopostal" name="postalcode" value="{{old('postalcode', $user->postalcode)}}">
                          </div>
                        </div>
                        <div class="form-row col-md-12" >
                          <button style="float:right" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                      </form>
                    </div>

                    <!-- MERCADOPAGO -->
                    <div class="tab-pane fade" id="mercadopago" role="tabpanel" aria-labelledby="mp-tab">
                      <button type="button" class="btn btn-primary" style="display:block">Vincular cuenta de MercadoPago</button>
                      <small class="form-text text-muted">¿Por qué debo vincular mi cuenta de MercadoPago?</small>
                    </div>

                    <!-- ENVIOS -->
                    <div class="tab-pane fade" id="envios" role="tabpanel" aria-labelledby="envios-tab">
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
                    </div>

                    <!-- CAMBIOS & DEVOLUCIONES -->
                    <div class="tab-pane fade" id="cambios" role="tabpanel" aria-labelledby="cambios-tab">
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
                    </div>

                    <!-- CUENTA -->
                    <div class="tab-pane fade" id="cuenta" role="tabpanel" aria-labelledby="cuenta-tab">
                      <div class="form-group col-md-12">
                        <label for="email">Correo electrónico</label>
                        <input type="text" class="form-control" id="email" value="{{Auth::user()->email}}" readonly="readonly">
                      </div>
                      <a class="col-md-12" style="display:block" href="#">Modificar contraseña</a>
                      <a class="col-md-12" style="display:block" href="#">Eliminar cuenta</a>
                    </div>

                  </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
