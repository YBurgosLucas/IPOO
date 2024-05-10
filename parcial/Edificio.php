<?php
class Edificio{
    private $direccion;
    private $coleccionInmuebles;
    private $objAdministrador;

    public function __construct($direccion, $coleccionInmuebles, $objAdministrador){
        $this->direccion=$direccion;
        $this->coleccionInmuebles=$coleccionInmuebles;
        $this->objAdministrador=$objAdministrador;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getColeccionInmuebles(){
        return $this->coleccionInmuebles;
    }
    public function getObjAdministrador(){
        return $this->objAdministrador;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }
    public function setColeccionInmuebles($coleccionInmuebles){
        $this->coleccionInmuebles=$coleccionInmuebles;
    }
    public function setObjAdministrador($objAdministrador){
        $this->objAdministrador=$objAdministrador;
    }
    public function retornarColeccion(){
        $cad="";
        foreach($this->getColeccionInmuebles() as $inmuebles){
            $cad.=$inmuebles."\n";
        }
        return $cad;
    }
    public function __toString(){
        $cadena="Direccion:".$this->getDireccion().
                "\nColeccion inmuebles:\n".$this->retornarColeccion().
                "\nCant. total  inmuebles:".count($this->getColeccionInmuebles()).
                "\nAdministrador:\n".$this->getObjAdministrador();
        return $cadena;
    }

    public function darInmueblesDisponibles($tipoUso, $costoMensualMax){
        $colecInmDisponible=[];
        foreach ($this->getColeccionInmuebles() as $unInmueble){
            if($unInmueble->getObjInquilino() ==null ){
                if(($unInmueble->getTipoUso()== $tipoUso)&& $unInmueble->getCostoMensual()<=$costoMensualMax){
                    $i=count($colecInmDisponible);
                    $colecInmDisponible[$i]=$unInmueble;
                }
            }
        }
        return $colecInmDisponible;
    }
    public function  buscarInmueble($objInmueble){
        $resultado=-1;
        foreach ($this->getColeccionInmuebles() as $indice => $unInmueble) {
            if($unInmueble->getCodigo() == $objInmueble->getCodigo()){
                $resultado=$indice;
            }  
        }
        return $resultado;
    }

    public function registrarAlquilerInmueble($tipoUso, $costoMensualMax, $objPersona){//encontrar primer inmueble disponible y de ahi comparar si ese inmueble es el indicado que buscan los inquilinos
     
     
     
     
     
     
     
     
     
     
     
     
        /*$respueta=false;
        $colec=[];
        foreach($this->getColeccionInmuebles() as $unInmueble){
            if($unInmueble->getObjInquilino()== null){
                $i=count($colec);
                $colec[$i]=$unInmueble;
            }
        }
        $inmueble=$colec[0];
        if(($inmueble->getTipoUso()== $tipoUso) && $inmueble->getCostoMensual()<=$costoMensualMax){
            $inmueble->alquilar($objPersona);
            $respueta=true;
        }
        
        return $respueta;*/
    }

    public function calculaCostoEdificio(){
        $costo=0;
        foreach($this->getColeccionInmuebles() as $unIm){
            if($unIm->getObjInquilino()!= null){
                $costo+=$unIm->getCostoMensual();
            }
        }
        return $costo;
    }
}