<?php
    class Persona{
        private $dni;
        private $tipoDocumento;
        private $nombre;
        private $apellido;
    public function __construct($vdni, $tipoDocumento, $vnombre, $vapellido){
        $this->dni=$vdni;
        $this->tipoDocuemtno=$tipoDocumento;
        $this->nombre=$vnombre;
        $this->apellido=$vapellido;
    }
    public function getDni(){
        return $this->dni;
    }
    public function getTipoDocumento(){
        return $this->tipoDocumento;
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
    public function setTipoDocumento($tipoDocumento){
        $this->tipoDocumento=$tipoDocumento;
    }
    public function setNombre($vnombre){
        $this->nombre=$vnombre;
    }
    public function setApellido($vapellido){
        $this->apellido=$vapellido;
    }
    public function __toString(){
        $cad="DNI:".$this->getDni().
             "\nTipo Documento:".$this->getTipoDocumento().
             "\nNombre:".$this->getNombre().
             "\nApellido:".$this->getApellido();
        return $cad;
    }
    
    }