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
    <!-- Agrega una tabla para mostrar los datos con estilos de Bootstrap -->
    <div class="text-right mb-3">
        <a href="cerrar.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
   

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
            @foreach ($datosProductos as $producto)
            <tr>
                <td>{{$producto->nombrec}}</td>
                <td>{{$producto->descripciónc}}</td>
                <td>{{$producto->pvpc}}</td>
                <td><a href="eliminar.php?id={{$producto->id}}" class="btn btn-danger">Eliminar</a></td>
                <td><a href="actualizar.php?id={{$producto->id}}" class="btn btn-primary">Actualizar</a></td>
                <td><a href="mostrar.php?id={{$producto->id}}" class="btn btn-success">Mostrar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="insertar.php" class="btn btn-success mb-3">Insertar</a>


</div>
@endsection