<?php
include "Persona.php";
    class Cliente extends Persona{
        private $nroCliente;

        public function __construct( $vdni, $vnombre, $vapellido, $vnroCliente){
            parent::__construct($vdni, $tipoDocumento, $vnombre,$vapellido);
            $this->nroCliente=$vnroCliente;
        }
        public function __toString(){
            $cad=parent::__toString();
            return $cad;
        }
    }