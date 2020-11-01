@extends('layouts.app')
@section('relleno')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="masthead-heading mb-0 tabla" style="font-size: 100px;">Ingresa tu link</h1>

        <div class="col-md-12">
            <hr>
            <form action="/convertir" method="post">
                @csrf
                <input type="hidden" id="cola" name="cola">
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
                        <button class="btn btn-primary btn-lg form-control input" onclick="numero_cola()" type="submit">Convertir</button><br><br>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        
            $.ajax({
               type:'POST',
               url:'/convertir',
               data:{
                   _token:$('input[name="_token"]'),
               success:function(data) {
                  alert(data.msg);
               }}
            });
         
    </script> -->

    <script>
    function numero_cola() {
        if(localStorage.getItem("cola") === null){
            localStorage.setItem("cola", 1);
            
        }else{
            let cola = localStorage.getItem("cola");
            if (cola == 5) {
                cola = 1;
            }else{
                cola++;
            }
            document.getElementById('cola').value = cola;
            localStorage.setItem("cola", cola);
        }
    }
        
        


        const $select = $("#formato");
        let formatos_audio = ["mp3", "ogg", , "oppus", , "flac"];
        let formatos_video = ["mp4", "3gp", "flv", "mpeg", "mkv", "avi"];

        function llenar(tipo) {
            $select.empty();
            if (tipo == 'audio') {
                formatos_audio.forEach(function(elemento, indice, array) {
                    $select.append($("<option>", {
                        value: elemento,
                        text: elemento
                    }));
                })
            } else if (tipo == 'video') {
                formatos_video.forEach(function(elemento, indice, array) {
                    $select.append($("<option>", {
                        value: elemento,
                        text: elemento
                    }));
                })
            } else {
                $("#formato").attr('disabled', 'disabled');
            }

            $('#formato').prop("disabled", false);
        }
        // $('#espere').modal('show');
    </script>
</div>
@endsection