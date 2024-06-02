<?php
/*13.h. Crear un script Test_Cafetera que cree un objeto Cafetera e invoque a cada uno de los
métodos implementados.*/
 include "Cafetera.php";
 $objtTaza=new Cafetera(1000, 500);
 echo "datos:".$objtTaza."\n";
 echo "**************************\n";
 $objtTaza->llenarCafetera();
 echo "Ahora esta llena".$objtTaza."\n";
 echo "***************************\n";
 $resp=$objtTaza->servirTaza(300);
 if($resp){
    echo "la taza se lleno por completo \n";
 }
 else{
    echo "la taza no se lleno por completo\n";
 }
 echo "***************************\n";
 $objtTaza->vaciarCafetera();
 echo $objtTaza;
 $objtTaza->agregarCafe(500);
 echo $objtTaza;
 