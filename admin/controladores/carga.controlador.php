<?php


class CargaControlador{

    static public function ctrCargaMasivaEncuestas($fileencuestas){
        
        $respuesta = CargaModelo::mdlCargaMasivaEncuestas($fileencuestas);
        
        return $respuesta;
    }
}