<?php
    class Venta{
        private $fecha;
        private $objProducto;
        private $objCliente;
        private $importeFinal; //una venta normal se calcula en base a la cantidad de productos,


        public function __construct($fecha, $objProducto,$objCliente,$importeFinal){
            $this->fecha=$fecha;
            $this->objProducto=$objProducto;
            $this->objCliente=$objCliente;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getObjProducto(){
            return $this->objProducto;
        }
        public function getObjCLiente(){
            return $this->objCliente;
        }
        public function getImporteFinal(){
            return $this->importeFinal;
        }
        public function setFecha($fecha){
            $this->fecha=$fecha;
        }
        public function setObjProducto($objProducto){
            $this->objProducto=$objProducto;
        }
        public function setObjCliente($objCliente){
            $this->objCliente=$objCliente;
        }

    }