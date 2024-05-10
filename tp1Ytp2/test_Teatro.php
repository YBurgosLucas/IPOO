<?php
    include "Teatro.php";
    $funcion[0]=["nombre"=>"sara", "precio"=>123 ];
    $funcion[1]=["nombre"=>"jorge", "precio"=>343 ];
    $funcion[2]=["nombre"=>"luna", "precio"=>235 ];
    $funcion[3]=["nombre"=>"alo", "precio"=>567 ];
    $objTeatro=new Teatro("los payasos", "diagonal", $funcion);
    echo $objTeatro."\n";
    echo "************************************************\n";
    $objTeatro->cambioNombreydireccion("los jorgitos", "mac donald");
    $funcionNueva[0]=["nombre"=>"a ", "precio"=>234 ];
    $funcionNueva[1]=["nombre"=>"mosñ", "precio"=>635 ];
    $funcionNueva[2]=["nombre"=>"pika", "precio"=>13 ];
    $funcionNueva[3]=["nombre"=>"cola", "precio"=>55 ];
    $objTeatro->cambioFunciones($funcionNueva);
    echo $objTeatro;


