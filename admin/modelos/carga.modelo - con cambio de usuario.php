<?php

require '../config/Conex.php';

use PhpOffice\PhpSpreadsheet\IOFactory;


class CargaModelo
{

    static public function mdlCargaMasivaEncuestas($fileencuestas)
    {

        $nombreArchivo = $fileencuestas['tmp_name'];

        $documento = IOFactory::load($nombreArchivo);

        $hojaCategorias = $documento->getSheetByName("Conversor");
        $numeroFilasCategorias = $hojaCategorias->getHighestDataRow();

        $hojaEncuestas = $documento->getSheetByName("EncuestasEfectivas");
        $numeroFilasProductos = $hojaEncuestas->getHighestDataRow();


        $categoriasRegistradas = 0;
        $productosRegistrados = 0;

        //CICLO FOR PARA REGISTROS DE CATEGORIAS
        for ($i = 2; $i <= $numeroFilasCategorias; $i++) {

            $Usuario_Rotator = $hojaCategorias->getCellByColumnAndRow(1, $i);
            $Usuario_SIGI = $hojaCategorias->getCellByColumnAndRow(2, $i);

            if (!empty($categoria)) {
                $stmt = Conexion::conectar()->prepare("INSERT INTO usr_rotator(Usuario_Rotator,
                                                                                Usuario_SIGI)
                                                                                values(:Usuario_Rotator,
                                                                                :Usuario_SIGI);");


                $stmt->bindParam(":Usuario_Rotator", $Usuario_Rotator, PDO::PARAM_STR);
                $stmt->bindParam(":Usuario_SIGI", $Usuario_SIGI, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    $categoriasRegistradas = $categoriasRegistradas + 1;
                } else {
                    $categoriasRegistradas = 0;
                }
            }
        }

        if ($categoriasRegistradas > 0) {



            //CICLO FOR PARA REGISTROS DE PRODUCTOS
            for ($i = 2; $i <= $numeroFilasProductos; $i++) {


                $ee_id = $hojaEncuestas->getCell("A" . $i);
                $ee_encuestador = CargaModelo::mdlBuscarIdCategoria($hojaEncuestas->getCell("B" . $i));
                $ee_fecha = $hojaEncuestas->getCell("C" . $i);
                $ee_estudio = $hojaEncuestas->getCell("D" . $i);
                $ee_estatus = $hojaEncuestas->getCell("E" . $i);

                if (!empty($ee_id)) {
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

                    $stmt->bindParam(":ee_id", $ee_id, PDO::PARAM_STR);
                    $stmt->bindParam(":ee_encuestador", $ee_encuestador, PDO::PARAM_STR);
                    $stmt->bindParam(":ee_fecha", $ee_fecha, PDO::PARAM_STR);
                    $stmt->bindParam(":ee_estudio", $ee_estudio, PDO::PARAM_STR);
                    $stmt->bindParam(":ee_estatus", $ee_estatus, PDO::PARAM_STR);

                    if ($stmt->execute()) {
                        $productosRegistrados = $productosRegistrados + 1;
                    } else {
                        $productosRegistrados = 0;
                    }
                }
            }
        }

        $respuesta["totalCategorias"] = $categoriasRegistradas;
        $respuesta["totalProductos"] = $productosRegistrados;

        return $respuesta;
    }

    static public function mdlBuscarIdCategoria($Usuario_Rotator)
    {

        $stmt = Conexion::conectar()->prepare("select id_usr_rotator from usr_rotator where Usuario_Rotator = :nombreCategoria");
        $stmt->bindParam(":Usuario_Rotator", $Usuario_Rotator, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
    }
}
