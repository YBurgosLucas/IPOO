<?php
//Diseñar e implementar la clase Fecha. La clase deberá disponer de los atributos mínimos y 
//necesarios para almacenar el día, el mes y el año, además de métodos que devuelvan un String con la
/*fecha en forma abreviada (16/02/2000) y extendida (16 de febrero de 2000) . Implementar una función 
incremento, que reciba como parámetros un entero y una fecha, que retorne una nueva fecha, resultado 
de incrementar la fecha recibida por parámetro en el numero de días definido por el parámetro entero.
Nota 1: Son años bisiestos los múltiplos de cuatro que no lo son de cien, salvo que lo sean de
cuatrocientos, en cuyo caso si son bisiestos.
Nota 2: Para la solución de este problema puede ser útil definir un método incrementa_un_dia.*/
class Fecha{
     private $dia;
     private $mes;
     private $anio;
//metodos de acceso
     public function __construct($dia, $mes, $anio){
            $this->dia=$dia;
            $this->mes=$mes;
            $this->anio=$anio;
     }

     public function getDia(){
        return $this->dia;
     }
     public function setDia($dia){
        $this->dia=$dia;
     }

     public function getMes(){
        return $this->mes;
     }
     public function setMes($mes){
        $this->mes=$mes;
     }

     public function getAnio(){
        return $this->anio;
     }
     public function setAnio($anio){
        $this->anio=$anio;
     }
    
     public function fechaExtendida(){
        $this->getDia();
        $this->getMes();
        $this->getAnio();
        $meses=[1=>"enero", 2=>"febrero",3=> "marzo", 4=>"abril", 5=>"mayo", 6=>"junio", 7=>"julio", 8=>"agosto", 9=>"septiembre",
        10=> "octubre",11=> "noviembre", 12=>"diciembre"];

        return "(".$this->getDia()."/".$meses[$this->getMes()]."/".$this->getAnio().")";
     }
     public function __toString(){
        return "(".$this->getDia()."/".$this->getMes()."/".$this->getAnio().")";
     }

     public function anioBisiesto($anio){
         $result=false;
        if(($anio % 4)== 0 && ($anio % 100)!= 0 || ($anio % 400)== 0 ){
            $result=true;
        }
        return $result; 
     }
     public function incremento($int, $dia, $mes, $anio){
      
        $finDelMes=[0, 31, 28, 31, 30, 31, 30, 31, 31, 30 ,31 , 30, 31 ];

        for($i=0;  $i<$int ; $i++){
         if ($this->anioBisiesto($anio)== true){
            $finDelMes[2]=29;
            if($mes ==2 ){
             $dia=1;
             $dia++;
             $mes++;
            }
         }
         else{
            if( $mes == 2  ){
            $dia=1;
            $finDelMes[2]=28;
            $mes++;
             }
            elseif( $mes==12 && $dia==31){
              $dia=1;
              $mes=1;
              $anio++; 
             }
            else{
               $dia++;
             }
          }
       }
      
       $this->setDia($dia);
       $this->setMes($mes);
       $this->setAnio($anio);  
   }
}