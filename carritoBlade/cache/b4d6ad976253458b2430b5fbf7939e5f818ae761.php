<?php $__env->startSection('titulo'); ?>
    <?php echo e($titulo); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('encabezado'); ?>
    <?php echo e($encabezado); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <div class="container mt-5">
        <div class="float-right mb-3">
            <a href="listado.php" class="btn btn-primary mr-2">Volver a la Tienda</a>
            <a href="pagar.php" class="btn btn-danger">Pagar</a>
        </div>

        <?php if(isset($_SESSION['cesta'])): ?>
            <?php $total = 0; ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio (€)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $_SESSION['cesta']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cesta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($cesta['nombre']); ?></td>
                            <td><?php echo e($cesta['pvp']); ?></td>
                        </tr>
                        <?php $total += $cesta['pvp']; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <hr style='border:none; height:2px; background-color: white;'>

            <h4>Total: <?php echo e($total); ?> €</h4>

        <?php else: ?>
            <p class='card-text'>Tu carrito está vacío.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>