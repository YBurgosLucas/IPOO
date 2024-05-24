<?php
include_once "Venta.php";
 class VentaNormal extends Venta{
        private $importeDiaPaquete;
        public function __construct($fecha, $objPaquete, $cantPersonas, $objCliente, $importeDiaPaquete){
            parent::__construct($fecha, $objPaquete, $cantPersonas, $objCliente);
            $this->importeDiaPaquete;
        }
        public function getImporteDiaPaquete(){
            return $this->importeDiaPaquete;
        }
        public function setImporteDiaPaquete($importeDiaPaquete){
            $this->imporDiaPaquete=$importeDiaPaquete;
        }
        public function __toString(){
            $cad=parent::__toString();
            $cad.="\nImporte Del Dia de paquete:$".$this->getImporteDiaPaquete();
            return $cad;
        }
        public function darImporteVenta(){
            $importeFinal=parent::darImporteVenta();
            $importeXDias=$this->getImporteDiaPaquete();
            $importeFinal=$importeDias*$importeFinal;
            return $importeFinal;
        }
 }