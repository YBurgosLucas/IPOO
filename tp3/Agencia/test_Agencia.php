<?php
    include_once "Cliente.php";
    include_once "Destino.php";
    include_once "PaquetesTuristicos.php";
    include_once "Venta.php";
    include_once "VentasOnline.php";
    include_once "Agencia.php";

    $objDestino= new Destino("BARILOCHE", 250);
    $objPaqueteTuristico= new PaquetesTuristicos("23/05/2014", 3, $objDestino, 25);
    $colPaquetes=[];
    $colVentasOnline=[];
    $colVentasAgencia=[];
    $objAgencia= new Agencia($colPaquetes ,$colVentasAgencia, $colVentasOnline);

    $rps=$objAgencia->incorporarPaquete($objPaqueteTuristico);
    if($rps== false){
        echo "paquete incorporado\n";
    }
    else{
        echo "paquete ya existente\n";
    }
    $rps=$objAgencia->incorporarPaquete($objPaqueteTuristico);
    if($rps== false){
        echo "paquete incorporado\n";
    }
    else{
        echo "paquete ya existente\n";
    }
    echo "____________________Venta_____________________\n";
    $importe=$objAgencia->incorporarVenta($objPaqueteTuristico, "DNI",27898654 , 5, false); //$objPaquete,$tipoDoc,$numDoc,$cantPer, $esOnLine
    if($importe !=-1){
        echo "venta realizada\n";
    }
    else{
        echo "venta no realizada\n";
    }
    $importe=$objAgencia->incorporarVenta($objPaqueteTuristico,"DNI" ,27898654 , 4, true);
    if($importe !=-1){
        echo "venta realizada\n";
    }
    else{
        echo "venta no realizada\n";
    }
    $importe=$objAgencia->incorporarVenta($objPaqueteTuristico, "DNI",27898654 , 15, true);
    if($importe !=-1){
        echo "venta realizada\n";
    }
    else{
        echo "venta no realizada\n";
    }
    print_r($objAgencia);