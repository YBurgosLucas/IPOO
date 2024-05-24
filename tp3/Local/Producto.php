<?php
    include_once "Rubro.php";
    class Producto{
        private $codigoBarra;
        private $descripcion;
        private $stock;
        private $porcentajeIva;
        private $precioCompra;
        private $objRubro;
        public function __construct($codigoBarra,$descripcion,$stock,$porcentajeIva,$precioCompra,$objRubro){
            $this->codigoBarra=$codigoBarra;
            $this->descripcion=$descripcion;
            $this->stock=$stock;
            $this->porcentajeIva=$porcentajeIva;
            $this->precioCompra=$precioCompra;
            $this->objRubro=$objRubro;
        }
        public function getCodigoBarra(){
            return $this->codigoBarra;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function getStock(){
            return $this->porcentajeIva;
        }
        public function getPorcentajeIva(){
            return $this->porcentajeIva;
        }
        public function getPrecioCompra(){
            return $this->precioCompra;
        }
        public function getObjRubro(){
            return $this->objRubro;
        }

        public function setCodigoBarra($codigoBarra){
            $this->codigoBarra=$codigoBarra;
        }
        public function setDescripcion($descripcion){
            $this->descripcion=$descripcion;
        }
        public function setStock($stock){
            $this->stock=$stock;
        }
        public function setPorcentajeIva($porcentajeIva){
            $this->porcentajeIva=$porcentajeIva;
        }
        public function setPrecioCompra($precioCompra){
            $this->precioCompra=$precioCompra;
        }
        public function setObjRubro($objRubro){
            $this->objRubro=$objRubro;
        }
        public function __toString(){
            $cad="Codigo Barra:".$this->getCodigoBarra().
                 "\nDescripcion:".$this->getDescripcion().
                 "\nStock: ".$this->getStock().
                 "\nPorcentaje IVA:".$this->getPorcentajeIva().
                 "\nPrecio Compra:".$this->getPrecioCompra().
                 "\nRubro:".$this->getObjRubro();
            return $cad;     
        }

        public function darPrecioVenta(){
            $precio=$this->getPrecioCompra();
            $porcentajeRubro=($precio*$this->getObjRubro()->getPortjGanancia())/100; //x*porcentaje/100
            $porcentajeIva=($precio*$this->getPorcentajeIva())/100;
            $precioProducto=$precio+$porcentajeIva+$porcentajeRubro;

            return $precioProducto;
        }
    }