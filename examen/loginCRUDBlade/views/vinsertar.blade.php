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
        <a href="inicio.php" class="btn btn-secondary">Volver</a>
        

<!--4.1 El formulario se envia a insertar.php-->
        <form action="" method="POST">
            <div class="form-group">

<!--4.1 agregamos o quitamos campos de la nueva tabla
depues vamos a insertar.php y agregamos los campos del formulario-->

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
             
            <input type="submit" value="Insertar" name="insertar" class="btn btn-success">
        </form>
    </div>
@endsection
