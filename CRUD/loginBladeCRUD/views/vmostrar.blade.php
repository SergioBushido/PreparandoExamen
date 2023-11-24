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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th colspan="2" style="text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datosProductos as $producto)
                    <tr>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->descripción}}</td>
                        <td>{{$producto->pvp}}</td>
                        <td><a href="eliminar.php?id={{$producto->id}}" class="btn btn-danger">Eliminar</a></td>
                        <td><a href="actualizar.php?id={{$producto->id}}" class="btn btn-primary">Actualizar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="../public/login.php" class="btn btn-secondary">Volver</a>

        <form action="insertar.php" method="POST">
            <div class="form-group">
                <label for="nom">Nombre:</label>
                <input type="text" name="nom" class="form-control">
            </div>
            <div class="form-group">
                <label for="des">Descripción:</label>
                <textarea name="des" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="pvp">PVP:</label>
                <input type="number" name="pvp" class="form-control">
            </div>

              <!-- Validación en el lado del servidor -->
             
            <input type="submit" value="Insertar" name="enviar" class="btn btn-success">
        </form>
    </div>
@endsection
