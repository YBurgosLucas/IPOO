<?php
    include "Cuenta.php";
    class CuentaCorriente extends Cuenta{
        private $montoMaxima;
        private $descubierto;

        public function __construct($vnroCuenta,$vobjCliente,$vsaldo,$montoMax, $descubierto){
            parent::__construct($vnroCuenta,$vobjCliente,$vsaldo);
            $this->montoMaximo=$montoMax;
            $this->descubierto=$descubierto;
        }
        public function getMontoMax(){
            return $this->montoMaximo;
        }
        public function getDescubierto(){
            return $this->descubierto;
        }
        public function setMontoMax($montoMax){
            $this->montoMaximo=$montoMax;
        }
        public function setDescubierto($descubierto){
            $this->descubierto=$descubierto;
        }
        public function __toString(){
            $cad= parent::__toString();
            $cad.="\nMonto Maximo: $".$this->getMontoMax().
                 "\nDescubierto: ".$this->getDescubierto();
            return $cad;
        }


    }