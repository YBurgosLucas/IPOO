<?php
/*f) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
g) Crear un script Test_Disquera que cree un objeto Disquera e invoque a cada uno de los métodos
implementados. */
    include "PersonaTp2.php";
    include "Disquera.php";
    $persona= new PersonaTp2("juan", "gonzalez", "masculino", 1234567);
    $disquera= new Disquera(9, 13, "abierto", "santa fe", $persona);
    echo $disquera."\n";
    echo "**************************************************\n";
    $resp=$disquera->dentroHorarioAtencion( 14 , 0);
        if($resp){
            echo "La disquera esta ABIERTA\n";
        }
        else{
            echo "la disquera esta CERRADA\n";
        }
    echo "**************************************************\n";
    $abierto= $disquera->abrirDisquera(11, 59);
        if($abierto ){
            echo "el horario valido para su apertura\n ";
        }
        else{
             echo "el horario invalido para su apertura\n ";
        }
    echo "**************************************************\n";
    $cerrado= $disquera->cerrarDisquera(8, 00);
        if($cerrado){
             echo "el horario invalido para su Cierre\n ";
        }
        else{
          echo "el horario valido para su Cierre\n ";
        }
?>