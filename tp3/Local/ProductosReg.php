<?php
    include "Productos.php";
    class ProductoReg extends Productos{
        private $porcentajeDescuento;

        public function __construct($codigoBarra,$descripcion,$stock,$porcentajeIva,$precioCompra,$objRubro,$porcentajeDescuento){
            parent::__construct($codigoBarra,$descripcion,$stock,$porcentajeIva,$precioCompra,$objRubro);
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
            $cad.="\nPorcentaje Descuento:".$this->getPorcentajeDescuento()."%";

            return $cad;
        }
        public function darPrecioVenta(){
            $precio=parent::darPrecioVenta();
            $precioConDescuento=($precio*$this->getPorcentajeDescuento())/100;
            $precioFinal=$precio-$precioConDescuento;
            return $precioFinal;
        }
        
    }