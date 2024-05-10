<?php
Class Lectura{
    private $objLibro;
    private $numPagina;
    
    public function __construct($objLibro, $numeroPag){
        $this->objLibro=$objLibro;
        $this->numPagina=$numeroPag;
    }

    public function getObjLibro(){
        return $this->objLibro;
    }
    public function getNumPagina(){
        return $this->numPagina;
    }
    public function setObjLibro($objLibro){
        $this->objLibro=$objLibro;
    }
    public function setNumPagina($numeroPag){
        $this->numPagina=$numeroPag;
    }

    public function __toString(){
        $cad="Libro:\n".$this->getObjLibro().
             "\nNumero Pagina:".$this->getNumPagina();
        return $cad;
    }

    public function siguientePagina(){
        $nuevaPagina=$this->getNumPagina()+1;
        $this->setNumPagina($nuevaPagina);
    }
    public function retornarPagina(){
        $paginaAtras=$this->getNumPagina()-1;
        $this->setNumPagina($paginaAtras);
    }
    public function irPagina($x){
         $this->setNumPagina($x);
         return $this->getNumPagina();
    }
    
}