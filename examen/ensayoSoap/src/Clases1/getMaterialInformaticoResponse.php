<?php

namespace Clases\Clases1;

class getMaterialInformaticoResponse
{

    /**
     * @var MaterialInformatico $material
     */
    protected $material = null;

    /**
     * @param MaterialInformatico $material
     */
    public function __construct($material)
    {
      $this->material = $material;
    }

    /**
     * @return MaterialInformatico
     */
    public function getMaterial()
    {
      return $this->material;
    }

    /**
     * @param MaterialInformatico $material
     * @return \Clases\Clases1\getMaterialInformaticoResponse
     */
    public function setMaterial($material)
    {
      $this->material = $material;
      return $this;
    }

}
