@extends('layouts.app')

@section('content')
<div class="wrapper contact_form_main">
  <div class="sc_content content_wrap">
      <h1 class="sc_title sc_title_regular sc_align_center contact_text" >Login</h1>
      <div class="sc_contact_form sc_contact_form_standard sc_contact_form_style_1">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            <div class="sc_contact_form_item sc_contact_form_field label_over">
              <label class="required" for="email">Correo</label>
              <input type="email" name="email" placeholder="Correo">
            </div></br>
            <div class="sc_contact_form_item sc_contact_form_field label_over">
              <label class="required" for="password">Contraseña</label>
              <input type="password" name="password" placeholder="Contraseña">
            </div></br>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Recuerdame
                        </label>
                    </div>
                </div>
            </div>
            <div class="sc_contact_form_item sc_contact_form_button">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium">
                Iniciar Sesion
              </button>
              <button type="submit" class="btn btn-primary">
                  Login
              </button>
            </div>
          </form>
          <a class="btn btn-link" href="{{ url('/password/reset') }}">
              Forgot Your Password?
          </a>
      </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

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
                            <label for="password" class="col-md-4 control-label">Password</label>

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
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
