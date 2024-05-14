<?php
    class Rubro{
        private $descripcion;
        private $porcentajeGanancia;

        public function __construct($descripcion, $porcentajeGanancia){
            $this->descripcion=$descripcion;
            $this->porcentajeGanancia=$porcentajeGanancia;

        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function getPortjGanancia(){
            return $this->porcentajeGanancia=$porcentajeGanancia;
        }
        public function setDescripcion($descripcion){
            $this->descripcion=$descripcion;
        }
        public function setPortjGanancia($porcentajeGanancia){
            $this->porcentajeGanancia=$porcentajeGanancia;
        }
        public function __toString(){
            $cad="\nDescripcion:".$this->getDescripcion().
                 "\nPorcentaje de ganancia:".$this->getPortjGanancia()."%";
            return $cad;
        }
    }