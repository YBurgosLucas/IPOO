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
                if($colPaqueteTuristico[$i]->getFecha()== $objPaqueteTuristico->getFecha() && $colPaqueteTuristico[$i]->getdestino()== $objPaqueteTuristico->getdestino()){
                    $encontrado=true;
                }
                $i++;
            }
            if($encontrado==false){// false se incorpora
                $colPaqueteTuristico[]=$objPaqueteTuristico;
                $this->setColPaqueteTuristico($colPaqueteTuristico);
                
            }
            return $encontrado;
        }   

/*incorporarVenta(objPaquete,tipoDoc,numDoc,cantPer, esOnLine): método que recibe por parámetro
el paquete, tipo documento, número de documento, la cantidad de personas que van a realizar el
paquete turístico y si se trata o no de una venta on-line (valor true o false). El método retorna el
importe final que debe ser abanado en caso que la venta pudo concretarse con éxito y -1 en caso
contrario.*/
        public function incorporarVenta($objPaquete,$tipoDoc,$numDoc,$cantPer, $esOnLine){
            $colVentasAgencia=$this->getColVentasAgencia();
            $colVentasOnline=$this->getColVentasOnline();
            $fecha=date("y-m-d");
            $objCliente=new Cliente($numDoc, $tipoDoc);
            $importeFinal=-1;
            if($this->incorporarPaquete($objPaquete)){
                    if($esOnLine ){
                        $venta=new VentasOnline($fecha, $objPaquete, $cantPer, $objCliente, 0 );
                        $importeFinal=$venta->darImporteVenta();
                        $colVentasOnline[]=$venta;
                        $this->setColVentasOnline($colVentasOnline);
                     }
                else{
                    $venta=new Venta($fecha, $objPaquete, $cantPer, $objCliente );
                    $importeFinal=$venta->darImporteVenta();
                    $colVentasAgencia[]=$venta;
                    $this->setColVentasAgencia($colVentasAgencia);
                }
            } 
            return $importeFinal;
        }


/*informarPaquetesTuristicos(fecha,destino): método que retorna una colección con todos los
paquetes que se realizan en una fecha y a un destino. */
public function informarPaquetesTuristicos($fecha, $destino){
    $colPaquetesEncontrados=[];
    $colPaqueteTuristico=$this->getColPaqueteTuristico();
    foreach($colPaqueteTuristico as $unPaquete){
        if($unPaquete->getFecha() == $fecha && $unPaquete->getDetino() == $destino){
            $colPaquetesEncontrados[]=$unPaquete;
        }
    }
    return $colPaquetesEncontrados;
}
/* paqueteMasEcomomico(fecha,destino): método que retorna el paquete turístico mas 
económico para una fecha y un destino. */
 public function paqueteMasEcomomico($fecha, $destino){
    $paqueteMenor=9999;
    $colPaqueteTuristico=$this->getColPaqueteTuristico();
    foreach($colPaqueteTuristico as $unPaquete){
        if($unPaquete->getFecha() == $fecha && $unPaquete->getDestino() == $destino){
            $importe=$unPaquete->darImporteVenta();
            if($importe<$paqueteMenor){
                $paqueteMenor=$importe;
                $paqueteEco=$unPaquete;
            }
        }
    }
    return $paqueteEco;
 }

/*informarConsumoCliente(tipoDoc,numDoc): método que retorna todos los paquetes que
fueron utilizados por la persona identificada con el tipoDoc y numDoc recibidos por
parámetro */
 public function  informarConsumoCliente($tipoDoc, $numDoc){
     $colVentasAgencia=$this->getColVentasAgencia();
     $colVentasOnline=$this->getColVentasOnline();
     $colPaquetesEncontrados=[];
     foreach($colVentasAgencia as $unaVenta){
        if($unaVenta->getObjCliente()->getTipoDocumento() == $tipoDoc && $unaVenta->getObjCLiente()->getDni() == $numDoc){
            $colPaquetesEncontrados[]=$unaVenta;
        }
     }
     foreach($colVentasOnline as $unaVenta){
        if($unaVenta->getObjCliente()->getTipoDocumento() == $tipoDoc && $unaVenta->getObjCLiente()->getDni() == $numDoc){
            $colPaquetesEncontrados[]=$unaVenta;
        }
     }
     return $colPaquetesEncontrados;
    }
/*informarPaquetesMasVendido(anio, n): retorna los n paquetes turísticos mas vendido en el 
año recibido por parámetro. */
    public function informarPaquetesMasVendido($anio, $n){

    }
/*promedioVentasOnLine(): método que retorna el promedio de ventas on-line realizadas por la
agencia.*/
    public function promedioVentasOnLine(){
        $colVentasAgencia=$this->getColVentasAgencia();
        $i=0;
        foreach($colVentasAgencia as $unVenta){
            $acum+=$unaVenta->darImporteVenta();
            $i++;
        }
        $promedio=$acum/$i;
        return $promedio;
    }
/*promedioVentasAgencia(): método que retorna el promedio de ventas on-line realizadas por la
agencia. */
    public function promedioVentasAgencia(){
        $colVentasOnline=$this->getColVentasOnline();
        $i=0;
        foreach($colVentasOnline as $venta){
            $acum+=$venta->darImporteVenta();
            $i++;
        }
        $promedio=$acum/$i;
        return $promedio;
    }
}