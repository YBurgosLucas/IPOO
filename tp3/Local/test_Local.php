<?php
    include_once "Persona.php";
    include_once "Cliente.php";
    include_once "Rubro.php";
    include_once "Producto.php";
    include_once "ProductosImportados.php";
    include_once "ProductosRegionales.php";
    include_once "Venta.php";
    include_once "Local.php";

    $objRubro= new Rubro("conservas", 35);
    $objRubro2=new Rubro("regalos", 55);
//$codigoBarra,$descripcion,$stock,$porcentajeIva,$precioCompra,$objRubro,$porcentajeImportado,$porcentajeImpuesto
    $objProducto=new ProductosImportados(4444, "fon", 4, 5, 100, $objRubro2, 3, 4);
    $objProducto2=new ProductosImportados(555, "tablet", 5, 5, 200, $objRubro2, 3, 4);

//$codigoBarra,$descripcion,$stock,$porcentajeIva,$precioCompra,$objRubro,$porcentajeDescuento
    $objProducto3=new ProductoRegionales(3333, "tomate", 4, 5, 50, $objRubro, 5);
    $objProducto4=new ProductoRegionales(6666, "lechuga", 5, 6, 20, $objRubro, 5);

//$colProductosImportadas, $colProductosRegionales, $colVentasHechas
    $colProductosImportadas=[];
    $colProductosRegionales=[];
    $colVentasHechas=[];
    $objLocal= new Local($colProductosImportadas, $colProductosRegionales, $colVentasHechas);
    $respuesta=$objLocal->incorporarProductoLocal($objProducto);
    if($respuesta==false){
        echo "incorporado\n";

    }
    else{
        echo "no incorporado\n";
    }
    $respuesta=$objLocal->incorporarProductoLocal($objProducto2);
    if($respuesta==false){
        echo "incorporado\n";

    }
    else{
        echo "no incorporado\n";
    }
    $respuesta=$objLocal->incorporarProductoLocal($objProducto3);
    if($respuesta==false){
        echo "incorporado\n";

    }
    else{
        echo "no incorporado\n";
    }
    $respuesta=$objLocal->incorporarProductoLocal($objProducto4);
    if($respuesta==false){
        echo "incorporado\n";

    }
    else{
        echo "no incorporado\n";
    }
    $respuesta=$objLocal->incorporarProductoLocal($objProducto4);
    if($respuesta==false){
        echo "incorporado\n";

    }
    else{
        echo "no incorporado\n";
    }
    echo "Precio Producto 1:$".$objProducto->darPrecioVenta()."\n";
    echo "Precio Producto 2:$".$objProducto2->darPrecioVenta()."\n";
    echo "Precio Producto 3:$".$objProducto3->darPrecioVenta()."\n";
    echo "Precio Producto 4:$".$objProducto4->darPrecioVenta()."\n";

   echo  $objLocal->retornarCostoProductoLocal();