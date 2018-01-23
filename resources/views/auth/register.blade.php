@extends('back.beforelogin')

@section('subcontent')
<div class="subcontent">

  <h2 style="text-align:center">
    REGISTRATE
  </h2>

  <div class="lgn-reg-container">
    <form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

      <div class="form-group{{ $errors->has('shop_name') ? ' has-error' : '' }}">
        <input id="shop_name" type="text" class="form-control" name="shop_name" value="{{ old('shop_name') }}" placeholder="NOMBRE DEL LOCAL" required>
        @if ($errors->has('shop_name'))
          <span class="help-block">
            <strong>{{ $errors->first('shop_name') }}</strong>
          </span>
        @endif
      </div>

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

      <div class="form-group">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="CONFIRME CONTRASEÑA" required>
      </div>


      <div>
        <button type="submit" class="button" style="width=100%;">REGISTRATE</button>
      </div>

    </form>
  </div>

</div>

@endsection
