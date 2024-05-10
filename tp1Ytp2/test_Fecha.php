<?php
include_once "Fecha.php";
$objfecha= new Fecha(31,12,2023);
echo "fecha abreviada: ".$objfecha."\n";
echo "fecha extendida: ".$objfecha-> fechaExtendida()."\n";
echo "---------- incremento-----------\n";
$objfecha->incremento(2,31,12,2023);
echo "fecha abreviada".$objfecha."\n";
echo "fecha Extendida".$objfecha->fechaExtendida();