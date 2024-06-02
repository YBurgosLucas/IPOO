<?php
/*f) Cree un script TestLibro que:*/
 include "Libro.php";
 include "PersonaTp2.php";
/*1) defina el método iguales($plibro,$parreglo): dada una colección de libros, indica si el libro pasado por 
parámetro ya se encuentra en dicha colección.*/
    function iguales($plibro, $ColecLibro){
        $encontrado=0;
        foreach($ColecLibro as $i){
            if($i == $plibro){
                $encontrado=1;
            }
        }
        return $encontrado;
    }
    
/*2) defina el método librodeEditoriales($arreglolibros, $peditorial): método que retorna un arreglo asociativo
con todos los libros publicados por la editorial dada.*/
    function libroEditoriales($ColecLibro, $peditorial){
         $colecEditorial=[];
         for($i=0; $i<count($ColecLibro) ; $i++){
            if ($ColecLibro[$i][3] == $peditorial){
                $nuevoEdito=count($colecEditorial);
                $colecEditorial[$nuevoEdito]=$ColecLibro[$i];
            }
         }
        return  $colecEditorial;
    }

/*3) cree al menos tres objetos libros e invoque a cada uno de los métodos implementados en la clase Libro. */
 $colecLibro[0]=[1234, "salamanca", 2004 , "numero1", "jorge", "gonzalez" ];
 $colecLibro[1]=[123, "salam", 2009 , "numero2","luna", "dime" ];
 $ColecLibro[2]=[123, "salam", 2020 , "numero4","luis", "dimelo" ];
 $libro1=new Libro($ColecLibro[0][0],$ColecLibro[0][1],$ColecLibro[0][2], $ColecLibro[0][3],$ColecLibro[0][4],$ColecLibro[0][5]);
 $libro2=new Libro($ColecLibro[1][0],$ColecLibro[1][1],$ColecLibro[1][2], $ColecLibro[1][3],$ColecLibro[1][4],$ColecLibro[1][5]);
 $libro3=new Libro($ColecLibro[2][0],$ColecLibro[2][1],$ColecLibro[2][2], $ColecLibro[2][3],$ColecLibro[2][4],$ColecLibro[2][5]);

 echo $libro1."\n";
 echo "****************************************************************\n";
 echo $libro2."\n";
 echo "****************************************************************\n";
 echo $libro3."\n";
 echo "****************************************************************\n";
 $libro4=[987756467, "PRincipe", 1999 , "numero3", "Yamel", "burgo" ];
 $resp=iguales($libro4, $ColecLibro );
 if($resp == 1){
    echo "libro ya existente\n";
 }
 else{
    echo "Libro no existente\n";
 }
 echo "****************************************************************\n";
 $resp2=$libro3->perteneceEditorial("numero3");
 if($resp2== true ){
    echo "pertenece\n";
 }
 else{
    echo "no pertenece\n";
 }
 echo "****************************************************************\n";
 $anios=$libro1->anioDesdeEdicion();
 echo " desde  la ultima edicion del libro 1 han pasado ".$anios." anios\n";
 echo "****************************************************************\n";
 $coleEdito=libroEditoriales($ColecLibro, "numero3");
 print_r($coleEdito);