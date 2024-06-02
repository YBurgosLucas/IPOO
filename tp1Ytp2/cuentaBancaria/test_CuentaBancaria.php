<?php
/*14.g. Crear un script Test_CuentaBancaria que cree un objeto CuentaBancaria e invoque a cada 
uno de los métodos implementados.*/
    include "CuentaBancaria.php";
    $objCuenta=new CuentaBancaria(12345,3456789, 50000, 20 );
    echo $objCuenta."\n";
    echo"*****************************************\n";
    $objCuenta->actualizarSaldo();
    echo $objCuenta;
    echo"*****************************************\n";
    $objCuenta->depositar(1000);
    echo $objCuenta."\n";
    echo"*****************************************\n";
   $resp= $objCuenta->retirar(40000);
   if($resp){
    echo "retiro con exito.\n".$objCuenta;

   }
   else{
    echo "no se puedo retirar la cantida ingresada.\n".$objCuenta;
   }
   