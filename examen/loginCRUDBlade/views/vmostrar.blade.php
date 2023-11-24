<!-- Heredamos de la plantilla1 ubicada en la carpeta 'plantillas' -->
@extends('plantillas.plantilla1')

<!-- Definimos la sección 'titulo' y mostramos el valor de la variable $titulo -->
@section('titulo')
    {{$titulo}}
@endsection

<!-- Definimos la sección 'encabezado' y mostramos el valor de la variable $encabezado -->
@section('encabezado')
    {{$encabezado}}
@endsection
<!-- Definimos la sección 'contenido' -->
@section('contenido')
    <div class="container mt-4">
      

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th colspan="3" style="text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <tr>
            <td>{{$datosProductos->nombrec}}</td>
            <td>{{$datosProductos->descripciónc}}</td>
            <td>{{$datosProductos->pvpc}}</td>
            <td><a href="eliminar.php?id={{$datosProductos->id}}" class="btn btn-danger">Eliminar</a></td>
            <td><a href="actualizar.php?id={{$datosProductos->id}}" class="btn btn-primary">Actualizar</a></td>
        </tr>
            </tbody>
        </table>

        <a href="inicio.php" class="btn btn-secondary">Volver</a>


  @endsection