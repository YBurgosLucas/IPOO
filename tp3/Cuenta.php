<?php
    class Cuenta{
        private $nroCuenta;
        private $objCliente;
        private $saldo;

        public function __construct($vnroCuenta,$vobjCliente,$vsaldo){
            $this->nroCuenta=$vnroCuenta;
            $this->objCliente=$vobjCliente;
            $this->saldo=$vsaldo;
        }
        public function getNroCuenta(){
            return $this->nroCuenta;
        }
        public function getObjCliente(){
            return $this->objCliente;
        }
        public function getSaldo(){
            return $this->saldo;
        }
        public function setNroCuenta($vnroCuenta){
            $this->nroCuenta=$vnroCuenta;
        }
        public function setObjCliente($vobjCliente){
            $this->objCliente=$vobjCliente;
        }
        public function setSaldo($vsaldo){
            $this->saldo=$vsaldo;
        }
        public function __toString(){
            $cad="\nNro.Cuenta:".$this->getNroCuenta().
                 "\nCliente:".$this->getObjCliente().
                 "\nSaldo:$".$this->getSaldo();
            return $cad;
        }

        public function saldoCuenta(){
            return $this->getSaldo();
        }

        public function realizarDeposito($monto){
            $saldoActual=$this->getSaldo();
            $saldoDeposito=$saldoActual+$monto;
            $this->setSaldo($saldoDeposito);
            $realizado=$saldoDeposito!=$saldoActual;
            return $realizado;
        }

        public function realizarRetiro($monto){
            $saldoActual=$this->getSaldo();
            $respuesta=false;
            if($saldoActual >0 && $monto<=$saldoActual){
                $montoRetirado=$saldoActual-$monto;
                $respuesta=true;
                $this->setSaldo($montoRetirado);
            }
            
            return $respuesta;
        }
      
        
    }