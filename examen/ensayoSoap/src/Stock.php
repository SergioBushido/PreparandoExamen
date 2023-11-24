<?php

namespace Clases;

use \PDO;

require '../vendor/autoload.php';

class Stock extends Conexion
{
    private $producto;
    private $tienda;
    private $unidades;

    public function __construct()
    {
        parent::__construct();
    }

    public function getProducto()
    {
        return $this->producto;
    }

    public function setProducto($producto)
    {
        $this->producto = $producto;
    }

    public function getTienda()
    {
        return $this->tienda;
    }

    public function setTienda($tienda)
    {
        $this->tienda = $tienda;
    }

    public function getUnidades()
    {
        return $this->unidades;
    }

    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;
    }
    
    public function getUnidadesTienda()
{
    $consulta = "SELECT * FROM materiales_informaticos";
    $stmt = self::$conexion->prepare($consulta);
    try {
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return is_array($result) ? $result : [];
    } catch (\PDOException $ex) {
        die("Error al recuperar las unidades: " . $ex->getMessage());
    }
}

}
