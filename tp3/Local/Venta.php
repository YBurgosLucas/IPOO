<?php
    class Venta{
        private $fecha;
        private $colProducto;
        private $objCliente;
        private $importeFinal; //una venta normal se calcula en base a la cantidad de productos,


        public function __construct($fecha, $colProducto,$objCliente,$importeFinal){
            $this->fecha=$fecha;
            $this->colProducto=$colProducto;
            $this->objCliente=$objCliente;
            $this->importeFinal=$importeFinal;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getColProducto(){
            return $this->ColProducto;
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
        public function setColProducto($colProducto){
            $this->colProducto=$colProducto;
        }
        public function setObjCliente($objCliente){
            $this->objCliente=$objCliente;
        }
        public function setImporteFinal($importeFinal){
            $this->importeFinal=$importeFinal;
        }
        public function retornarProductos(){
            $cad="";
            $colProducto=$this->getColProducto();
            foreach ($colProducto as $unProducto){
                $cad.=$unProducto."\n";

            }
            return $cad;
        }
        public function __toString(){
            $cad="Fecha:".$this->getFecha().
                "\nProductos:\n".$this->retornarProductos().
                "\nCliente:".$this->getObjCLiente().
                "\nImporte Final:$".$this->getImporteFinal();
            return $cad;
        }
        public function calcularImporteFinal(){
            $colProducto=$this->getColProducto();
            $importeFinal=0;
            foreach($colProducto as $unProducto){
                $importeFinal+=$unProducto->getStock()*($unProducto->darPrecioVenta());
            }
            $this->setImporteFinal($importeFinal);
            return $importeFinal;
        }

    }