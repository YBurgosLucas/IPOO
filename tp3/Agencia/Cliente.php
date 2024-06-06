<?php
    class Cliente {
        private $dni;
        private $tipoDocumento;

        public function __construct( $vdni, $tipoDocumento){
            $this->dni=$vdni;
            $this->tipoDocumento=$tipoDocumento;
        }
        public function getDni(){
            return $this->dni;
        }
        public function getTipoDocumento(){
            return $this->tipoDocumento;
        }
        public function setDni($vdni){
            $this->dni=$vdni;
        }
        public function setTipoDocumento($tipoDocumento){
            $this->tipoDocumento=$tipoDocumento;
        }
        public function __toString(){
            $cad="DNI:".$this->getDni().
                 "\nTipo Documento:".$this->getTipoDocumento();
            return $cad;
        }
    }