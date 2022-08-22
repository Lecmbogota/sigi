<?php
//incluir la conexion de base de datos
require '../config/Conexion.php';

class Capacitacion
{
    //implementamos nuestro constructor

    public function __construct()
    {
    }

    //metodo insertar regiustro

    public function insertar(
        $cedulacap,
        $agentecap,
        $estudio,
        $calificacion,
        $fecha_capacitacion
    ) {
        $sql = "INSERT INTO capacitacion (cedulacap,agentecap,estudio,calificacion,fecha_capacitacion) VALUES ('$cedulacap','$agentecap','$estudio','$calificacion','$fecha_capacitacion')";
        return ejecutarConsulta($sql);
    }

    public function editar(
        $id_capacitacion,
        $cedulacap,
        $agentecap,
        $estudio,
        $calificacion,
        $fecha_capacitacion
    ) {
        $sql = "UPDATE capacitacion SET cedulacap='$cedulacap',agentecap='$agentecap',estudio='$estudio',calificacion='$calificacion',fecha_capacitacion='$fecha_capacitacion' 
	WHERE id_capacitacion ='$id_capacitacion '";
        return ejecutarConsulta($sql);
    }

    //metodo para mostrar registros

    public function mostrar($id_capacitacion)
    {
        $sql = "SELECT * FROM capacitacion WHERE id_capacitacion ='$id_capacitacion '";
        return ejecutarConsultaSimpleFila($sql);
    }

    //listar registros

    public function listar()
    {
        $sql = 'SELECT * FROM capacitacion';
        return ejecutarConsulta($sql);
    }

    public function cantidad_usuario()
    {
        $sql = 'SELECT count(*) agentecap FROM capacitacion';
        return ejecutarConsulta($sql);
    }
    public function listaru()
    {
        $sql =
            'SELECT DISTINCT agentecap FROM capacitacion ORDER BY agentecap ASC';
        return ejecutarConsulta($sql);
    }
    public function Selectes()
    {
        $sql = 'SELECT DISTINCT estudio FROM capacitacion ORDER BY estudio ASC';
        return ejecutarConsulta($sql);
    }
}

?>
