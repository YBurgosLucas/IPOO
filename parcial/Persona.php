<?php
class Persona {
    private $tipoDocumento;
    private $nroDocumento;
    private $nombre;
    private $apellido;
    private $telefono;

    public function __construct($tipodocumento, $nrodocumento,$nombre, $apellido, $telefono){
        $this->tipoDocumento=$tipodocumento;
        $this->nroDocumento=$nrodocumento;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->telefono=$telefono;
    }

    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }
    public function getNroDocumento(){
        return $this->nroDocumento;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTipoDocumento($tipodocumento){
        $this->tipoDocumento=$tipodocumento;
    }
    public function setNroDocumento($nrodocumento){
        $this->nroDocumento=$nrodocumento;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }

    public function __toString(){
        $cad="Tipo Dcoumento:".$this->getTipoDocumento().
            "\nNro. Documento:".$this->getNroDocumento().
            "\nNombre y apellido:".$this->getNombre()." ".$this->getApellido().
            "\nTelefono:".$this->getTelefono();
        return $cad;
    }

}