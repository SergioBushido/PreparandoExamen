<!-- Heredamos de la plantilla1 ubicada en la carpeta 'plantillas' -->

<?php $__env->startSection('titulo'); ?>
    <?php echo e($titulo); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('encabezado'); ?>
    <?php echo e($encabezado); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>