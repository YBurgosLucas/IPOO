<?php
    include "Productos.php";
    class ProductosIm extends Productos{
        private $porcentajeImportado;
        private $porcentajeImpuesto;

        public function __construct($codigoBarra,$descripcion,$stock,$porcentajeIva,$precioCompra,$objRubro,$porcentajeImportado,$porcentajeImpuesto){
            parent::__construct($codigoBarra,$descripcion,$stock,$porcentajeIva,$precioCompra,$objRubro);
            $this->porcentajeImportado=50;
            $this->porcentajeImpuesto=10;
        }
        public function getPorcentajeImportado(){
            return $this->porcentajeImportado;
        }
        public function getPorcentajeImpuesto(){
            return $this->porcentajeImpuesto;
        }
        public function setPorcentajeImportado($porcentajeImportado){
            $this->porcentajeImportado=$porcentajeImportado;
        }
        public function setPorcentajeImpuesto($porcentajeImpuesto){
            $this->porcentajeImpuesto=$porcentajeImpuesto;
        }

        public function __toString(){
            $cad=parent::__toString();
            $cad.="Porcentaje Importado:".$this->getPorcentajeImportado()."%".
                 "\nPorcentaje Impuesto:".$this->getPorcentajeImpuesto()."%";
            return $cad;
        }

        public function darPrecioVenta(){

            $precio=parent::darPrecioVenta();
            $precioImportado=($precio*$this->getPorcentajeImportado())/100;
            $precioImpuesto=($precio*$this->getPorcentajeImpuesto())/100;
            $precioFinal=$precioImportado+$precioImpuesto;
            return $precioFinal;

        }
    }