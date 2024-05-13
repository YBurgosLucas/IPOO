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
            foreach($this->getColCAhorro() as $cAhorro){
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
            $i=0;
            $colCliente=$this->getColeCliente();
            $colCCorriente=$this->getColCCorriente();
            $clienteE=false;
            $realizado=false;
            while($i<count($colCliente) && $clienteE==false){
                if($colCliente[$i]->getNroCliente() == $numCliente ){
                    $clienteE=true;
                    $cliente=$colCliente[$i];
                }
                $i++;
            }
            if($clienteE){
                $ultimoValor=$this->getUltValorCuenta()+1;
                $j=count($colCCorriente);
                $objCCorriente=new CuentaCorriente($ultimoValor,$cliente,0,$montoDescubierto);
                $colCCorriente[$j]=$objCCorriente;
                $this->setColCCorriente($colCCorriente);
                $this->setUltValorCuenta($ultimoValor);
                $realizado=true;
            }
            return $realizado;
        }
        public function incorporarCajaAhorro($numCliente){
            $i=0;
            $colCAhorro=$this->getColCAhorro();
            $colCliente=$this->getColeCliente();
            $clienteE=false;
            $realizado=false;
            while($i<count($colCliente) && $clienteE==false){
                if($colCliente[$i]->getNroCliente()== $numCliente){
                    $clienteE=true;
                    $cliente=$colCliente[$i];
                }
                $i++;
            }
            if($clienteE){
                $ultimoValor=$this->getUltValorCuenta()+1;
                $j=count($colCAhorro);
                $objCliente=new CajaAhorro($ultimoValor, $cliente,0);
                $colCAhorro[$j]=$objCliente;
                $this->setColCAhorro($colCAhorro);
                $this->setUltValorCuenta($ultimoValor);
                $realizado=true;
            }
            return $realizado;
        }
        public function realizarDeposito($numCuenta,$monto){
                $i=0;
                $repuesta=false;            
                while($i<count($this->getColCAhorro()) &&$repuesta==false){
                    if($this->getColCAhorro()[$i]->getNroCuenta() == $numCuenta){
                        if($this->getColCAhorro()[$i]->realizarDeposito($monto)){
                           $repuesta=true;  
                        }
                    }
                    $i++;
                }
                $j=0;
                if($repuesta==false){
                    while($j<count($this->getColCCorriente()) && $repuesta==false){
                        if($this->getColCCorriente()[$j]->getNroCuenta()==$numCuenta){
                            if($this->getColCCorriente()[$j]->realizarDeposito($monto)){
                                $repuesta=true;
                            }
                        }
                        $j++;
                    }
                } 
             return $repuesta;     
            }
            
        public function realizarRetiro($numCuenta, $monto){ //el num cuenta de CA y CC son los mismos
            $i=0;
            $coleCAhorro=$this->getColCAhorro();
            $colCCorriente=$this->getColCCorriente();
            $respuesta=false;
              while($i<count($coleCAhorro) && $respuesta== false ){
                    if($coleCAhorro[$i]->getNroCuenta() ==$numCuenta && $monto>0 ){
                       if($coleCAhorro[$i]->realizarRetiro($monto)){
                            $respuesta=true;
                       }   
                    }
                    $i++;
                }
            $j=0;
            if($respuesta==false ){
              while($j<count($colCCorriente) && $respuesta==false){
                    if($colCCorriente[$j]->getNroCuenta()== $numCuenta){
                        if($colCCorriente[$j]->realizarRetiro($monto)){
                           $respuesta=true;  
                        }
                    }
                $j++;
                } 
            }
             return $respuesta;

    }
}   