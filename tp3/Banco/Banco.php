<?php

    class Banco{
        private $colCuentas;
        private $ultValorCuentaAsignado;
        private $coleCliente;

        public function __construct($colCuentas, $ultValorCuentaAsignado, $coleCliente){
            
            $this->colCuentas=$colCuentas;
            $this->ultValorCuentaAsignado=$ultValorCuentaAsignado;
            $this->coleCliente=$coleCliente;
        }
        public function getColCuentas(){
            return $this->colCuentas;
        }

        public function getUltValorCuenta(){
            return $this->ultValorCuentaAsignado;
        }
        public function getColeCliente(){
            return $this->coleCliente;
        }
        public function setColCuentas($colCuentas){
            $this->colCuentas=$colCuentas;
        }
        public function setUltValorCuenta($ultValorCuentaAsignado){
            $this->ultValorCuentaAsignado=$ultValorCuentaAsignado;
        }
        public function setColeCliente($coleCliente){
            $this->coleCliente=$coleCliente;
        }

        public function retornarCuentas(){
            $cad="";
            $colCuentas=$this->getColCuentas();
            foreach($colCuentas as $unaCuenta){
                $cad.=$unaCuenta."\n";
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
            $cad="\nColeccion de Cuentas:\n".$this->retornarCuentas().
                 "\nUltimo valor asignado:".$this->getUltValorCuenta().
                 "\nColeccion Clientes:\n".$this->retornarCCliente();
            return $cad;
        }

        public function incorporarCliente($objCliente){
            $colecCliente = $this->getColeCliente();
            $i = 0;
            $encontrado = false;
            if(count($colecCliente)>0){
                do{
                    if( $colecCliente[$i] == $objCliente){
                        $encontrado = true;
                    }  
                    $i++;
                }while($i<count($colecCliente) && $encontrado==false);
            }
            if($encontrado == false){
                $j = count($colecCliente);
                $colecCliente[$j] = $objCliente;
                $this->setColeCliente($colecCliente);
                $respuesta = true;
            }else{
                $respuesta = false;
            }
            return $respuesta;
        }

        public function incorporarCuentaCorriente($numCliente,$montoDescubierto){
            $i=0;
            $colCliente=$this->getColeCliente();
            $colCuentas=$this->getColCuentas();
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
                $j=count($colCuentas);
                $objCCorriente=new CuentaCorriente($ultimoValor,$cliente,0,$montoDescubierto);
                $colCuentas[$j]=$objCCorriente;
                $this->setColCuentas($colCuentas);
                $this->setUltValorCuenta($ultimoValor);
                $realizado=true;
            }
            return $realizado;
        }
        public function incorporarCajaAhorro($numCliente){
            $i=0;
            $colCuentas=$this->getColCuentas();
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
                $j=count($colCuentas);
                $objCliente=new CajaAhorro($ultimoValor, $cliente,0);
                $colCuentas[$j]=$objCliente;
                $this->setColCuentas($colCuentas);
                $this->setUltValorCuenta($ultimoValor);
                $realizado=true;
            }
            return $realizado;
        }
        public function realizarDeposito($numCuenta,$monto){
                $i=0;
                $repuesta=false;           
                $colCuentas= $this->getColCuentas();
                while($i<count($colCuentas) && $repuesta==false){
                    if($colCuentas[$i]->getNroCuenta() == $numCuenta){
                        if($colCuentas[$i] instanceof CajaAhorro ){
                            if($colCuentas[$i]->realizarDeposito($monto)){
                           $repuesta=true;  
                            }
                        } 
                          else{
                            $colCuentas[$i]->realizarDeposito($monto);
                            $repuesta=true;
                        }
                    }
                    $i++;
                }    
             return $repuesta;     
            
        }  
        public function realizarRetiro($numCuenta, $monto){ //el num cuenta de CA y CC son los mismos
            $i=0;
            $colCuentas=$this->getColCuentas();
            $respuesta=false;
              while($i<count($colCuentas) && $respuesta== false ){
                    if($colCuentas instanceof CajaAhorro){
                       if($colCuentas[$i]->getNroCuenta() ==$numCuenta && $monto>0 ){
                             if($coleCuentas[$i]->realizarRetiro($monto)){
                                 $respuesta=true;
                             }   
                        } 
                    }
                    else{
                        if($colCuentas[$i]->getNroCuenta()== $numCuenta){
                            if($colCuentas[$i]->realizarRetiro($monto)){
                               $respuesta=true;  
                            }
                        }
                    }
                    
                 $i++;
                }
            if($respuesta==false){
                $saldoRetirado=-1;
            }
            else{
                $saldoRetirado=$monto;
            }
             return $saldoRetirado;

    }
}   