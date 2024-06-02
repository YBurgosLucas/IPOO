<?php
/*15. Un teatro se caracteriza por su nombre y su dirección y en él se realizan 4 funciones al día. Cada función tiene
un nombre y un precio. Realice el diseño de la clase Teatro e indique qué métodos tendría que tener la clase,
teniendo en cuenta que se pueda cambiar el nombre del teatro y la dirección, el nombre de un función y el
precio. Implementar las 4 funciones usando array de array asociativo. Cada función es un array asociativo con
las claves “nombre” y “precio”*/
class Teatro{
    private $nombre;
    private $direccion;
    private $funcion;

    public function __construct($nom, $addres, $func){
        $this->nombre=$nom;
        $this->direccion=$addres;
        $this->funcion=$func;
    }
    
    public function get_nombre(){
        return $this->nombre;
    }
    public function set_nombre($nom){
        $this->nombre=$nom;
    }
    public function get_direccion(){
        return $this->direccion;
    }
    public function set_direccion($addres){
        $this->direccion=$addres;
    }
    public function get_funcion(){
        return $this->funcion;
    }
    public function set_funcion($func){
        $this->funcion=$func;
    }
  
    public function cambioNombreydireccion($nombreNuevo, $direccionNueva){
        $this->set_nombre($nombreNuevo);
        $this->set_direccion($direccionNueva);

    }
    public function cambioFunciones($funcionesNuevas){
        $this->set_funcion($funcionesNuevas);
    }
    public function __toString(){
        
        $cad="nombre Teatro:".$this->get_nombre().
             "\nDireccion: ".$this->get_direccion().
             "\nfunciones:\n funcion 1: nombre:".$this->get_funcion()[0]["nombre"]." y su precio:".$this->get_funcion()[0]["precio"].
             "\n funcion 2: nombre:".$this->get_funcion()[1]["nombre"]." y su precio:".$this->get_funcion()[1]["precio"].
             "\n funcion 3: nombre:".$this->get_funcion()[2]["nombre"]." y su precio:".$this->get_funcion()[2]["precio"].
             "\n funcion 4: nombre:".$this->get_funcion()[3]["nombre"]." y su precio:".$this->get_funcion()[3]["precio"];
        return $cad;
    }

}