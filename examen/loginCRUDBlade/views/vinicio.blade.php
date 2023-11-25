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
    <div class="text-right mb-3">
        <a href="cerrar.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
    <?php
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
?>
    <h1>{{ $mensaje }}</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <!--1.2 adaptamos el formulario a nuestra tabla
            y nos vamos operaciones.php a por el metodo eliminar(2) -->
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th colspan="3" style="text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
                            <!--1.2 adaptamos el formulario a nuestra tabla-->

            @foreach ($datos as $info)

            <tr>
                <td>{{$info->nombrec}}</td>
                <td>{{$info->descripciónc}}</td>
                <td>{{$info->pvpc}}</td>



                <td><a href="eliminar.php?id={{$info->id}}" class="btn btn-danger">Eliminar</a></td>
                <td><a href="actualizar.php?id={{$info->id}}" class="btn btn-primary">Actualizar</a></td>
                <td><a href="mostrar.php?id={{$info->id}}" class="btn btn-success">Mostrar</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <a href="insertar.php" class="btn btn-success mb-3">Insertar</a>


</div>
@endsection