@extends('layouts.app')

@section('content')

<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <h1>SisRest Ingreso</h1>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" placeholder="email" name="email" value="{{ old('email') }}"
                           required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password"
                           placeholder="Password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
<!--
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>
-->

                <div>
                    <button type="submit" class="btn btn-default">
                        Ingresar
                    </button>
                    <a class="reset_pass" href="{{ url('/password/reset') }}">Olvidaste tu Contraseña?</a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">Eres nuevo ?
                        <a href="#signup" class="to_register"> CrearCuenta </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-coffee"></i> BYPsi! </h1>
                        <p>©2016 All Rights Reserved. BYPsi!. Privacy and Terms</p>
                    </div>
                </div>


            </form>
        </section>
    </div>

    <div id="register" class="animate form registration_form">
        <section class="login_content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <h1>Crear Cuenta</h1>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <input id="password" type="password" class="form-control" placeholder="Contraseña" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                </div>
                <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" placeholder="Repetir contraseña" name="password_confirmation" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">
                        Registrar
                    </button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">Ya tienes una cuenta ?
                        <a href="#signin" class="to_register"> Ingresa Aquí </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-cutlery"></i> BYPsi! </h1>
                        <p>©2016 All Rights Reserved. BYPsi!. Privacy and Terms</p>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

@endsection