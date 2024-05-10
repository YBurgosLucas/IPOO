<?php
include "login.php";
$coleccionClaves=[];
$objeto= new login ("juan ", 1234, " corazon mio ",$coleccionClaves );
$coleccionClaves=[2222, 1234,2345, 4444];
$resp=$objeto->validarContrasena(1234);
if($resp){
    echo "contrasena correcta\n";
}
else{
    echo "contrasena incorrecta\n";
}
$resp2=$objeto->nuevaContrasena($resp,2222,"si");
if( $resp== false && $resp2== -1){
    echo "contrasena no cambiada";
    echo $objeto;
}
else{
    echo "contrasena cambiada";
}