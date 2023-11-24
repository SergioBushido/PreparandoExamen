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
      

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th colspan="3" style="text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <tr>
            <td><?php echo e($datosProductos->nombrec); ?></td>
            <td><?php echo e($datosProductos->descripciónc); ?></td>
            <td><?php echo e($datosProductos->pvpc); ?></td>
            <td><a href="eliminar.php?id=<?php echo e($datosProductos->id); ?>" class="btn btn-danger">Eliminar</a></td>
            <td><a href="actualizar.php?id=<?php echo e($datosProductos->id); ?>" class="btn btn-primary">Actualizar</a></td>
        </tr>
            </tbody>
        </table>

        <a href="inicio.php" class="btn btn-secondary">Volver</a>


  <?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>