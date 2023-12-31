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
            <label for="precio">Precio:</label>
            <input type="number" name="precio" class="form-control" required>
        </div>
        <!-- Dropdown para seleccionar la familia esto es clave para claves foraneas-->
       <!-- Dropdown para seleccionar la familia -->
<div class="form-group">
    <label for="categoria">categoria:</label>
    <select name="categoria" class="form-control" required>
        @foreach($categorias as $categoria)
            <option value="{{$categoria->cod}}">{{$categoria->cod}}</option>
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
