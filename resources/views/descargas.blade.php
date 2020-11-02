@extends('layouts.app')

@section('relleno')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="masthead-heading mb-0" style="font-size: 100px;">Descargas</h1>
        <div class="col-md-12">
            <hr>
            @isset ($procesos)
            <table class="table table-bordered">
                <thead>
                    <tr class="tabla head">
                        <th scope="col">#</th>
                        <th scope="col">Link</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Formato</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                @foreach ($procesos as $user)
                <tbody class="tabla">
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->link }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->format }}</td>
                        @if ($user->estado == 0)
                        <td>No procesado</td>
                        <td><a type="button" class="btn btn-success" href="/descargas/{{ $user->id }}">Borrar</a></td>
                        @else
                        <td>Procesado</td>
                        <td><a type="button" class="btn btn-success" href="/descargas/{{ $user->id }}">Borrar</a> <a type="button" class="btn btn-success" href="#">Descargar</a></td>
                        @endif
                        
                    </tr>
                </tbody>
                @endforeach
            </table>
            @endisset
        </div>
    </div>
</div>
@endsection