<?php

namespace Clases;

use PDO;
use PDOException;

class Categorias extends Conexion
{
    private $cod;
    private $nombre;

    public function __construct()
    {
        parent::__construct();

    }

    public function recuperarCategorias()
    {
        $consulta = "select * from categorias";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar: " . $ex->getMessage());
        }
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
