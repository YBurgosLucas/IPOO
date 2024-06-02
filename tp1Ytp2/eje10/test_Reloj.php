<?php
include_once "Reloj.php";

// se crea el objeto 
$reloj = new Reloj(23,59,59);

// se invocan los metodos
echo "Hora: ".$reloj."\n";
$reloj->incremento();
echo "incremento 1= ".$reloj."\n";
$reloj->incremento();
echo "incremento 2= ".$reloj."\n";
$reloj->incremento();
echo "incremento 3= ".$reloj."\n";
$reloj->incremento();
echo "incremento 4= ".$reloj."\n";
$reloj->puesta_a_Cero();
echo "Hora= ".$reloj;