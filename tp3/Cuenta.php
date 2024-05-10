<?php
    include "Cliente.php";
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
        public function setObjCliente($objCliente){
            $this->objCliente=$vobjCliente;
        }
        public function setSaldo($vsaldo){
            $this->saldo=$vsaldo;
        }
        public function __toString(){
            $cad="Nro.Cuenta:".$this->getNroCuenta().
                 "\nCliente:".$this->getObjCliente().
                 "\nSaldo:$".$this->getSaldo();
            return $cad;
        }

        public function saldoCuenta(){
            $saldoActual=$this->getSaldo();
            return $saldoActual;
        }

        public function realizarDeposito($monto){
            $realizado=false;
            $saldoActual=$this->getSaldo();
            if($moto>0){
                $saldoDeposito=$saldoActual+$monto;
                $realizado=true;
            }
            $this->setSaldo($saldoDeposito);
            return $realizado;
        }

      
        
    }