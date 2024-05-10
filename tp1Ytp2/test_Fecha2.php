<?php
include 'Fecha2.php';
$miFecha = new Fecha(29, 02, 2023);
echo $miFecha . "\n";
$miFecha->incremento(1, 29, 02, 2023);
echo $miFecha . "\n";
?>