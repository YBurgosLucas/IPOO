<?php
    class Inmueble{
        private $codigoReferencia;
        private $numeroPiso;
        private $tipoUso;
        private $costoMensual;
        private $estadoInmueble;
        private $objInquilino;

        public function __construct($codigo, $nropiso, $tipouso, $costomensual, $estadoInmueble, $objInquilino){
            $this->codigoReferencia=$codigo;
            $this->numeroPiso=$nropiso;
            $this->tipoUso=$tipouso;
            $this->costoMensual=$costomensual;
            $this->estadoInmueble=$estadoInmueble;
            $this->objInquilino=$objInquilino;
        }

        //metodos accesos get
        public function getCodigo(){
            return $this->codigoReferencia;
        }
        public function getNroPiso(){
            return $this->numeroPiso;
        }
        public function getTipoUso(){
            return $this->tipoUso;
        }
        public function getCostoMensual(){
            return $this->costoMensual;
        }
        public function getEstadoInmueble(){
            return $this->estadoInmueble;
        }
        public function getObjInquilino(){
            return $this->objInquilino;
        }
        //metodos set
        public function setCodigo($codigo){
            $this->codigoReferencia=$codigo;
        }
        public function setNroPiso($nropiso){
            $this->nroPiso=$nropiso;
        }
        public function setTipoUso($tipouso){
            $this->tipoUso=$tipouso;
        }
        public function setCostoMensual($costomensual){
            $this->costoMensual=$costomensual;
        }
        public function setEstadoInmueble($estadoInmueble){
            $this->estadoInmueble=$estadoInmueble;
        }
        public function setObjInquilino($objInquilino){
            $this->objInquilino=$objInquilino;
        }
        public function __tostring(){
            $cadena="Codigo:".$this->getCodigo().
                    "\nNro Piso:".$this->getNroPiso().
                    "\nTipo de uso:".$this->getTipoUso().
                    "\nCosto mensual: $".$this->getCostoMensual().
                    "\nEstado inmueble:".$this->getEstadoInmueble().
                    "\nInquilino:\n".$this->getObjInquilino();
            return $cadena;
        }

        public function alquilar($obj){
   
            if($this->getObjInquilino() == null){
                $respuesta=True;
                $this->setObjInquilino($obj);
                
            }
            else{
                $respuesta=false;
            }
            return $respuesta;
        }
        public function estaDisponible($tipoUso, $costoMaximo){
          
             if(($this->getObjInquilino()==null)&&($this->getTipoUso()== $tipoUso) && ($this->getEstadoInmueble()) && ($this->getCostoMensual()<=$costoMaximo)){
                    $respuesta=true;
             }
            else{
                    $respuesta=false;
                }       
         return $respuesta;
     }
    } 