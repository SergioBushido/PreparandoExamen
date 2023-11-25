@extends('plantillas.plantilla1')
@section('titulo')
    {{$titulo}}
@endsection
@section('encabezado')
    {{$encabezado}}
@endsection
@section('contenido')
    <a href="inicio.php" class="btn btn-secondary mb-3">Volver</a>

    <form action="actualizar.php" method="POST" class="needs-validation" novalidate>
        <!--actualiza tiene la logica que muestra el prodicto por id-->
        @if($actualiza)
            <input type="hidden" name="id" value="{{$actualiza->id}}">

<!--5.1 venimos de operaciones a agregar o quitar los campos del formulario para que coincidan 
con la tabla que estamos atacando de aqui nos vamos a actualizar.php -->

            <div class="form-group">
                <label for="nom">Nombre:</label>
                <input type="text" name="nom" class="form-control" value="{{$actualiza->nombrec}}" required>
                <div class="invalid-feedback">Campo obligatorio</div>
            </div>



            <div class="form-group">
                <label for="des">Descripción:</label>
                <textarea name="des" class="form-control" required>{{$actualiza->descripciónc}}</textarea>
                <div class="invalid-feedback">Campo obligatorio</div>
            </div>



            <div class="form-group">
                <label for="pvp">PVP:</label>
                <input type="number" name="pvp" class="form-control" value="{{$actualiza->pvpc}}" required>
                <div class="invalid-feedback">Campo obligatorio</div>
            </div>



            <button type="submit" class="btn btn-primary" name="actualizar">Actualizar</button>
        @endif
    </form>

    <script>
        // Evitar que el formulario se envíe si hay campos no válidos
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
