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
    <a href="../public/productos.php" class="btn btn-primary mb-3">Volver</a>

    <!-- Tabla con la lista de productos -->
    <form action="../public/productos.php" method="POST">
    
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <!-- ... Encabezados de la tabla ... -->
            </tr>
        </thead>
        <tbody>
            @foreach($result as $item)
                <tr class="text-center">
                <td>
                        <input type="text" name="id[]" value="{{$item->id}}" readonly>
                    </td>
                    <td>
                        <input type="text" name="nombre[]" value="{{$item->nombre}}">
                    </td>
                    <td>
                        <input type="text" name="nombre_corto[]" value="{{$item->nombre_corto}}">
                    </td>
                    <td>
                        <input type="text" name="descripcion[]" value="{{$item->descripcion}}">
                    </td>
                    <td>
                        <input type="text" name="precio[]" value="{{$item->precio}}">
                    </td>
                    <td>
                        <input type="text"  value="{{$item->categoria}}"readonly>
                    </td>
                                    <!-- ... si no es foranea esto se borra... -->

                    <td>
                        <select name="categoria[]" class="form-control"  required>
                            @foreach($categorias as $familia)
                                <option value="{{$familia->cod}}">{{$familia->cod}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="submit" name="modificar" value="{{ $item->id }}" class="btn btn-danger">Modificar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>

@endsection
