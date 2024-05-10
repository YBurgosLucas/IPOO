<?php
 class Persona{
    private $nomb;
    private $anios;
    private $anioNa;
    private $correo;

    public function __construct($nomb, $anios, $anioNa, $correo){
        $this->nombre=$nomb;
        $this->edad=$anios;
        $this->anioNacimiento=$anioNa;
        $this->email=$correo;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setnombre(){
        $this->nombre=$nomb;
    }

    public function getAnios(){
        return $this->edad;
    }
    public function setAnios(){
        $this->edad=$anios;
    }

    public function getAnioNac(){
        return $this->anioNacimiento;
    }
    public function setAnioNac(){
        $this->anioNacimiento=$anioNa;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail(){
        $this->email=$correo;
    }

    public function __toString(){
        return $this->getNombre()." ".$this->getAnios()." ".$this->getAnioNac()." ".$this->getEmail();
    }
   
 }