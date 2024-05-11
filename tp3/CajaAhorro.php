<?php
include_once "Cuenta.php";
    class CajaAhorro extends Cuenta{
        public function __construct($vnroCuenta,$vobjCliente,$vsaldo){
            parent::__construct($vnroCuenta,$vobjCliente,$vsaldo);
        }
        public function __toString(){
            $cad=parent::__toString();
            return $cad;
        }
        
    }