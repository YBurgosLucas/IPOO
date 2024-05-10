<?php
include "Cuenta.php";
    class CajaAhorro extends Cuenta{
        private $interese;

        public function __construct($vnroCuenta,$vobjCliente,$vsaldo,$vinterese){
            parent::__construct($vnroCuenta,$vobjCliente,$vsaldo);
            $this->interese=$vinterese;
        }
        public function getInterese(){
            return $this->interese;
        }
        public function setInterese(){
            $this->interese=$vinterese;
        }
        public function __toString(){
            $cad=parent::__toString();
            $cad.="\nInterese:".$this->getInterese();
            return $cad;
        }
    
    }