@extends('layouts.app')

@section('relleno')
<div class="container">
    <div class="row justify-content-center">
    <h1 class="masthead-heading mb-0 tabla" style="font-size: 100px;">Ingresa tu link</h1>
    
        <div class="col-md-12">
            <hr>
            <form method="POST" action="">
                @csrf
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <textarea rows="2" class="form-control input" placeholder="https://www.youtube.com/watch?v=QkI-8FVwWso" id="introduccion" name="introduccion" required data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-primary btn-lg form-control input">Convertir</button>
                    </div>
                </div>

            </form>
            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection