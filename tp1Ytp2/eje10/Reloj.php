<?php
class reloj{
// atributos
    private $hrs;
    private $min;
    private $seg;

//metodos
    public function __construct($hrs, $min, $seg) {
        $this->horas = $hrs ; 
        $this->minutos = $min;
        $this->segundos = $seg;
        
    }

    public function incremento(){
        $this->segundos ++;
        if($this->segundos == 60){
            $this->segundos = 00;
            $this->minutos++;
            if($this->minutos == 60){
                $this->minutos = 00;
                $this->horas++;
                if($this->horas == 24){
                    $this->horas = 00;
                }
            }   
        }
    }

    public function puesta_a_cero() {
        $this->horas = 00;
        $this->minutos = 00;
        $this->segundos = 00;
    }

//metodos de acceso
// get para retornar el valor 
    public function getHoras(){
        return $this->horas;

    }
// set para resetear 
    public function setHoras(){
        $this->horas=$hrs;
    }

    public function getMin(){
        return $this->minutos;
    }
    public function setMin(){
        $this->minutos=$min;
    }
    public function getSeg(){
        return $this->segundos;

    }
    public function setSeg(){
        $this->segundo=$seg;
    }

public function __toString() {
        return  $this->getHoras().":". $this->getMin().":". $this->getSeg();
    }

}