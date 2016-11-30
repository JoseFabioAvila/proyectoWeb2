@extends('layouts.app')

@section('content')
</br>
<h1 class="contact_text" >Iniciar sesion</h1>
<div class="columns_wrap sc_columns">
  <div class="column-1_4 sc_column_item">
  </div>
  <div class="column-1_4 sc_column_item">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Correo</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Contraseña</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">

                </div>
            </div>
        </div>
        <div class="popup_form_field remember_field">
          Recordar  <input type="checkbox" name="remember">
          <a class="btn btn-link" href="{{ url('/password/reset') }}">
              Olvidaste tu contraseña?
          </a>
        </div>
        <div class="form-group">
            <div class="popup_form_field submit_field">
                <button type="submit" class="submit_button sc_button sc_button_size_medium">
                    Login
                </button></br>


            </div>
        </div>
    </form>
  </div>
  <div class="column-1_4 sc_column_item">
    <div class="login_socials_title">Iniciar sesion con una red social</div>
    <div class="login_socials_list">
      <div class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
        <div class="sc_socials_item">
          <a href="{{ url('/redirect') }}" target="_blank" class="social_icons social_facebook">
            <span class="icon-facebook"></span>
          </a>
        </div>
        <div class="sc_socials_item">
          <a href="#" target="_blank" class="social_icons social_twitter">
            <span class="icon-twitter"></span>
          </a>
        </div>
        <div class="sc_socials_item">
          <a href="#" target="_blank" class="social_icons social_gplus">
            <span class="icon-gplus"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="column-1_4 sc_column_item">
  </div>
</div>
</br></br></br>
@endsection
