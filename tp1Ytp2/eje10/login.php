<?php 
/*Implementar una clase Login que almacene el nombreUsuario, contraseña, frase que permite 
recordar la contraseña ingresada y las ultimas 4 contraseñas utilizadas. Implementar un método que 
permita validar una contraseña con la almacenada y un método para cambiar la contraseña actual por otra 
nueva, el sistema deja cambiar la contraseña siempre y cuando esta no haya sido usada recientemente (es
decir no se encuentra dentro de las cuatro almacenadas). Implementar el método recordar que dado el 
usuario, muestra la frase que permite recordar su contraseña.*/
class login{
    private $nombreUsuario;
    private $clave;
    private $oracion;
    private $claves4;

    public function __construct($usuario, $contrasena, $frase,$ultiContrasenas){
        $this->nombreUsuario=$usuario;
        $this->clave=$contrasena;
        $this->oracion=$frase;
        $this->claves4=$ultiContrasenas;
    }
//get y set de usuario
public function get_Usuario(){
    return $this->nombreUsuario;
}
public function set_Usuario($usuario){
    $this->nombreUsuario=$usuario;
}
//get y set de contrasena
public function get_Contrasena(){
    return $this->clave;
}
public function set_Contrasena($contrasena){
    $this->clave=$contrasena;
}
//get y set de frase
public function get_Frase(){
    return $this->oracion;
}
public function set_Frase($frase){
    $this->oracion=$frase;
}
//get y set de ultimas 4 contrasenas
public function get_UltiClave(){
    $claves=$this->claves4;
    return $claves;
}
public function set_UltiClave($ultiContrasenas){
    $this->claves4=$ultiContrasenas;
}

public function validarContrasena($unaContra){
    $respuesta = false;
    if( $unaContra == $this->get_Contrasena()){
        $respuesta = true;
    }
    return $respuesta;
}
 
public function nuevaContrasena($validar,$opcion ,$unaContra){
    for ($i=0; $i<count($this->get_UltiClave()); $i++){
        $validar=validarContrasena($unaContra);
        if( $validar == false && $opcion== "si"){
           $contrasena=[$unaContra];
           $resultado=true;
        }
        else{
           $contrasena=[-1];
           $resultado=false;  
        }
    }
    return $resultado;
}

public function __toString(){
    return "(".$this->get_Usuario()."".$this->get_Contrasena()."".$this->get_Frase()."".$this->get_UltiClave().")";
}

}
