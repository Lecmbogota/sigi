<?php
//incluir la conexion de base de datos
require '../config/Conexion.php';
class Productividad
{
    //implementamos nuestro constructor
    public function __construct()
    {
    }

    //metodo insertar regiustro
    public function insertar(
        $ee_id,
        $ee_encuestador,
        $ee_fecha,
        $ee_estudio,
        $ee_estatus
    ) {
        date_default_timezone_set('America/Bogota');
        $fechacreado = date('Y-m-d H:i:s');
        $sql = "INSERT INTO productividad (ee_id,ee_encuestador,ee_fecha,ee_estudio,ee_estatus) VALUES ('$ee_id','$ee_encuestador','$ee_fecha','$ee_estudio','$ee_estatus')";
        return ejecutarConsulta($sql);
    }

    public function editar(
        $id_carga,
        $ee_id,
        $ee_encuestador,
        $ee_fecha,
        $ee_estudio,
        $ee_estatus
    ) {
        $sql = "UPDATE productividad SET ee_id='$ee_id',ee_encuestador='$ee_encuestador',ee_fecha='$ee_fecha',ee_estudio='$ee_estudio',ee_estatus='$ee_estatus'    
	WHERE id_carga='$id_carga'";
        return ejecutarConsulta($sql);
    }

    public function desactivar($id_carga)
    {
        $sql = "UPDATE productividad SET ee_estatus='0' WHERE id_carga='$id_carga'";
        return ejecutarConsulta($sql);
    }
    public function activar($id_carga)
    {
        $sql = "UPDATE productividad SET ee_estatus='1' WHERE id_carga='$id_carga'";
        return ejecutarConsulta($sql);
    }

    //metodo para mostrar registros
    public function mostrar($id_carga)
    {
        $sql = "SELECT * FROM productividad WHERE id_carga='$id_carga'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //listar registros
    public function listar()
    {
        $sql = ' SELECT * FROM productividad';
        return ejecutarConsulta($sql);
    }

    public function cantidad_usuario()
    {
        $sql = 'SELECT count(*) nombre FROM productividad';
        return ejecutarConsulta($sql);
    }

    //listar y mostrar en select
    public function select()
    {
        $sql = 'SELECT * FROM productividad';
        return ejecutarConsulta($sql);
    }
}

?>
