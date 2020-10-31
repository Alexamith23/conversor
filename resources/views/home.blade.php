@extends('layouts.app')

@section('relleno')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="masthead-heading mb-0 tabla" style="font-size: 100px;">Ingresa tu link</h1>

        <div class="col-md-12">
            <hr>
            <form method="POST" action="/convertir">
                @csrf
                <!-- Text area -->
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <textarea rows="2" class="form-control input" placeholder="https://www.youtube.com/watch?v=QkI-8FVwWso" id="link" name="link" required data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div><br>
                <!-- Select tipo -->
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <select class="form-control input" id="tipo" name="tipo">
                            <option onclick="llenar('limpiar')">Seleccione un tipo</option>
                            <option onclick="llenar('audio')">Audio</option>
                            <option onclick="llenar('video')">Video</option>
                        </select>
                    </div>
                </div><br>
                <!-- Select -->
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <select class="form-control input" id="formato" name="formato">
                        </select>
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
    <script>
        const $select = $("#formato");
        let formatos_audio = [".mp3", ".ogg", , ".oppus", , ".flac"];
        let formatos_video = [".mp4", ".3gp", ".flv", ".mpeg", ".mkv", ".avi"];

        function llenar(tipo) {
            $select.empty();
            if (tipo == 'audio') {
                formatos_audio.forEach(function(elemento, indice, array) {
                    $select.append($("<option>", {
                    value: elemento,
                    text: elemento
                }));
                })
            }else if(tipo == 'video'){
                formatos_video.forEach(function(elemento, indice, array) {
                    $select.append($("<option>", {
                    value: elemento,
                    text: elemento
                }));
                })
            }else{
                $("#formato").attr('disabled', 'disabled');
            }

            $('#formato').prop("disabled", false);
        }
    </script>
</div>
@endsection