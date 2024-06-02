<?php
/*16. Cree una clase Libro que tenga los atributos ISBN, titulo, año de edición, editorial, nombre y apellido
del autor. Defina en la clase los siguientes métodos
 */
class Libro{
    private $ISBN;
    private $titulo;
    private $anoEdicion;
    private $editorial;
    private $objPersona;
    private $cantPaginas;
    private $sinopsis;

/*a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos de la
    clase.*/
    public function __construct($isbn,$titu, $ano,$edito,$objPersona, $cantidadP,$sinopsis )
    {
        $this->ISBN=$isbn;
        $this->titulo=$titu;
        $this->anoEdicion=$ano;
        $this->editorial=$edito;
        $this->objPersona=$objPersona;
        $this->cantPaginas=$cantidadP;
        $this->sinopsis=$sinopsis;
    }
/*b) Los método de acceso de cada uno de los atributos de la clase. */
    public function getISBN() {
    return $this->ISBN;
    }
    public function setISBN($isbn) {
    $this->ISBN = $isbn;
    }

    public function getTitulo() {
    return $this->titulo;
    }
    public function setTitulo($titu) {
    $this->titulo = $titu;
    }

    public function getAnoEdicion() {
    return $this->anoEdicion;
    }
    public function setAnoEdicion($ano) {
    $this->anoEdicion = $ano;
    }

    public function getEditorial() {
    return $this->editorial;
    }
    public function setEditorial($edito) {
    $this->editorial = $edito;
    }
    public function getObjPersona() {
    return $this->objPersona;
    }

    public function setObjPersona($objPersona) {
    $this->objPersona = $objPersona;
    }

    public function getCantPaginas(){
        return $this->cantPaginas;
    }
    public function setCantPaginas($sinopsis){
        $this->cantPaginas=$cantidadP;
    }
    public function getSinopsis(){
        return $this->sinopsis;
    }
    public function setSinopsis($sinopsis){
        $this->sinopsis=$sinopsis;
    }

/*c) Método toString() que retorne la información de los atributos de la clase.*/
    public function __toString()
    {
         $cadena= "INS:".$this->getISBN().
                 "\ntitulo: ".$this->getTitulo().
                 "\nAnio de edicion: ".$this->getAnoEdicion().
                 "\nEditorial:".$this->getEditorial().
                 "\nPersona:".$this->getObjPersona().
                 "\nCant.Paginas: ".$this->getCantPaginas().
                 "\nSinopsis: ".$this->getSinopsis();
    return $cadena;
    }
/*d) perteneceEditorial($pEditorial): indica si el libro pertenece a una editorial dada. Recibe como parámetro
una editorial y devuelve un valor verdadero/falso. */
    public function perteneceEditorial($pEditorial)
    {
       if($this->getEditorial()==$pEditorial){
        $resultado=true;
       } 
       else{
        $resultado=false;
       }
       return $resultado;
    }
/*e) aniosdesdeEdicion(): método que retorna los años que han pasado desde que el libro fue editado. */
    public function anioDesdeEdicion()
    {
        $anios=2024-$this->getAnoEdicion();
        return $anios;
    }


}