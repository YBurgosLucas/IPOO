<?php
/*Implementar la clase Agencia que contiene una colección de paquetes turísticos, la colección de ventas
realizadas por la agencia y la colección de ventas On-Line. La clase cuenta con los siguientes
métodos: */
    class Agencia{
        private $colPaqueteTuristico;
        private $colVentasAgencia;
        private $colVentasOnline;

        public function __construct($colPaqueteTuristico, $colVentasAgencia, $colVentasOnline){
            $this->colPaqueteTuristico=$colPaqueteTuristico;
            $this->colVentasAgencia=$colVentasAgencia;
            $this->colVentasOnline=$colVentasOnline;

        }
        public function getColPaqueteTuristico(){
            return $this->colPaqueteTuristico;
        }
        public function getColVentasAgencia(){
            return $this->colVentasAgencia;
        }
        public function getColVentasOnline(){
            return $this->colVentasOnline;
        }
        public function setColPaqueteTuristico($colPaqueteTuristico){
            $this->colPaqueteTuristico=$colPaqueteTuristico;
        }
        public function setColVentasAgencia($colVentasAgencia){
            $this->colVentasAgencia=$colVentasAgencia;
        }
        public function setColVentasOnline($colVentasOnline){
            $this->colVentasOnline=$colVentasOnline;
        }
        public function retornarPaquetesTuristicos(){
            $cad="";
            $colPaqueteTuristico=$this->getColPaqueteTuristico();
            foreach($colPaqueteTuristico as $unPaquete){
                $cad.=$unPaquete."\n";
            }
            return $cad;
        }
        public function retornarVentasAgencia(){
            $cad="";
            $colVentasAgencia=$this->getColVentasAgencia();
            foreach($colVentasAgencia as $unaVenta){
                $cad.=$unaVenta."\n";
            }
            return $cad;
        }
        public function retornarVentasOnline(){
            $cad="";
            $colVentasOnline=$this->getColVentasOnline();
            foreach($colVentasOnline as $unaVenta){
                $cad.=$unaVenta."\n";
            }
            return $cad;
        }
        public function __toString(){
            $cad="COLECCION DE PAQUETES TURISTICOS:\n".$this->retornarPaquetesTuristicos().
                 "\nCOLECCION DE VENTAS DE LA AGENCIA:\n".$this->retornarVentasAgencia().
                 "\nCOLECCION DE VENTAS ONLINE:\n".$this->retornarVentasOnline();
            return $cad;
        }
/* incorporarPaquete(objPaqueteTuristico) :que incorpora a la colección de paquetes turísticos un
nuevo paquete a la agencia siempre y cuando no haya un paquete en la misma fecha al mismo 
destino. Si el paquete pudo ser ingresado el método debe retornar true y false en caso contrario. */
        public function incorporarPaquete($objPaqueteTuristico){
            $encontrado=false;
            $i=0;
            $colPaqueteTuristico=$this->getColPaqueteTuristico();
            while($i<count($colPaqueteTuristico) && $encontrado==False){
                if($colPaqueteTuristico[$i]->getFecha()== $objPaqueteTuristico->getFecha() && $colPaqueteTuristico->getdestino()== $objPaqueteTuristico->getdestino()){
                    $encontrado=true;
                }
                $i++;
            }
            if($encontrado==false){
                $colPaqueteTuristico[]=$objPaqueteTuristico;
                $this->setColPaqueteTuristico($colPaqueteTuristico);
                $encontrado=true;
            }
            return $encontrado;
        }   

/*incorporarVenta(objPaquete,tipoDoc,numDoc,cantPer, esOnLine): método que recibe por parámetro
el paquete, tipo documento, número de documento, la cantidad de personas que van a realizar el
paquete turístico y si se trata o no de una venta on-line (valor true o false). El método retorna el
importe final que debe ser abanado en caso que la venta pudo concretarse con éxito y -1 en caso
contrario.*/
        public function incorporarVenta($objPaquete,$tipoDoc,$numDoc,$cantPer, $esOnLine){
            
            if($esOnLine instanceof VentasOnline){
                if($this->incorporarPaquete($objPaquete)){
                    $objVenta=new VentaOnline($objPaquete, )
                    $resultado=true;

                }
            }
            else if($esOnLine instanceof VentaNormal){
                      if($this->incorporarPaquete($objPaquete)){
                        $resultado=true;
                      }                      
            }
            else{
                $resultado=-1;
            }

        }

}