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
    <!-- Botón para iniciar el proceso de inserción -->
    <a href="?insert" class="btn btn-primary mb-3">Insertar Nuevo Producto</a>

    <!-- Tabla con la lista de productos -->
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nombre Corto</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-center">
                    <th scope="row"><?php echo e($item->id); ?></th>
                    <td><?php echo e($item->nombre); ?></td>
                    <td><?php echo e($item->nombre_corto); ?></td>
                    <td><?php echo e($item->precio); ?></td>
                   
                    <td>
                        <a href="?eliminar=<?php echo e($item->id); ?>"
                           onclick="return confirm('¿Estás seguro de eliminar este producto?')"
                           class="btn btn-danger">Eliminar</a>
                    </td>
                    <td>
                        <a href="?mostrar=<?php echo e($item->id); ?>" class="btn btn-success">Mostrar</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>