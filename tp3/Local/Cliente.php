<?php
include_once "Persona.php";
    class Cliente extends Persona{
        private $tipoDocumento;

        public function __construct( $vdni, $vnombre, $vapellido, $tipoDocumento){
            parent::__construct($vdni,$vnombre,$vapellido);
            $this->tipoDocumento=$tipoDocumento;
        }
        public function getTipoDocumento(){
            return $this->$tipoDocumento;
        }
        public function setTipoDocumento($tipoDocumento){
            $this->$tipoDocumento=$tipoDocumento;
        }
        public function __toString(){
            $cad="\ntipo Documento:".$this->getTipoDocumento();
            $cad.=parent::__toString();
            
            return $cad;
        }
    }