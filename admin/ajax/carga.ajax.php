<?php

require_once "../controladores/carga.controlador.php";
require_once "../modelos/carga.modelo.php";
require_once "/server/htdocs/sigi/vendor/autoload.php";

class ajaxcarga{

    public $fileencuestas;

    public function ajaxCargaMasivaEncuestas(){

        $respuesta = CargaControlador::ctrCargaMasivaEncuestas($this->fileencuestas);

        echo json_encode($respuesta);
    }
}

if(isset($_FILES)){
    $archivo_productos = new ajaxcarga();
    $archivo_productos -> fileencuestas = $_FILES['fileencuestas'];
    $archivo_productos -> ajaxCargaMasivaEncuestas();
}