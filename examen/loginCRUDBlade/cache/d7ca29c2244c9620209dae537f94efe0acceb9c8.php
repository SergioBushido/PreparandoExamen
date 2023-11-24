<!-- Heredamos de la plantilla1 ubicada en la carpeta 'plantillas' -->


<!-- Definimos la sección 'titulo' y mostramos el valor de la variable $titulo -->
<?php $__env->startSection('titulo'); ?>
<?php echo e($titulo); ?>

<?php $__env->stopSection(); ?>

<!-- Definimos la sección 'encabezado' y mostramos el valor de la variable $encabezado -->
<?php $__env->startSection('encabezado'); ?>
<?php echo e($encabezado); ?>

<?php $__env->stopSection(); ?>

<!-- Definimos la sección 'contenido' -->
<?php $__env->startSection('contenido'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>