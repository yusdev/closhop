@extends('back.beforelogin')

@section('subcontent')
<div class="subcontent">

  <h2 style="text-align:center">
    INICIAR SESION
  </h2>

  <div class="lgn-reg-container">
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-MAIL" required>
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" name="password" placeholder="CONTRASEÑA" required>
        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>

      <div>
        <button type="submit" class="button" style="width=100%;">INGRESAR</button>
        <a class="forgetpass" href="{{ route('password.request') }}"><p>¿Olvidaste tu contraseña?</p></a>
      </div>

    </form>
  </div>

</div>

@endsection
