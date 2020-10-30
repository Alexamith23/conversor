@extends('layouts.app')

@section('relleno')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <h1 class="masthead-heading mb-0" style="font-size: 100px;">Entrar</h1>
            <hr>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <input type="email" class="form-control input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <p style="color: white;">{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <input id="password" type="password" class="form-control input @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <p style="color: white;">{{ $message }}</p>
                        </span>
                        @enderror
                    </div><br>
                </div><br>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="form-control input btn btn-primary btn-lg" style="font-size: 25px;">
                            {{ __('Entrar') }}
                        </button>
                    </div>
                </div>


                <!-- <div class="form-group row">

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div> -->

                <!-- <div class="form-group row">


                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div> -->

                <!-- <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div> -->
                <!-- <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-primary input">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div> -->
                <!-- <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div> -->
            </form>
        </div>
    </div>
</div>
@endsection