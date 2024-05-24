<?php
    class Local{
        private $colProductosImportadas;
        private $colProductosRegionales;
        private $colVentasHechas;

        public function __construct($colProductosImportadas, $colProductosRegionales, $colVentasHechas){
            $this->colProductosImportadas=$colProductosImportadas;
            $this->colProductosRegionales=$colProductosRegionales;
            $this->colVentasHechas=$colVentasHechas;
        }
        public function getColProductosImportadas(){
            return $this->colProductosImportadas;
        }
        public function getColProductosRegionales(){
            return $this->colProductosRegionales;
        }
        public function getColVentasHechas(){
            return $this->colVentasHechas;
        }
        public function setColProductosImportadas($colProductosImportadas){
            $this->colProductosImportadas=$colProductosImportadas;
        }
        public function setColProductosRegionales($colProductosRegionales){
            $this->colProductosRegionales=$colProductosRegionales;
        }
        public function setColVentasHechas($colVentasHechas){
            $this->colVentasHechas=$colVentasHechas;
        }

        public function retornarProductosImportadas(){
            $cad="";
            $colProductosImportadas=$this->getColProductosImportadas();
            foreach ($colProductosImportadas as $unProducto){
                $cad.=$unProducto."\n";
            }
            return $cad;
        }
        public function retornarProductosRegionales(){
            $cad="";
            $colProductosRegionales=$this->getColProductosRegionales();
            foreach($colProductosImportadas as $unProducto){
                $cad.=$unProducto."\n";
            }
            return $cad;
        }
        public function retornarVentasHechas(){
            $cad="";
            $colVentasHechas=$this->getColVentasHechas();
            foreach ($colVentasHechas as $unaVenta){
                $cad.=$unaVenta."\n";
            }
            return $cad;
        }
        public function __toString(){
            $cad="COLECCION DE PRODUCTOS IMPORTADAS:\n".$this->retornarProductosImportadas().
                 "\nCOLECCION DE PRODCUTOS REGIONALES:\n".$this->retornarProductosRegionales().
                 "\nCOLECCION DE VENTAS HECHAS:\N".$this->retornarVentasHechas();
            return $cad;
        }
/* incorporarProductoLocal (objProducto): método que recibe por parámetro un objeto Producto y verifica
que el código de barra no se encuentre dentro de la lista. Si el producto ya existe no es incorporado dentro
de la lista de productos de la tienda. El método retorna verdadero o falso según corresponda.
 */    
        public function incorporarProductoLocal($objProducto){
            $colProductosImportados=$this->getColProductosImportadas();
            $colProductosRegionales=$this->getColProductosRegionales();
            $encontrado=false;
            $i=0;
            while($i<count($colProductosImportados) && $encontrado == false){
                if($colProductosImportados[$i]->getCodigoBarra() == $objProducto->getCodigoBarra()){
                    $encontrado=true; 
                }
                $i++;
            }

            if($encontrado==false){
                $j=0;
                while($j<count($colProductosRegionales) && $encontrado == false){
                    if($colProductosRegionales[$j]->getCodigoBarra() == $objProducto->getCodigoBarra()){
                        $encontrado=true; 
                    }
                    $j++;
                }
            }
            if($encontrado==false){
                if($objProducto instanceof ProductosImportadas){
                    $colProductosImportados[]=$objProducto;
                    $this->setColProductosImportadas($colProductosImportados);
                }
                else{
                    $colProductosRegionales[]=$objProducto;
                    $this->setColProductosRegionales($colProductosRegionales);
                }
            }
            return $encontrado; // en el test indicar si es igual a false el producto fue incorporado
        }
/*retornarImporteProducto(codProducto): método que recibe por parámetro el código de un producto y
retorna el precio de venta.
 */     
        public function retornarImporteProducto($codProducto){
             $encontrado=false;
             $colProductosImportadas=$this->getColProductosImportadas();
             $colProductosRegionales=$this->getColProductosRegionales();
             $i=0;
             $precioVenta=0;
             while($i<count($colProductosImportadas) && $encontrado== false){
                if($colProductosImportadas[$i]->getCodigoBarra() == $codProducto){
                    $encontrado=true;
                    $precioVenta=$colProductosImportadas[$i]->darPrecioVenta();

                }
                $i++;
             }
             if($encontrado==false){
                $j=0;
                while($j<count($colProductosRegionales) && $encontrado== false){
                    if($colProductosRegionales[$j]->getCodigoBarra() == $codProducto){
                        $encontrado=true;
                        $precioVenta=$colProductosRegionales[$j]->darPrecioVenta();
    
                    }
                    $j++;
                 }
             }
             return $precioVenta;
        }
/* retornarCostoProductoLocal (): recorre todos los productos de la tienda y retorna la suma de los costos
de cada producto teniendo en cuenta el stock de cada uno*/

        public function retornarCostoProductoLocal(){
            $colProductosImportadas=$this->getColProductosImportadas();
            $colProductosRegionales=$this->getColProductosRegionales();

            $importeFinal=0;
            foreach($colProductosImportadas as $unProducto){
                $importeFinal+=$unProducto->darPrecioVenta();
            }
            foreach($colProductosRegionales as $producto){
                $importeFinal+=$producto->darPrecioVenta();
            }

            return $importeFinal;
        }

/* productoMasEcomomico(rubro): método que retorna el producto más económico de un rubro. */
        public function productoMasEcomomico($rubro){
            $colProductosImportadas=$this->getColProductosImportadas();
            $colProductosRegionales=$this->getColProductosRegionales();
            $precioEconomico=9999;
            $productoEconomico=null;
            foreach($colProductosImportadas as $unProducto){
                if($unProducto->darPrecioVenta() <$productoEconomico){
                    $productoEconomico=$unProducto;
                    $precioEconomico=$unProducto->darPrecioVenta();
                }
            }
            foreach($colProductosRegionales as $unProducto){
                if($unProducto->darPrecioVenta() <$productoEconomico){
                    $productoEconomico=$unProducto;
                    $precioEconomico=$unProducto->darPrecioVenta();
                }
            }
            return $productoEconomico;
    }
/*informarProductosMasVendidos(anio, n): retorna los n productos más vendidos en el año
recibido por parámetro. */
    public function informarProductosMasVendidos($anio, $n){
        $colVentasHechas=$this->getColVentasHechas();
        foreach($colVentasHechas as $unVenta){
            
        }
    }
 /*promedioVentasImportados(): método que retorna el promedio de ventas de productos importados
realizadas. */   
    public function promedioVentasImportados(){
        $colVentasHechas=$this->getColVentasHechas();
        $acum=0;
        $i=0;
        foreach($colVentasHechas as $unaVenta){
            $colProductos=$unaVenta->getColProducto();
            foreach( $colProductos as $unProducto){
                if($unProducto instanceof ProductosImportados){
                    $acum+=$unProducto->darPrecioVenta();
                    $i++;
                }
            }
        }
        $promedio=$acum/$i;
        return $promedio;
    }
/*informarConsumoCliente(tipoDoc,numDoc): método que retorna todos los productos que fueron
comprados por la persona identificada con el tipoDoc y numDoc recibidos por parámetro. */
    public function informarConsumoCliente($tipoDoc,$numDoc){
        $colVentasHechas=$this->getColVentasHechas();
        $colProductosComprados=[];
        foreach($colVentasHechas as $unVenta){
            if($unaVenta->getObjCLiente()->getTipoDocumento() == $tipoDoc && $unaVenta->getObjCLiente()->$this->getDni() == $numDoc ){
                $colProductosComprados[]=$unaVenta->getColProducto();
            }
        }
        return $colProductosComprados;
    }
}