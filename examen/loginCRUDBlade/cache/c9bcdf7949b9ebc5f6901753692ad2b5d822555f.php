<!-- Heredamos de la plantilla1 ubicada en la carpeta 'plantillas' -->

<?php $__env->startSection('titulo'); ?>
    <?php echo e($titulo); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('encabezado'); ?>
    <?php echo e($encabezado); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
    <div class="container mt-4">
<!--3.1 adaptamos la tabla a lo que queramos mostrar-->
        <table class="table table-bordered">
            <thead>
                <tr>

                <!--3.1-->
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th colspan="3" style="text-align: center;">Acciones</th>


                </tr>
            </thead>
            <tbody>
            <tr>

            <!--3.1-->
            <td><?php echo e($datos->nombrec); ?></td>
            <td><?php echo e($datos->descripciónc); ?></td>
            <td><?php echo e($datos->pvpc); ?></td>



            <td><a href="eliminar.php?id=<?php echo e($datos->id); ?>" class="btn btn-danger">Eliminar</a></td>
            <td><a href="actualizar.php?id=<?php echo e($datos->id); ?>" class="btn btn-primary">Actualizar</a></td>
        </tr>
            </tbody>
        </table>

        <a href="inicio.php" class="btn btn-secondary">Volver</a>


  <?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>