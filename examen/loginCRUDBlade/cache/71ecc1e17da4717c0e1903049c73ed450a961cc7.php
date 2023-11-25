<?php $__env->startSection('titulo'); ?>
    <?php echo e($titulo); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('encabezado'); ?>
    <?php echo e($encabezado); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
    <a href="inicio.php" class="btn btn-secondary mb-3">Volver</a>

    <form action="actualizar.php" method="POST" class="needs-validation" novalidate>
        <!--actualiza tiene la logica que muestra el prodicto por id-->
        <?php if($actualiza): ?>
            <input type="hidden" name="id" value="<?php echo e($actualiza->id); ?>">

<!--5.1 venimos de operaciones a agregar o quitar los campos del formulario para que coincidan 
con la tabla que estamos atacando de aqui nos vamos a actualizar.php -->

            <div class="form-group">
                <label for="nom">Nombre:</label>
                <input type="text" name="nom" class="form-control" value="<?php echo e($actualiza->nombrec); ?>" required>
                <div class="invalid-feedback">Campo obligatorio</div>
            </div>



            <div class="form-group">
                <label for="des">Descripción:</label>
                <textarea name="des" class="form-control" required><?php echo e($actualiza->descripciónc); ?></textarea>
                <div class="invalid-feedback">Campo obligatorio</div>
            </div>



            <div class="form-group">
                <label for="pvp">PVP:</label>
                <input type="number" name="pvp" class="form-control" value="<?php echo e($actualiza->pvpc); ?>" required>
                <div class="invalid-feedback">Campo obligatorio</div>
            </div>



            <button type="submit" class="btn btn-primary" name="actualizar">Actualizar</button>
        <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>