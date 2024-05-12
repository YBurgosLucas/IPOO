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

    $respuesta=$objBanco->incorporarCliente($objCliente1);
    if($respuesta){
        echo "ingresado\n";
    }
    else{
        echo "no ingresado\n";
    }
    
    $respuesta1=$objBanco->incorporarCliente($objCliente2);
    if($respuesta1){
        echo "ingresado\n";
    }
    else{
        echo "no ingresado\n";
    }

    $respuesta=$objBanco->incorporarCuentaCorriente(1, 200);
    if($respuesta){
        echo "cuenta creada\n";
    }
    else{
        echo "cliente no existe\n";
    }
    $respuesta2=$objBanco->incorporarCuentaCorriente(2, 200);
    if($respuesta2){
        echo "cuenta creada\n";
        print_r($objBanco);
    }
    else{
        echo "cliente no existe\n";
    }