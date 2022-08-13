<?php

require '../config/Conex.php';

use PhpOffice\PhpSpreadsheet\IOFactory;


class CargaModelo{

    static public function mdlCargaMasivaEncuestas($fileencuestas){

        $nombreArchivo = $fileencuestas['tmp_name'];

        $documento = IOFactory::load($nombreArchivo);

        $hojaEncuestas = $documento->getSheetByName("EncuestasEfectivas");
        $numeroFilasProductos = $hojaEncuestas->getHighestDataRow();
        $productosRegistrados = 0;

        

            //CICLO FOR PARA REGISTROS DE PRODUCTOS
            for ($i=2; $i <= $numeroFilasProductos ; $i++) { 

                
                $ee_id = $hojaEncuestas->getCell("A".$i);
                $ee_encuestador = $hojaEncuestas->getCell("B".$i);
                $ee_fecha = $hojaEncuestas->getCell("C".$i);
                $ee_estudio = $hojaEncuestas->getCell("D".$i);
                $ee_estatus = $hojaEncuestas->getCell("E".$i);

                if(!empty($ee_id)){
                    $stmt = conexion::conectar()->prepare("INSERT INTO ee_carga(ee_id,
                                                                                ee_encuestador,
                                                                                ee_fecha,
                                                                                ee_estudio,
                                                                                ee_estatus)
                                                                         values(:ee_id,
                                                                                :ee_encuestador,
                                                                                :ee_fecha,
                                                                                :ee_estudio,
                                                                                :ee_estatus);");

                    $stmt -> bindParam(":ee_id",$ee_id,PDO::PARAM_STR);
                    $stmt -> bindParam(":ee_encuestador",$ee_encuestador,PDO::PARAM_STR);
                    $stmt -> bindParam(":ee_fecha",$ee_fecha,PDO::PARAM_STR);
                    $stmt -> bindParam(":ee_estudio",$ee_estudio,PDO::PARAM_STR);
                    $stmt -> bindParam(":ee_estatus",$ee_estatus,PDO::PARAM_STR);

                    if($stmt->execute()){
                        $productosRegistrados = $productosRegistrados + 1;
                    }else{
                        $productosRegistrados = 0;
                    }
                }
            
        }
        
        $respuesta["totalProductos"] = $productosRegistrados;

        return $respuesta;
    }

    
    
    
}