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
    <!-- Botón para iniciar el proceso de inserción -->
    <a href="?insert" class="btn btn-primary mb-3">Insertar Nuevo Producto</a>

    <!-- Tabla con la lista de productos -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nombre Corto</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $item)
                <tr class="text-center">
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->nombre_corto}}</td>
                    @if($item->pvp > 100)
                        <td class='text-danger'>{{$item->pvp}}</td>
                    @else
                        <td class='text-success'>{{$item->pvp}}</td>    
                    @endif
                    <td>
                        <a href="?eliminar={{ $item->id }}"
                           onclick="return confirm('¿Estás seguro de eliminar este producto?')"
                           class="btn btn-danger">Eliminar</a>
                    </td>
                    <td>
                        <a href="?mostrar={{ $item->id }}" class="btn btn-success">Mostrar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
