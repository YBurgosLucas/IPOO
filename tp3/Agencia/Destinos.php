<?php
/*De los Destinos se almacena una identificación, el nombre del lugar y el valor por día en 
 ese destino porpasajero.*/
    class Destino{
        private $identificacion;
        private $nombre;
        private $valorXdia;

        public function __construct($identificacion, $nombre, $valorXdia){
            $this->identificaion=$identificacion;
            $this->nombre=$nombre;
            $this->valorXdia=$valorXdia;
        }
        public function getIdentificacion(){
            return  $this->identificaion;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getValorXdia(){
            return $this->valorXdia;
        }
        public function setIdentificaion($identificacion){
            $this->identificacion=$identificacion;
        }
        public function setNombre($nombre){
            $this->nombre=$nombre;
        }
        public function setValorXdia(){
            $this->valorXdia=$valorXdia;
        }
        public function __toString(){
            $cad="Identificacion:".$this->getIdentificacion().
                 "\nNombre del lugar: ".$this->getNombre().
                "\nValor por dia: $".$this->getValorXdia();
            return $cad;
        }
        
    }