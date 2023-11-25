<!-- Heredamos de la plantilla1 ubicada en la carpeta 'plantillas' -->

<?php $__env->startSection('titulo'); ?>
<?php echo e($titulo); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('encabezado'); ?>
<?php echo e($encabezado); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div class="container mt-4">
    <div class="text-right mb-3">
        <a href="cerrar.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
    <?php
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
?>
    <h1><?php echo e($mensaje); ?></h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <!--1.2 adaptamos el formulario a nuestra tabla
            y nos vamos operaciones.php a por el metodo eliminar(2) -->
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th colspan="3" style="text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
                            <!--1.2 adaptamos el formulario a nuestra tabla-->

            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($info->nombrec); ?></td>
                <td><?php echo e($info->descripciónc); ?></td>
                <td><?php echo e($info->pvpc); ?></td>



                <td><a href="eliminar.php?id=<?php echo e($info->id); ?>" class="btn btn-danger">Eliminar</a></td>
                <td><a href="actualizar.php?id=<?php echo e($info->id); ?>" class="btn btn-primary">Actualizar</a></td>
                <td><a href="mostrar.php?id=<?php echo e($info->id); ?>" class="btn btn-success">Mostrar</a></td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="insertar.php" class="btn btn-success mb-3">Insertar</a>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>