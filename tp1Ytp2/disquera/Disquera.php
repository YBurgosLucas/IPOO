<?php
/*2. Implementar una clase Disquera con los atributos: hora_desde y hora_hasta (que indican el horario de
atención de la tienda), estado (abierta o cerrada), dirección y dueño. El atributo dueño debe referenciar a un
objeto de la clase Persona implementada en el punto 1. Defina en la clase los siguientes métodos:
 */
 class Disquera{
    private $horaDesde;
    private $horaHasta;
    private $estado;
    private $direccion;
    private $dueño;
/*a) Método constructor _ _construct () que recibe como parámetros los valores iniciales para los atributos
de la clase. */
    public function __construct($hrDesde, $hrHasta, $condicion, $addres, $propietario){
        $this->horaDesde= $hrDesde;
        $this->horaHasta= $hrHasta; 
        $this->estado= $condicion;
        $this->direccion=$addres;
        $this->dueño= $propietario;
    }
/*b) Los métodos de acceso de cada uno de los atributos de la clase. */
// metodos get
    public function getHoraDesde() {
        return $this->horaDesde;
    }

    public function getHoraHasta() {
        return $this->horaHasta;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getDueño() {
        return $this->dueño;
    }
//metodos set
    public function setHoraDesde($hrDesde) {
         $this->horaDesde = $hrDesde;
    }

    public function setHoraHasta($hrHasta) {
        $this->horaHasta = $hrHasta;
    }

    public function setEstado($condicion) {
        $this->estado = $condicion;
    }

    public function setDireccion($addres){
        $this->direccion=$addres;
    }

    public function setDueño($propietario) {
        $this->dueño = $propietario;
    }
/*c) dentroHorarioAtencion($hora,$minutos): que dada una hora y minutos retorna true si la tienda debe
encontrarse abierta en ese horario y false en caso contrario. */
  public function dentroHorarioAtencion($hora, $minutos){

        if( ($hora>=$this->getHoraDesde() && $hora<=$this->getHoraHasta() ) &&  ($minutos >= 0 && $minutos <=59) ){
            $respuesta=true;
        }
        else{
             $respuesta=false;
             }
     return $respuesta;
    
  }
/*d) abrirDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra dentro del
horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura. */
    public function abrirDisquera($hora, $minutos){
        $dentroHorariodeAtencion=$this->dentroHorarioAtencion($hora, $minutos);
        if($dentroHorariodeAtencion ){
           $result= "abierto";
           $respuesta=true;
        }
        else{
            $result="cerado";
            $respuesta=false;
         }
        $this->setEstado($result);
        return $respuesta;
}
/*e) cerrarDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra fuera del
horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre. */
    public function cerrarDisquera($hora,$minutos){
        $dentroHorariodeAtencion=$this->dentroHorarioAtencion($hora, $minutos);
        if($dentroHorariodeAtencion ){
           $result= "abierto";
           $respuesta=true;
        }
        else{
            $result="cerado";
            $respuesta=false;
         }
        $this->setEstado($result);
        return $respuesta;
    } 
    public function __toString(){
        $cad= "Disquera:\nAbierto desde ".$this->getHoraDesde()."am y Cerrado hasta ".$this->getHoraHasta().
              "pm\nDireccion: ".$this->getDireccion().
              "\nEstado: ".$this->getEstado().
              "\nDueño:\n".$this->getDueño(); 
        return $cad;
    }
 }
