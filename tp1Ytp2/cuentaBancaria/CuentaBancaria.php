<?php
/*Crea una clase CuentaBancaria con los siguientes atributos: número de cuenta, el DNI del cliente, el
saldo actual y el interés anual que se aplica a la cuenta. Define en la clase los siguientes métodos:
*/
class CuentaBancaria{
    private $nroCuenta;
    private $DNI;
    private $saldoActual;
    private $interesAnual;
/*14.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
atributos de la clase.*/
    public function __construct($numeroC,$dni,$salActual, $intAnual){
        $this->nroCuenta=$numeroC;
        $this->DNI=$dni;
        $this->saldoActual=$salActual;
        $this->interesAnual=$intAnual;
    }
/* 14.b. Los método de acceso de cada uno de los atributos de la clase.*/
    public function get_nroCuenta(){
        return $this->nroCuenta;
    }
    public function set_nroCuenta($numeroC){
        $this->nroCuenta=$numeroC;
    }
    public function get_DNI(){
        return $this->DNI;
    }
    public function set_DNI($dni){
        $this->DNI=$dni;
    }
    public function get_saldoActual(){
        return $this->saldoActual;
    }
    public function set_saldoActual($salActual){
        $this->saldoActual=$salActual;
    }
    public function get_interesAnual(){
        return $this->interesAnual;
    }
    public function set_interesAnual($intAnual){
        $this->interesAnual=$intAnual;
    }
/*14.c. actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual
dividido entre 365 aplicado al saldo actual).*/
    public function actualizarSaldo(){
        $intDia=$this->get_interesAnual()/365;
        $sumarSaldo= round($this->get_saldoActual()+($this->get_saldoActual()*$intDia),2);
        $this->set_saldoActual($sumarSaldo);
    }
/*14.d. depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta. */
    public function depositar($cant){
        $deposito=$this->get_saldoActual()+$cant;
        $this->set_saldoActual($deposito);
    }
/*14.e. retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo). */
    public function retirar($cant){
        if($this->get_saldoActual()>= $cant){
            $retiro=$this->get_saldoActual()-$cant;
            $resul=true;
        }
        else{
            $retiro=$this->get_saldoActual();
            $resul=false;
        }
        $this->set_saldoActual($retiro);
        return $resul;
    }
/*14.f. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase. */
    public function __toString(){
        $cad="Nro.Cuenta:".$this->get_nroCuenta().
              "\n".$this->get_DNI().
              "\nSaldo Actual:$".$this->get_saldoActual().
              "\nInteres Anual:".$this->get_interesAnual()."%\n";
        return $cad;
    }
}