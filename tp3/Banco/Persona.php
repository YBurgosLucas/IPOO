<?php
    class Persona{
        private $dni;
        private $nombre;
        private $apellido;
    public function __construct($vdni, $vnombre, $vapellido){
        $this->dni=$vdni;
        $this->nombre=$vnombre;
        $this->apellido=$vapellido;
    }
    public function getDni(){
        return $this->dni;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setDni($vdni){
        $this->dni=$vdni;
    }
    public function setNombre($vnombre){
        $this->nombre=$vnombre;
    }
    public function setApellido($vapellido){
        $this->apellido=$vapellido;
    }
    public function __toString(){
        $cad="DNI:".$this->getDni().
             "\nNombre:".$this->getNombre().
             "\nApellido:".$this->getApellido();
        return $cad;
    }
    
    }