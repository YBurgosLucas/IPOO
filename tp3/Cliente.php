<?php
include "Persona.php";
    class Cliente extends Persona{
        private $nroCliente;

        public function __construct($vnroCliente, $vdni, $vnombre,$vapellido){
            parent::__construct($vdni,$vnombre,$vapellido);
            $this->nroCliente=$vnroCliente;
        }
        public function getNroCliente(){
            return $this->nroCliente;
        }
        public function setNroCliente($vnroCliente){
            $this->nroCliente=$vnroCliente;
        }
        public function __toString(){
            $cad=parent::__toString();
            $cad.="\nNro.Cliente:".$this->getNroCliente();
            return $cad;
        }
    }