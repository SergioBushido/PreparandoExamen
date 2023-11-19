@extends('plantillas.plantilla1')

@section('titulo')
    {{ $titulo }}
@endsection

@section('encabezado')
    {{ $encabezado }}
@endsection

@section('contenido')
<body style="background: gray;">
    <div class="float float-right d-inline-flex mt-2">
        <i class="fa fa-shopping-cart mr-2 fa-2x"></i>
        <?php
        if (isset($_SESSION['cesta'])) {
            $cantidad = count($_SESSION['cesta']);
            echo "<input type='text' disabled class='form-control mr-2 bg-transparent text-white' value='$cantidad' size='2px'>";
        } else {
            echo "<input type='text' disabled class='form-control mr-2 bg-transparent text-white' value='0' size='2px'>";
        }
        ?>
        <i class="fas fa-user mr-3 fa-2x"></i>
        <input type="text" size='10px' value="<?php echo $_SESSION['nombre']; ?>" 
        class="form-control mr-2 bg-transparent text-white" disabled>
        <a href="cerrar.php" class="btn btn-warning mr-2">Cerrar sesión</a>
    </div>
    <br>
    <div class="container mt-3">
        <form class="form-inline" name="vaciar" method="POST" action='<?php echo $_SERVER['PHP_SELF']; ?>'>
            <a href="cesta.php" class="btn btn-success mr-2">Ir a Cesta</a>
            <input type='submit' value='Vaciar Carro' class="btn btn-danger" name="vaciar">
        </form>
        <table class="table table-striped table-dark mt-3 text-center">
            <thead>
                <tr>
                    <th scope="col">Añadir</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Añadido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($productos as $producto) {
                    echo "<tr>";
                    echo "<td>";
                    echo "<form action='{$_SERVER['PHP_SELF']}' method='POST'>";
                    echo "<input type='hidden' name='id' value='{$producto->Id}'>";
                    if (isset($_SESSION['cesta'][$producto->Id])) {
                        echo "<button type='submit' class='btn btn-primary' name='comprar' disabled>";
                        echo "<i class='fas fa-check'></i> Añadido</button>";
                    } else {
                        echo "<button type='submit' class='btn btn-primary' name='comprar'>Añadir</button>";
                    }
                    echo "</form>";
                    echo "</td>";
                    echo "<td>{$producto->nombre}</td>";
                    echo "<td>{$producto->descripcion}</td>";
                    echo "<td>Precio: {$producto->pvp} (€)</td>";
                    echo "<td>";
                    if (isset($_SESSION['cesta'][$producto->Id])) {
                        echo "<i class='fas fa-check-circle fa-2x'></i>";
                    } else {
                        echo "<i class='far fa-times-circle fa-2x'></i>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
@endsection

