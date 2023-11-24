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
    <a href="mostrar.php" class="btn btn-secondary mb-3">Volver</a>

    <form action="actualizar.php" method="POST" class="needs-validation" novalidate>
        @if($actualiza)
            <input type="hidden" name="id" value="{{$actualiza->id}}">

            <div class="form-group">
                <label for="nom">Nombre:</label>
                <input type="text" name="nom" class="form-control" value="{{$actualiza->nombre}}" required>
                <div class="invalid-feedback">Campo obligatorio</div>
            </div>

            <div class="form-group">
                <label for="des">Descripción:</label>
                <textarea name="des" class="form-control" required>{{$actualiza->descripción}}</textarea>
                <div class="invalid-feedback">Campo obligatorio</div>
            </div>

            <div class="form-group">
                <label for="pvp">PVP:</label>
                <input type="number" name="pvp" class="form-control" value="{{$actualiza->pvp}}" required>
                <div class="invalid-feedback">Campo obligatorio</div>
            </div>

            <button type="submit" class="btn btn-primary" name="actualizar">Enviar</button>
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
