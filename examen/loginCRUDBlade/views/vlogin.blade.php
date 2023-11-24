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
    
    <form action="" method="POST" class="form" style="max-width: 300px; margin: auto;">
    
        <div class="form-group">
            <label for="nombre"><i class="fas fa-user"></i> Nombre:</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="pass"><i class="fas fa-key"></i> Password:</label>
            <input type="password" name="pass" class="form-control">
        </div>
        <input type="submit" value="Entrar" class="btn btn-primary btn-block">
    </form>

</div>
@endsection