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
    <a href="../public/productos.php" class="btn btn-primary mb-3">Volver</a>

    <!-- Tabla con la lista de productos -->
    <form action="../public/productos.php" method="POST">
    
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <!-- ... Encabezados de la tabla ... -->
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-center">
                <td>
                        <input type="text" name="id[]" value="<?php echo e($item->id); ?>" readonly>
                    </td>
                    <td>
                        <input type="text" name="nombre[]" value="<?php echo e($item->nombre); ?>">
                    </td>
                    <td>
                        <input type="text" name="nombre_corto[]" value="<?php echo e($item->nombre_corto); ?>">
                    </td>
                    <td>
                        <input type="text" name="descripcion[]" value="<?php echo e($item->descripcion); ?>">
                    </td>
                    <td>
                        <input type="text" name="pvp[]" value="<?php echo e($item->pvp); ?>">
                    </td>
                    <td>
                        <select name="familia[]" class="form-control"  required>
                            <?php $__currentLoopData = $familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $familia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($familia->cod); ?>"><?php echo e($familia->cod); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td>
                        <button type="submit" name="modificar" value="<?php echo e($item->id); ?>" class="btn btn-danger">Modificar</button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>