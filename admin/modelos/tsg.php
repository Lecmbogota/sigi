<?php
//incluir la conexion de base de datos
require '../config/Conexion.php';

class Tsg
{
    public function __construct()
    {
    }


     public function eliminaregistro($id_tsg)
    {
        $sql = "DELETE FROM tsg WHERE id_tsg='$id_tsg'";
        return ejecutarConsulta($sql);
    }
    public function listar()
    {
        $sql = 'SELECT * FROM tsg';
        return ejecutarConsulta($sql);
    }
}

?>
