<?php

namespace Clases\Clases1;

class MaterialInformatico
{

    /**
     * @var int $id
     */
    protected $id = null;

    /**
     * @var string $nombre
     */
    protected $nombre = null;

    /**
     * @var string $descripcion
     */
    protected $descripcion = null;

    /**
     * @param int $id
     * @param string $nombre
     * @param string $descripcion
     */
    public function __construct($id, $nombre, $descripcion)
    {
      $this->id = $id;
      $this->nombre = $nombre;
      $this->descripcion = $descripcion;
    }

    /**
     * @return int
     */
    public function getId()
    {
      return $this->id;
    }

    /**
     * @param int $id
     * @return \Clases\Clases1\MaterialInformatico
     */
    public function setId($id)
    {
      $this->id = $id;
      return $this;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
      return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return \Clases\Clases1\MaterialInformatico
     */
    public function setNombre($nombre)
    {
      $this->nombre = $nombre;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
      return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return \Clases\Clases1\MaterialInformatico
     */
    public function setDescripcion($descripcion)
    {
      $this->descripcion = $descripcion;
      return $this;
    }

}
