<?php
    include_once "CuentaCorriente.php";
    include_once "CajaAhorro.php";
    include_once "Cuenta.php";

    class Banco{
        private $coleCCorriente;
        private $coleCAhorro;
        private $ultValorCuentaAsignado;
        private $coleCliente;

        public function __construct($coleCCorriente, $coleCAhorro, $ultValorCuentaAsignado, $coleCliente){
            
            $this->coleCCorriente=$coleCCorriente;
            $this->coleCAhorro=$coleCAhorro;
            $this->ultValorCuentaAsignado=$ultValorCuentaAsignado;
            $this->coleCliente=$coleCliente;
        }
        public function getColCCorriente(){
            return $this->coleCCorriente;
        }
        public function getColCAhorro(){
            return $this->coleCAhorro;
        }
        public function getUltValorCuenta(){
            return $this->ultValorCuentaAsignado;
        }
        public function getColeCliente(){
            return $this->coleCliente;
        }
        public function setColCCorriente($coleCCorriente){
            $this->coleCCorriente=$coleCCorriente;
        }
        public function setColCAhorro($coleCAhorro){
            $this->coleCAhorro=$coleCAhorro;
        }
        public function setUltValorCuenta($ultValorCuentaAsignado){
            $this->ultValorCuentaAsignado=$ultValorCuentaAsignado;
        }
        public function setColeCliente($coleCliente){
            $this->coleCliente=$coleCliente;
        }

        public function retornarCCorriente(){
            $cad="";
            foreach($this->getColCCorriente() as $cCorriente){
                $cad.=$cCorriente."\n";
            }
            return $cad;
        }
        public function retornarCAhorro(){
            $cad="";
            foreach($this->getColCAhorro() as $cAhoro){
                $cad.=$cAhorro."\n";
            }
            return $cad;
        }

        public function retornarCCliente(){
            $cad="";
            foreach($this->getColeCliente() as $cliente){
                $cad.=$cliente."\n";
            }
            return $cad;
        }
        public function __toString(){
            $cad="\nColeccion C.Corriente:\n".$this->retornarCCorriente().
                 "\nColeccion C.Ahorro:\n".$this->retornarCAhorro().
                 "\nUltimo valor asignado:".$this->getUltValorCuenta().
                 "\nColeccion Clientes:\n".$this->retornarCCliente();
            return $cad;
        }

        public function incorporarCliente($objCliente){
            $colCliente=$this->getColeCliente();
            $incorporado=null;
            foreach($colCliente as $cliente){
                if($cliente->getDni() == $objCliente->getDni()){
                    $incorporado=false;
                }
            }
            if($incorporado==null){
                $i=count($colCliente);
                $colCliente[$i]=$objCliente;
                $this->setColeCliente($colCliente);
                $incorporado=true;
            }
            return $incorporado;
        }

        public function incorporarCuentaCorriente($numCliente,$montoDescubierto){
            $colCliente=$this->getColeCliente();
            $colCCorriente=$this->getColCCorriente();
            $clienteE=false;
            $i=0;
            $realizado=false;
            while($i<count($colCliente) && $clienteE==false){
                if($colCliente[$i]->getNroCliente() == $numCliente ){
                    $clienteE=true;
                    $cliente=$colCliente[$i];
                }
                $i++;
            }
            if($clienteE){
                $j=count($colCCorriente);
                $objCCorriente=new CuentaCorriente(($j+1),$cliente,0,$montoDescubierto);
                $colCCorriente[$j]=$objCCorriente;
                $this->setColCCorriente($colCCorriente);
                $realizado=true;
            }
            return $realizado;
        }
        public function realizarRetiro($numCuenta, $monto){
            $i=0;
            $j=0;
            $coleCAhorro=$this->getColCAhorro();
            $colCCorriente=$this->getColCCorriente();
            $numEncontrado=false;
            while($i<count($coleCAhorro) && $numEncontrado==false){
                if($coleCAhorro[$i]->getNroCuenta()== $numCuenta){
                    $numEncontrado=true;
                    
                    
                }

            }
            if($numEncontrado ==false){
                while($j<count($colCCorriente) && $numEncontrado== false){
                    if($colCCorriente[$j]->getNroCuenta()== $numCuenta){
                        $numEncontrado=true;
                        $colCCorriente[$j]->realizarRetiro($monto);
                    }

                }
            }
        }
    }