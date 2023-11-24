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
    <!-- Agrega una tabla para mostrar los datos con estilos de Bootstrap -->
    <div class="text-right mb-3">
        <a href="cerrar.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
   

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
            <?php $__currentLoopData = $datosProductos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($producto->nombrec); ?></td>
                <td><?php echo e($producto->descripciónc); ?></td>
                <td><?php echo e($producto->pvpc); ?></td>
                <td><a href="eliminar.php?id=<?php echo e($producto->id); ?>" class="btn btn-danger">Eliminar</a></td>
                <td><a href="actualizar.php?id=<?php echo e($producto->id); ?>" class="btn btn-primary">Actualizar</a></td>
                <td><a href="mostrar.php?id=<?php echo e($producto->id); ?>" class="btn btn-success">Mostrar</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="insertar.php" class="btn btn-success mb-3">Insertar</a>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>