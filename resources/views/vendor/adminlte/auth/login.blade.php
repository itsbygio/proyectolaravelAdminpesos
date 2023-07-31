@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
    <body class="hold-transition login-page " style="background-image: url(img/fondo2.jpg); background-size: cover;">
    <div id="app" v-cloak>
        <div class="login-box">
            <div class="login-logo">
            <a href="{{ url('/home') }}"><b style="color: white">Sistema de Finanzas</b></a>
            </div><!-- /.login-logo -->

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="login-box-body">
                <p class="login-box-msg"> inicia sesión para ingresar al sistema </p>
                <form action="{{ url('/login') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input name="email" class="form-control" placeholder="usuario" />
                    {{--<div class="form-group has-feedback">--}}
                    {{--<input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>--}}
                    {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
                    {{--</div>--}}
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="contraseña" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input style="display:none;" type="checkbox" name="remember"> Recordarme
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                        </div><!-- /.col -->
                    </div>
                </form>

                @include('adminlte::auth.partials.social_login')

                <a href="{{ url('/password/reset') }}">Olvidé mi contraseña</a><br>
                <a href="{{ url('/register') }}" class="text-center">Registrar nuevo usuario</a>

            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    </body>

@endsection
