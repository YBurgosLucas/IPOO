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
            $saldoActual=0;
            if($this->getSaldo() <=0  && $monto<=$descubierto  ){
                    $saldoActual=$this->getSaldo()-$saldoActual;
                    $this->setSaldo($saldoActual);
                    $respuesta=true;

            }
            else{
                parent::realizarRetiro($monto);
                $respuesta=true;
            }
            return $respuesta;
        }

    }