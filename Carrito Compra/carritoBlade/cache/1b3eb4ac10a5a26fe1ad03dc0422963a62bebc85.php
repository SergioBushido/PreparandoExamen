<?php $__env->startSection('titulo'); ?>
    <?php echo e($titulo); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('encabezado'); ?>
    <?php echo e($encabezado); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="container mt-5">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <!--Muestra el formulario de Usuario y contraseña con font awesome-->
                    <form name='login' method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <!--Esto agrega el emoti de fontawesome-->
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Usuario" name='usuario' required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Contraseña" name='pass' required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right btn-success" name='login'>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <?php
        //Sesion creada en la parte superior si no hay exito en el login
        if (isset($_SESSION['error'])) {
            echo "<div class='mt-3 text-danger font-weight-bold text-lg'>";
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            echo "</div>";
        }
        ?>
    </div>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>