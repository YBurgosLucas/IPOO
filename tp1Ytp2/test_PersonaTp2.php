<?php
/*4. Crear un script Test_Persona que cree un objeto Persona e invoque a cada uno de los
métodos implementados.
b) Realizar las modificaciones necesarias en la clase CuentaBancaria (Ejercicio 14 del TP1) para que en
vez de contener como atributo el DNI del dueño de la cuenta tenga una referencia a las clase Persona.  */
include "PersonaTp2.php";
include "CuentaBancaria.php";
$Persona=new PersonaTp2("yamel", "burgos", "femenino", 9876542);
$cuentaB=new CuentaBancaria(123456, $Persona,14000, 5 );
echo $cuentaB."\n";