<?php
//incluir la conexion de base de datos
require '../config/Conexion.php';

class Asignar
{
    public function __construct()
    {
    }

    public function insertar(
        $agente_asig,
        $estudio_asig,
        $fecha_asig,
        $hora_asig,
        $hora_fin_asig
    ) {
        $sql = "INSERT INTO asignacionestudio (agente_asig,estudio_asig,fecha_asig,hora_asig,hora_fin_asig) VALUES ('$agente_asig','$estudio_asig','$fecha_asig','$hora_asig','$hora_fin_asig')";
        return ejecutarConsulta($sql);
    }

    public function editar(
        $id_asig,
        $agente_asig,
        $estudio_asig,
        $fecha_asig,
        $hora_asig,
        $hora_fin_asig
    ) {
        $sql = "UPDATE asignacionestudio SET agente_asig='$agente_asig',estudio_asig='$estudio_asig',fecha_asig='$fecha_asig',hora_asig='$hora_asig',hora_fin_asig='$hora_fin_asig
        WHERE id_asig='$id_asig'";

        return ejecutarConsulta($sql);
    }

    public function mostrar($id_asig)
    {
        $sql = "SELECT * FROM asignacionestudio WHERE id_asig = '$id_asig'";
        return ejecutarConsultaSimpleFila($sql);
    }

     public function eliminaregistro($id_asig)
    {
        $sql = "DELETE FROM asignacionestudio WHERE id_asig='$id_asig'";
        return ejecutarConsulta($sql);
    }
    public function listar()
    {
        $sql = 'SELECT * FROM asignacionestudio';
        return ejecutarConsulta($sql);
    }
}

?>
