<?php
class fecha{
    private $dia;
    private $mes;
    private $anio;

    public function __construct($a, $b, $c){
        $this->dia = $a;
        $this->mes =$b;
        $this->anio = $c;
    }

    public function getDia(){
        return $this->dia;
    }
    public function getMes(){
        return $this->mes;
    }
    public function getAnio(){
        return $this->anio;
    }
    public function setDia($a){
        return $this->dia = $a;
    }
    public function setMes($b){
        return $this->mes = $b;
    }
    public function setAnio($c){
        return $this->anio = $c;
    }
    public function anioBisiesto($anio){ 
        $respuesta=false;
        if( ( $anio % 4) == 0 && (($anio % 100) !=0 || $anio %400 ==0 ) ){
            $respuesta= true;
        }
        return $respuesta;   
    }
    public function validarFecha() {
        $diasPorMes = array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        if ($this->mes < 1 || $this->mes > 12 || $this->dia < 1 || $this->dia > $diasPorMes[$this->mes]) {
            return false;
        }
        if ($this->mes == 2 && $this->dia == 29 && !$this->anioBisiesto($this->anio)) {
            return false;
        }
        return true;
    }
    public function obtenerFecha(){
        $fecha = -1;
        if ($this->validarFecha()==true){
            $fecha = [$this->getDia(),$this->getMes(),$this->getAnio()];
        }
        return$fecha;
    }
    public function incremento($incDia, $dia, $mes, $anio){
        $respuesta = $this->anioBisiesto($anio);
        for ($i=0; $i< $incDia ; $i++){
            if( $mes == 2 && $respuesta == true ){
               if(($dia+1)< 30){
                   $dia++; 
               }
               else{
                   $dia=1;
                   $mes++;
               }
            }
            elseif($mes==2 && $respuesta == false){
               if(($dia+1)< 29){
                   $dia++;
               }
               else{
                   $dia=1;
                   $mes++;
               }
            }
            else{
                if($mes == 4 || $mes == 6 || $mes == 9 || $mes == 11  ){
                   if(($dia+1) < 31 ){
                       $dia++;
                   }
                   else{
                       $dia=1;
                       $mes++;
                   }
                }
                elseif($mes==12 ){
                   if(($dia +1) <32){
                       $dia++;
                   }
                   else{
                       $dia=1;
                       $mes=1;
                       $anio++;

                   }
                }
                else{
                   if(($dia+1) < 32 ){
                       $dia++;
                   }
                   else{
                       $dia=1;
                       $mes++;
                   }

                }

            }
        }
        $this->setDia($dia);
        $this->setMes($mes);
        $this->setAnio($anio);
    }
    public function __toString(){
        $meses = ["enero", "febrero", "marzo", "abril","mayo",  "junio",
        "julio","agosto", "septiembre",  "octubre", "noviembre","diciembre"];
        $fecha = $this->obtenerFecha();
        if ($fecha== -1) {
            $datoFecha ="Fecha invalida";
        } else {
            $datoFecha = "la fecha abreviada es: ". $fecha[0]."/".$fecha[1]."/".$fecha[2]."\n".
            "la fecha extendida es: ".$fecha[0] . " de " . $meses[$fecha[1] - 1] . " de " . $fecha[2];
        }
        return $datoFecha;
    }
}
