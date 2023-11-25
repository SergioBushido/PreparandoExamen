<!-- Heredamos de la plantilla1 ubicada en la carpeta 'plantillas' -->
@extends('plantillas.plantilla1')
@section('titulo')
    {{$titulo}}
@endsection
@section('encabezado')
    {{$encabezado}}
@endsection
@section('contenido')
    <div class="container mt-4">
<!--3.1 adaptamos la tabla a lo que queramos mostrar-->
        <table class="table table-bordered">
            <thead>
                <tr>

                <!--3.1-->
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th colspan="3" style="text-align: center;">Acciones</th>


                </tr>
            </thead>
            <tbody>
            <tr>

            <!--3.1-->
            <td>{{$datos->nombrec}}</td>
            <td>{{$datos->descripciónc}}</td>
            <td>{{$datos->pvpc}}</td>



            <td><a href="eliminar.php?id={{$datos->id}}" class="btn btn-danger">Eliminar</a></td>
            <td><a href="actualizar.php?id={{$datos->id}}" class="btn btn-primary">Actualizar</a></td>
        </tr>
            </tbody>
        </table>

        <a href="inicio.php" class="btn btn-secondary">Volver</a>


  @endsection