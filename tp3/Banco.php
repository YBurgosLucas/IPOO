<?php
    class Banco{
        private $coleCCorriente;
        private $coleCAhorro;
        private $ultValorCuentaAsignado;
        private $coleCliente;

        public function __construct($coleCCorriente, $coleCAhorro, $ultValorCuentaAsignado, $coleCliente){
            $this->coleCCorriente=$coleCCorriente;
            $this->coleCAhorro=$coleCAhorro;
            $this->ultValorCuentaAsignado=$ultValorCuentaAsignado;
            $this->coleCliente=$coleCliente;
        }

    }