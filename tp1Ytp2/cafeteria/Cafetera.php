<?php
/*. Desarrollar una clase Cafetera con los atributos capacidadMaxima (la cantidad máxima de café que puede
contener la cafetera) y cantidadActual (la cantidad actual de café que hay en la cafetera). Implementar los
siguientes métodos:
 */
class Cafetera{
    private $capacidadMax;
    private $cantidadActual;
/*13.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
atributos de la clase.*/

    public function __construct($capMax, $canActual){
        $this->capacidadMax=$capMax;
        $this->cantidadActual=$canActual;

    }
/*13.b. Los método de acceso de cada uno de los atributos de la clase.*/
    public function get_CapacidadMax(){
        return $this->capacidadMax;
    }
    public function set_CapacidadMax($capMax){
        $this->capacidadMax=$capMax;
    }
    public function get_CantidadActual(){
        return $this->cantidadActual;
    }
    public function set_CantidadActual($canActual){
        $this->cantidadActual=$canActual;
    }
/*13.c. llenarCafetera(): la cantidad actual debe ser igual a la capacidad de la cafetera.*/
    public function llenarCafetera(){

       $this->set_CantidadActual($this->get_CapacidadMax());
         
    }
/* 13.d. servirTaza($cantidad): simula la acción de servir una taza con la capacidad indicada. Si la
    cantidad actual de café “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje
    al consumidor para que sepa porque no se le sirvió un taza completa*/
    public function servirTaza($cantidad){
        if($this->get_CantidadActual() >= $cantidad ){
            $resto=$this->get_CantidadActual()-$cantidad;
            $resultado=true;
        }
        else{
            $resto=0;    
            $resultado=false;
        }
        $this->set_CantidadActual($resto);
        return $resultado;
    }

    /*13.e. vaciarCafetera(): pone la cantidad de café actual en cero.*/
    public function  vaciarCafetera(){

        $this->set_CantidadActual(0);

    }

    /*13.f. agregarCafe($cantidad): añade a la cafetera la cantidad de café indicada.*/
    public function agregarCafe($cantidad){
        $agregar=$this->get_CantidadActual()+$cantidad;
        $this->set_CantidadActual($agregar);
    }

/*13.g. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.*/
    public function __toString(){

        $cadena= "la cantidad total de cafe es de ".$this->get_CapacidadMax()."ml y la cantidad actual de cafe es de: ".$this->get_CantidadActual()."ml"; 
        return $cadena;
    }

}