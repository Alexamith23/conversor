@extends('layouts.app')

@section('relleno')
<div class="container">
    <div class="row justify-content-center">
    <h1 class="masthead-heading mb-0" style="font-size: 100px;">Descargas</h1>
        <div class="col-md-12">
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr class="tabla head"> 
                        <th scope="col">#</th>
                        <th scope="col">Link</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody class="tabla">
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry the Bird</td>
                        <td>Thornton</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection