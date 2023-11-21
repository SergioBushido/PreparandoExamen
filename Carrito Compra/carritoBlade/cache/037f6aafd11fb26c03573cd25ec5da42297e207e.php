<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <title><?php echo $__env->yieldContent('titulo'); ?></title>
</head>
<body style="background:#0277bd">
<div class="container mt-3">
    <h3 class="text-center mt-3 mb-3"><?php echo $__env->yieldContent('encabezado'); ?></h3>
    <?php echo $__env->yieldContent('contenido'); ?>
</div>
 <!-- Bootstrap JavaScript -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-pzjw8+ua5KlX6a5zKE5b3uvmKcSAwiE8A6zjsJZ8Ck9aQ8z8Bx6jlikF5FaDO8SO"
        crossorigin="anonymous"></script>
</body>
</html>
