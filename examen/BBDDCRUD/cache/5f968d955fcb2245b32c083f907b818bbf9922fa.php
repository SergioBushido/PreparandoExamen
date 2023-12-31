<?php $__env->startSection('titulo'); ?>
    <?php echo e($titulo); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('encabezado'); ?>
    <?php echo e($encabezado); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <!-- Formulario para insertar un nuevo producto -->
    <form action="../public/productos.php" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nombre_corto">Nombre Corto:</label>
            <input type="text" name="nombre_corto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" class="form-control" required>
        </div>
        <!-- Dropdown para seleccionar la familia esto es clave para claves foraneas-->
       <!-- Dropdown para seleccionar la familia -->
<div class="form-group">
    <label for="categoria">categoria:</label>
    <select name="categoria" class="form-control" required>
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($categoria->cod); ?>"><?php echo e($categoria->cod); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="inserta">Insertar Producto</button>
     </form>
     <a class="btn btn-primary mt-2" href="../public/productos.php">Volver</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>