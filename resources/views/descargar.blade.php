@extends('layouts.app')

@section ('relleno')
<form action="/media" enctype="multipart/form-data" method="post">
    @csrf
    <input type="file"  name="file" required><br><br>
    <button class ="btn btn-success" onclick = "mostrar_modal()" type="submit" >Upload</button>
</form>
@isset ($archivo)
<br>

<a href="/download/{{$archivo}}" class="btn btn-success">Descargar</a>
@endisset
@endsection