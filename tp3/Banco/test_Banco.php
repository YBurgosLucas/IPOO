<?php
    include "Cliente.php";//hijo
    include_once "Persona.php";//padre

    include "CuentaCorriente.php";//hijo
    include_once "Cuenta.php";//padre
    include_once "CajaAhorro.php";//hijo
    
    include "Banco.php";
    $colCuentas=[];
    $ultValor=0;
    $colCliente=[];
    $objBanco=new Banco($colCuentas,$ultValor, $colCliente);
    $objCliente1=new Cliente(1234, "juan", "gonzalez", 1);
    $objCliente2=new Cliente(4321, "luis", "hernandez", 2);
    
    $objBanco->incorporarCliente($objCliente1);
    $objBanco->incorporarCliente($objCliente2);

    
    $objBanco->incorporarCuentaCorriente(1, 200);
    $objBanco->incorporarCuentaCorriente(2, 200);
    
    
    $objBanco->incorporarCajaAhorro(1);
    $objBanco->incorporarCajaAhorro(1);
    $objBanco->incorporarCajaAhorro(2);

    
    $objBanco->realizarDeposito(3,300);
    $objBanco->realizarDeposito(4,300);
    $objBanco->realizarDeposito(5,300);
    echo "__________________tranferencia___________\n";
    $respuesta=$objBanco->realizarRetiro(1,150);
    if($respuesta!=-1){
        $objBanco->realizarDeposito(5,$respuesta);
        echo "tranferencia realizada\n";
    }
    else{
        echo "tranferencia  no hecha \n";
    }
    
    echo "__________________Datos Banco___________\n";
    echo $objBanco."\n";