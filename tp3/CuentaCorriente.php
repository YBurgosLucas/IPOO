<?php
    include "Cuenta.php";
    class CuentaCorriente extends Cuenta{

        private $descubierto;

        public function __construct($vnroCuenta,$vobjCliente,$vsaldo, $descubierto){
            parent::__construct($vnroCuenta,$vobjCliente,$vsaldo);
            $this->descubierto=$descubierto;
        }
        public function getDescubierto(){
            return $this->descubierto;
        }
        public function setDescubierto($descubierto){
            $this->descubierto=$descubierto;
        }
        public function __toString(){

            $cad= parent::__toString();
            $cad.= "\nDescubierto:$".$this->getDescubierto();
            return $cad;
        }
        public function realizarRetiro($monto){
            $descubierto=$this->getDescubierto();
            $respuesta=false;
            if(parent::realizarRetiro($monto) ){
                    $respuesta=true;
            }
            else{
                $saldoActual=$this->getSaldo()-$monto;
                if(($saldoActual*-1)<=$descubierto){
                    $this->setSaldo($saldoActual);
                    $respuesta=true;
                }
                else{
                    $respuesta=false;
                }
            }
            return $respuesta;
        }

    }