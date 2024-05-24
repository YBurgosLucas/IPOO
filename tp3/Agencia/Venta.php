<?php
/*De las Ventas se almacena la fecha, la referencia al paquete, la cantidad de personas, y el cliente al que se le 
ha realizado la venta. Por otro lado hay ventas On-Line, de estas ventas se almacena el porcentaje de 
descuento y tienen un cálculo de venta diferente. El importe final de una venta normal se calcula en base a la 
cantidad de días, por el importe del día del paquete, por la cantidad de personas de la venta. Si se trata de una 
venta On- Line al importe de la venta se aplica el porcentaje de descuento cuyo valor por defecto es de un 
20% (este valor puede variar). Definir la jerarquía de clases junto a los métodos y variables instancias de cada 
una de ellas. No olvidar realizar el diagrama de clases */
class Venta{
    private $fecha;
    private $objPaquete;
    private $cantPersonas;
    private $objCliente;
    
    
    public function __construct($fecha, $objPaquete, $cantPersonas, $objCliente){
        $this->fecha=$fecha;
        $this->objPaquete=$objPaquete;
        $this->cantPersonas=$cantPersonas;
        $this->objCliente=$objCliente;
        
    }
    public  function getFecha(){
        return $this->fecha;
    }
    public function getObjPaquete(){
        return $this->objPaquete;
    }
    public function getCantPersonas(){
        return $this->cantPersonas;
    }
    public function getObjCliente(){
        return $this->objCliente;
    }

    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function setObjPaquete($objPaquete){
        $this->objPaquete=$objPaquete;
    }
    public function setCantPersonas($cantPersonas){
        $this->cantPersonas=$cantPersonas;
    }
    public function setObjCliente($objCliente){
        $this->objCliente=$objCliente;
    }

    public function __toString(){
        $cad="Fecha:".$this->getFecha().
            "\nPaquete:".$this->getObjPaquete().
            "\nCant.Personas:".$this->getCantPersonas().
            "\nComprador:".$this->getObjCliente();
        return $cad;
    }
    public function darImporteVenta(){
        $cantPersonas=$this->getCantPersonas();
        $cantDias=$this->getObjPaquete()->getCantDias();
        $importeFinal=$cantDias*$cantPersonas;
        return $importeFinal;
    }
    
}