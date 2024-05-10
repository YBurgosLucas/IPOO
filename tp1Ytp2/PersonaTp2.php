<?php
/*1. Implementar una clase Persona con los atributos: nombre, apellido, tipo y número de documento.
a) Defina en la clase los siguientes métodos:
*/
    class PersonaTp2{
        private $nombre; 
        private $apellido;
        private $tipo;
        private $nroDocumento;
/*1. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
atributos de la clase. */       
        public function __construct($nom, $apel, $sexo, $DNI){
            $this->nombre=$nom;
            $this->apellido=$apel;
            $this->tipo=$sexo;
            $this->nroDocumento=$DNI;
        }
/*2. Los métodos de acceso de cada uno de los atributos de la clase. */
    //metodos acceso get
        public function getNombre() {
            return $this->nombre;
        }
    
        public function getApellido() {
            return $this->apellido;
        }
    
        public function getTipo() {
            return $this->tipo;
        }
    
        public function getNroDocumento() {
            return $this->nroDocumento;
        }
    // metodos acceso set
    public function setNombre($nom) {
        $this->nombre = $nom;
    }

    public function setApellido($apel) {
        $this->apellido = $apel;
    }

    public function setTipo($sexo) {
        $this->tipo = $sexo;
    }

    public function setNroDocumento($DNI) {
        $this->nroDocumento = $DNI;
    }
/*3. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase. */
    public function __toString(){
        $cad="nombre y apellido: ".$this->getNombre()." ".$this->getApellido().
            "\nTipo: ".$this->getTipo().
            "\nNro.Documento: ".$this->getNroDocumento();
        return $cad;
    }
    }