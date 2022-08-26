<?php
//incluir la conexion de base de datos
require '../config/Conexion.php';
class Estudio
{
    //implementamos nuestro constructor
    public function __construct()
    {
    }

    //metodo insertar regiustro
    public function insertar(
        $Cliente,
        $Estudio,
        $Nivel,
        $PCotizacion,
        $PComision,
        $Muestra,
        $Fecha_Inicio_Estudio,
        $Fecha_Entrega_Estudio,
        $TMO,
        $TME,
        $Estado
    ) {
        date_default_timezone_set('America/Bogota');
        $sql = "INSERT INTO estudios (Cliente,Estudio,Nivel,PCotizacion,PComision, Muestra,Fecha_Inicio_Estudio,Fecha_Entrega_Estudio,TMO,TME,Estado) VALUES ('$Cliente','$Estudio','$Nivel','$PCotizacion','$PComision','$Muestra','$Fecha_Inicio_Estudio','$Fecha_Entrega_Estudio','$TMO','$TME','1')";
        return ejecutarConsulta($sql);
    }

    public function editar(
        $id_Estudio,
        $Cliente,
        $Estudio,
        $Nivel,
        $PCotizacion,
        $PComision,
        $Muestra,
        $Fecha_Inicio_Estudio,
        $Fecha_Entrega_Estudio,
        $TMO,
        $TME,
        $Estado,
        $Fecha_Creacion
    ) {
        $sql = "UPDATE estudios SET Cliente='$Cliente',Estudio='$Estudio',Nivel='$Nivel',PCotizacion='$PCotizacion',PComision='$PComision',Muestra='$Muestra',Fecha_Inicio_Estudio='$Fecha_Inicio_Estudio',Fecha_Entrega_Estudio='$Fecha_Entrega_Estudio',TMO='$TMO',TME='$TME',Estado='1' WHERE id_Estudio='$id_Estudio'";
        return ejecutarConsulta($sql);
    }
    public function eliminaregistro($id_Estudio)
    {
        $sql = "DELETE FROM estudios WHERE id_Estudio='$id_Estudio'";
        return ejecutarConsulta($sql);
    }
    public function desactivar($id_Estudio)
    {
        $sql = "UPDATE estudios SET Estado='0' WHERE id_Estudio='$id_Estudio'";
        return ejecutarConsulta($sql);
    }
    public function activar($id_Estudio)
    {
        $sql = "UPDATE estudios SET Estado='1' WHERE id_Estudio='$id_Estudio'";
        return ejecutarConsulta($sql);
    }

    //metodo para mostrar registros
    public function mostrar($id_Estudio)
    {
        $sql = "SELECT * FROM estudios WHERE id_Estudio='$id_Estudio'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //listar registros
    public function listar()
    {
        $sql = 'SELECT * FROM estudios';
        return ejecutarConsulta($sql);
    }

    public function cantidad_usuario()
    {
        $sql = 'SELECT count(*) Cliente FROM estudios';
        return ejecutarConsulta($sql);
    }

    public function Selectes()
    {
        $sql = 'SELECT * FROM estudios WHERE Estado = 1 ORDER BY Estudio ASC';
        return ejecutarConsulta($sql);
    }
}

?>
