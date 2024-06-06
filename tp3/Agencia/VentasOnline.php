<?php
include_once "Venta.php";
    class VentasOnline extends Venta{
        private $porcentajeDescuento;

        public function __construct($fecha, $objPaquete, $cantPersonas, $objCliente, $porcentajeDescuento){
            parent::__construct($fecha, $objPaquete, $cantPersonas, $objCliente);
            $this->porcentajeDescuento=$porcentajeDescuento ??  20;

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
        public function darImporteVenta(){
            $importeFinal=parent::darImporteVenta();
            $porcentajeDescuento=$this->getPorcentajeDescuento();
            $precioDescuento=$importeFinal+(($importeFinal*$porcentajeDescuento)/100);
            $importeFinal=$importeFinal-$porcentajeDescuento;
            return $importeFinal;
        }


    }