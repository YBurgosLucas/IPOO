<?php
/*De los Paquetes Turísticos se almacena fecha desde, cantidad de días, destino, cantidad total
 de plazas y cantidad disponible de plazas.  */   
    class PaquetesTuristicos{
        private $fecha;//desde
        private $cantDias;
        private $destino;
        private $cantTotaldePlazas;
        private $cantDisponiblesPlazas;//private $cantDisponiblesPlazas;El constructor de la clase paquete turístico no recibe como parámetro la cantidad de plazas disponibles, debe ser un valor que se setea con el valor recibido para la cantidad total de plazas del paquete.

        public function __construct($fecha, $cantDias,$destino, $cantTotaldePlazas){
            $this->fecha=$fecha;
            $this->cantDias=$cantDias;
            $this->destino=$destino;
            $this->cantTotaldePlazas=$cantTotaldePlazas;
            $this->cantDisponiblesPlaza=0;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getCantDias(){
            return $this->cantDias;
        }
        public function getdestino(){
            return $this->destino;
        }
        public function getCantTotaldePlazas(){
            return $this->cantTotaldePlazas;
        }
        public function getCantDisponiblePlaza(){
            return $this->cantDisponiblePlaza;
        }
        public function setfecha($fecha){
            $this->fecha=$fecha;
        }
        public function setCantDias($cantDias){
            $this->cantDias=$cantDias;
        }
        public function setDestino($destino){
            $this->destino=$destino;
        }
        public function setCantTotaldePlazas($cantTotaldePlazas){
            $this->canTotaldePlazas=$cantTotaldePlazas;
        }
        public function setCantDisponiblePlaza($cantDisponiblesPlazas){
            $this->cantDisponiblePlaza=$cantDisponiblesPlazas;
        }
        public function __toString(){
            $cad="Fecha:".$this->getFecha().
                 "Cant.Dias:".$this->getCantDias().
                 "\nDestino:".$this->getdestino().
                 "\nCant.Totales de plazas:".$this->getCantTotaldePlazas();
            return $cad;
        }
    }