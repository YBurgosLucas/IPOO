<?php
class Cuadrado{
    private $punto1;
    private $punto2;
    private $punto3;
    private $punto4;

    public function __construct($a, $b, $c, $d){
        $this->punto1=$a;
        $this->punto2=$b;
        $this->punto3=$c;
        $this->punto4=$d;
    }

    public function getPunto1(){
        return $this->punto1;
    }
    public function setPunto1($a){
         $this->punto1=$a;
    }
    public function getPunto2(){
        return $this->punto2;
    }
    public function setPunto2($b){
         $this->punto2=$b;
    }
    public function getPunto3(){
        return $this->punto3;
    }
    public function setPunto3($c){
         $this->punto3=$c;
    }
    public function getPunto4(){
        return $this->punto4;
    }
    public function setPunto4($d){
         $this->punto4=$d;
    }
   //area(): método que calcula el área del cuadrado.
    public function area(){
        $puntoA=$this->getPunto1();
        $puntoB=$this->getPunto2();
        $lado1= sqrt(pow( ($puntoB[0]-$puntoA[0]), 2) + pow(($puntoB[1]- $puntoA[1]), 2) );
        $area= pow($lado1, 2);
        return $area;
        
    }
    //desplazar($d): método que recibe por parámetro un punto y desplaza el cuadrado en el plano
   //desde su punto mas inferior izquierdo.
    public function desplazar($d){
        $puntoA=$this->getPunto1();
        $xA= $puntoA[0] + $d[0];
        $yA= $puntoA [1] + $d[1];
        $punto1Despla=[$x,$y];
        $this->setPunto1($punto1Despla);

        $puntoB=$this->getPunto2();
        $xB= $puntoB[0] + $d[0];
        $yB= $puntoB[1] + $d[1];
        $punto2Despla=[$xB,$yB];
        $this->setPunto2($punto2Despla);

        $puntoC=$this->getPunto3();
        $xC= $puntoC[0] + $d[0];
        $yC= $puntoC [1] + $d[1];
        $punto3Despla=[$xC,$yC];
        $this->setPunto3($punto3Despla);

        $puntoD=$this->getPunto4();
        $xD= $puntoD[0] + $d[0];
        $yD= $puntoA [1] + $d[1];
        $punto4Despla=[$xD,$yD];
        $this->setPunto4($punto4Despla);
         
    }
    //11.e. aumentarTamaño($t): método que recibe por parámetro el tamaño que debe aumentar el cuadrado.
    public function aumentarTamaño($t){
        $puntoA=$this->getPunto1();
        $puntoB=$this->getPunto2();
        $ladoAB= sqrt(pow( ($puntoB[0]-$puntoA[0]), 2) + pow(($puntoB[1]- $puntoA[1]), 2) );
        $aumentar= $ladoAB*$t;
        return $aumentar;
    }
    public function __toString(){
        $a = $this->getPunto1();
        $b = $this->getPunto2();
        $c = $this->getPunto3();
        $d = $this->getPunto4();
        
        // Construye una cadena con la información de los puntos
        $cadena = "Punto 1: ($a[0], $a[1])\n";
        $cadena .= "Punto 2: ($b[0], $b[1])\n";
        $cadena .= "Punto 3: ($c[0], $c[1])\n";
        $cadena .= "Punto 4: ($d[0], $d[1])\n";

        return $cadena;
    }
}