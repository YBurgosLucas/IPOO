<?php
    include "Cliente.php";//hijo
    include_once "Persona.php";//padre

    include "CuentaCorriente.php";//hijo
    include_once "Cuenta.php";//padre
    include_once "CajaAhorro.php";//hijo
    
    include "Banco.php";
    $colCCorriente=[];
    $colCAhorro=[];
    $ultValor=0;
    $colCliente=[];
    $objBanco=new Banco($colCCorriente,$colCAhorro,$ultValor, $colCliente);
    $objCliente1=new Cliente(1234, "juan", "gonzalez", 1);
    $objCliente2=new Cliente(4321, "luis", "hernandez", 2);
    echo "___________________incorporar clientes________________\n";
    $objBanco->incorporarCliente($objCliente1);
    $objBanco->incorporarCliente($objCliente2);

    echo "______________________crear CC____________________\n";
    $objBanco->incorporarCuentaCorriente(1, 200);
    $objBanco->incorporarCuentaCorriente(2, 200);
    
    echo "_____________________CREAR CA____________________________\n";
    $objBanco->incorporarCajaAhorro(1);
    $objBanco->incorporarCajaAhorro(1);
    $objBanco->incorporarCajaAhorro(2);

    echo "____________________Deposito______________________________\n";
    $respuesta=$objBanco->realizarDeposito(1,100);
    if($respuesta){
        echo "deposito realizado\n";
    }
    else{
        echo "deposito no hecho \n";
        
    }
    echo "____________________retiro_____________________________\n";
    $respuesta=$objBanco->realizarRetiro(1,200);
    if($respuesta){
        echo "retiro realizado\n";
        print_r($objBanco);
    }
    else{
        echo "retiro no hecho \n";
        
    }