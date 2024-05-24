<?php
include "Persona.php";
include "Inmueble.php";
include "Edificio.php";

$objResponsable=new Persona("DNI", 27432561, "Carlos", "Martinez", 154321233);
$colec=[];
$objEdificio=new Edificio("Juan.B: Justo 3456",$colec, $objResponsable);
echo "*************************************************************************\n";
$objInqui1=new Persona("DNI",12333456,"Pepe", "Suarez", 4456722);
$objInmueble1=new Inmueble("I1", 1, "local comercial", 50000, false, $objInqui1 );
echo $objInmueble1."\n";
echo "*************************************************************************\n";
$objInmueble2=new Inmueble("I2", 1, "local comercial", 50000, true , null );
echo $objInmueble2."\n";
echo "*************************************************************************\n";
$objInqui3=new Persona("DNI", 12333422, "Pedro", "Suarez", 446678);
$objInmueble3=new Inmueble("I3", 2, "departamento", 35000,false, $objInqui3 );
echo $objInmueble3."\n";
echo "*************************************************************************\n";
$objInmueble4=new Inmueble("I4", 2, "departamento", 35000,true, null);
echo $objInmueble4."\n";
echo "*************************************************************************\n";
$objInmueble5=new Inmueble("I5", 3, "departamento", 35000,true, null );
$coleccionInmueble=[$objInmueble1,$objInmueble2,$objInmueble3, $objInmueble4, $objInmueble5];

$objEdificio=new Edificio("Juan.B: Justo 3456",$coleccionInmueble, $objResponsable );
echo $objEdificio."\n";
echo "*************************************************************************\n";
$departamentos=$objEdificio->darInmueblesDisponibles("departamento", 550000);
foreach($departamentos as $unDepartamento){
    echo $unDepartamento."\n";
    echo "*************************************************************************\n";
}
$objPersona=new Persona("DNI", 28765436, "Mariaela", " Suarez", 25543562);
$respuesta=$objEdificio->registrarAlquilerInmueble("departamento",55000, $objPersona);
if($respuesta){
    echo "Alquiler realizado exitosamente\n";
}
else{
    echo "No se pudo realizar\n";
}
echo "*************************************************************************\n";
$costoTotal=$objEdificio->calculaCostoEdificio();
echo "el costo total de todos los inmueble es de $".$costoTotal."\n";
echo "*************************************************************************\n";