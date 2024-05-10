<?php
    include "Cliente.php";
    
    function testCrearCliente(){
        //cliente (Nro. de Cliente, DNI, Nombre y Apellido)
        $objCliente=new Cliente(1,1234,"yorye", "gonzalez");
        echo $objCliente;
    }
    function main(){
        testCrearCliente();
    }

    main();

