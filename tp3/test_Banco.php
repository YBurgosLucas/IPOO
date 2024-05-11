<?php
    include "Cliente.php";//hijo
    include_once "Persona.php";//padre

    include "CuentaCorriente.php";//hijo
    include_once "Cuenta.php";//padre
    include_once "CajaAhorro.php";//hijo
    
    $objCliente=new Cliente(1234, "juan", "gonzalez", 1);
    echo "________________Caja Ahorro______________________\n";
    $objCAhorro=new CajaAhorro(888, $objCliente, 200);
    echo $objCAhorro."\n";
    echo "________________deposito_________________________\n";
    $resutaldo=$objCAhorro->realizarDeposito(1000);
    if($resutaldo){
        echo "deposito exitoso\n";
        echo $objCAhorro."\n";
    }
    else{
        echo "deposito rechazado\n";
        echo $objCAhorro."\n";
    }
    echo "____________________RETIROCA________________________\n";
    $retiro=$objCAhorro->realizarRetiro(301);
    if($retiro){
        echo "retiro realizado\n";
        echo $objCAhorro."\n";
    }
    else{
        echo "retiro no realizado supera los limites\n";
        echo $objCAhorro."\n";
    }
    echo "________________Cuenta Corriente_________________\n";
    $objCCorriente=new CuentaCorriente(777,$objCliente,100,200);
    echo $objCCorriente."\n";
    echo "____________________Deposito________________________\n";
    $resutaldo=$objCCorriente->realizarDeposito(300);
    if($resutaldo){
        echo "deposito Realizado\n";
        echo $objCCorriente."\n";
    }
    else{
        echo "deposito no realizado\n";
        echo $objCCorriente."\n";
    }
    echo "____________________RETIROCC________________________\n";
    $retiro=$objCCorriente->realizarRetiro(301);
    if($retiro){
        echo "retiro realizado\n";
        echo $objCCorriente."\n";
    }
    else{
        echo "retiro no realizado supera los limites\n";
        echo $objCCorriente."\n";
    }
