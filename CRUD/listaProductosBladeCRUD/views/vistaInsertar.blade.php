@extends('plantillas.plantilla1')

@section('titulo')
    {{$titulo}}
@endsection

@section('encabezado')
    {{$encabezado}}
@endsection

@section('contenido')
    <!-- Formulario para insertar un nuevo producto -->
    <form action="../public/productos.php" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nombre_corto">Nombre Corto:</label>
            <input type="text" name="nombre_corto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pvp">Precio:</label>
            <input type="number" name="pvp" class="form-control" required>
        </div>
        <!-- Dropdown para seleccionar la familia esto es clave para claves foraneas-->
<div class="form-group">
    <label for="familia">Familia:</label>
    <select name="familia" class="form-control" required>
        @foreach($familias as $familia)
            <option value="{{$familia->cod}}">{{$familia->cod}}</option>
        @endforeach
    </select>
</div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="inserta">Insertar Producto</button>
     </form>
     <a class="btn btn-primary mt-2" href="../public/productos.php">Volver</a>
@endsection
