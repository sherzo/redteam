@extends('layouts.app')

@section('content')
<div class="container loginAcceso">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{ asset('assets/images/sika-logo.JPEG') }}" class="img-responsive" alt="">
            <h2 class="fontMiriamProRegular">Entérate. Crece. Pertenece.</h2>
            <div class="panel panel-default">
                <div class="panel-heading fontMiriamProRegular">¡Bienvenido!</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="Introduce tu correo" name="email" value="{{ old('email') }}" required autofocus>

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
                                <input id="password" type="password" class="form-control" placeholder="Introduce tu contraseña" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        {{-- Recordar --}}
                        {{-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group BlockSession">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary colorBlack fontMiriamProRegular BgYellow">
                                    Entrar
                                </button>

                                <a class="btn btn-link colorGrisSuave fontMiriamProRegular" href="{{ url('/password/reset') }}">
                                    ¿Has olvidado tu contraseña?
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
