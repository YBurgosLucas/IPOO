<?php
include_once "Venta.php";
    class VentasOnline extends Venta{
        private $porcentajeDescuento;

        public function __construct($fecha, $objPaquete, $cantPersonas, $objCliente, $importeFinal, $porcentajeDescuento){
            parent::__construct($fecha, $objPaquete, $cantPersonas, $objCliente, $importeFinal);
            $this->porcentajeDescuento=$porcentajeDescuento;

        }
        public function getPorcentajeDescuento(){
            return $this->porcentajeDescuento;
        }
        public function setPorcentajeDescuento($porcentajeDescuento){
            $this->porcentajeDescuento=$porcentajeDescuento;
        }
        public function __toString(){
            $cad=parent::__toString();
            $cad.="\nPorcentaje de descuento:".$this->getPorcentajeDescuento();
            return $cad;
        }
    }