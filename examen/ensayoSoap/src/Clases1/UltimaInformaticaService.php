<?php

namespace Clases\Clases1;

class UltimaInformaticaService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'getMaterialInformaticoRequest' => 'Clases\\Clases1\\getMaterialInformaticoRequest',
  'getMaterialInformaticoResponse' => 'Clases\\Clases1\\getMaterialInformaticoResponse',
  'MaterialInformatico' => 'Clases\\Clases1\\MaterialInformatico',
);

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = null)
    {
      foreach (self::$classmap as $key => $value) {
        if (!isset($options['classmap'][$key])) {
          $options['classmap'][$key] = $value;
        }
      }
      $options = array_merge(array (
  'features' => 1,
), $options);
      if (!$wsdl) {
        $wsdl = 'http://localhost/examenTareas/examen/ensayoSOAP/servidorSoap/ultima.wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param getMaterialInformaticoRequest $parameters
     * @return getMaterialInformaticoResponse
     */
    public function getMaterialInformatico(getMaterialInformaticoRequest $parameters)
    {
      return $this->__soapCall('getMaterialInformatico', array($parameters));
    }

}
