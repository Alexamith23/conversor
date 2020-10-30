@extends('layouts.app')

@section('relleno')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="masthead-heading mb-0" style="font-size: 100px;">Registro</h1>
            <hr>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <input id="name" type="text" class="form-control input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <input id="email" type="email" class="form-control input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <input id="password" type="password" class="form-control input @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <input id="password-confirm" type="password" class="form-control input" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="form-control input btn btn-primary">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </div><br>
                <!-- <div class="form-group row">
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div> -->

                <!-- <div class="form-group row">

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div> -->

                <!-- <div class="form-group row">


                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div> -->

                <!-- <div class="form-group row">

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div> -->

                <!-- <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div> -->
            </form>
            <!-- <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection