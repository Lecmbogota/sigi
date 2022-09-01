<?php

require '../config/Conexion.php';
class Verasig_agente
{
    //implementamos nuestro constructor
    public function __construct()
    {
    }

    //metodo insertar regiustro
    public function insertar(
        $agente_asig,
        $cedula_asig,
        $estudio_asig,
        $fecha_asig,
        $hora_asig,
        $hora_fin_asig,
        $id_estudio_asig
    ) {
        date_default_timezone_set('America/Bogota');
        $fechacreado = date('Y-m-d H:i:s');
        $sql = "INSERT INTO asignacionestudio (agente_asig,cedula_asig,estudio_asig,fecha_asig,hora_asig,hora_fin_asig,id_estudio_asig) VALUES ('$agente_asig','$cedula_asig','$estudio_asig','$fecha_asig','$hora_asig','$hora_fin_asig','$id_estudio_asig')";
        return ejecutarConsulta($sql);
    }

    public function editar(
        $id_asig,
        $hora_fin_asig,
    ) {
        $sql = "UPDATE asignacionestudio SET hora_fin_asig='$hora_fin_asig'
	WHERE id_asig='$id_asig'";
        return ejecutarConsulta($sql);
    }
    public function editar_clave($id_asig, $clavehash)
    {
        $sql = "UPDATE asignacionestudio SET password='$clavehash' WHERE id_asig='$id_asig'";
        return ejecutarConsulta($sql);
    }
    public function mostrar_clave($id_asig)
    {
        $sql = "SELECT id_asig, password FROM asignacionestudio WHERE id_asig='$id_asig'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function desactivar($id_asig)
    {
        $sql = "UPDATE asignacionestudio SET estado='0' WHERE id_asig='$id_asig'";
        return ejecutarConsulta($sql);
    }
    public function activar($id_asig)
    {
        $sql = "UPDATE asignacionestudio SET estado='1' WHERE id_asig='$id_asig'";
        return ejecutarConsulta($sql);
    }

    //metodo para mostrar registros
    public function mostrar($id_asig)
    {
        $sql = "SELECT * FROM asignacionestudio WHERE id_asig='$id_asig'";
        return ejecutarConsultaSimpleFila($sql);
    }
  

    //listar registros
    public function listar($agente)
    {
        $sql = "SELECT * FROM asignacionestudio  WHERE LEFT(fecha_asig,10) = CURDATE()  and `nomb_asig` = '$agente'";

        return ejecutarConsulta($sql);
    }
    public function listaru()
    {
        $sql =
            'SELECT * FROM asignacionestudio WHERE hora_fin_asig = 6 AND estado = 1  ORDER BY agente_asig ASC';
        return ejecutarConsulta($sql);
    }

    public function cantidad_usuario()
    {
        $sql = 'SELECT count(*) agente_asig FROM asignacionestudio';
        return ejecutarConsulta($sql);
    }

    //Función para verificar el acceso al sistema
    public function verificar($fecha_asig, $clave)
    {
        $sql = "SELECT u.codigo_persona,u.id_asig,u.agente_asig,u.cedula_asig,u.fecha_asig,u.hora_fin_asig,u.hora_asig,u.id_estudio_asig,u.fecha_asig, tu.agente_asig as tipousuario FROM editarasig u INNER JOIN tipousuario tu ON u.hora_fin_asig=tu.hora_fin_asig WHERE fecha_asig='$fecha_asig' AND password='$clave' AND estado='1'";
        return ejecutarConsulta($sql);
    }

    //listar y mostrar en select
    public function select()
    {
        $sql = 'SELECT * FROM asignacionestudio';
        return ejecutarConsulta($sql);
    }
}

?>
