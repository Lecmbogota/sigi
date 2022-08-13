<?php 
//incluir la conexion de base de datos
require "../config/Conexionasis.php";
class Carga{


	//implementamos nuestro constructor
public function __construct(){

}


public function desactivar($id_carga){
	$sql="UPDATE ee_carga SET ee_estatus='0' WHERE id_carga='$id_carga'";
	return ejecutarConsulta($sql);
}
public function activar($id_carga){
	$sql="UPDATE ee_carga SET ee_estatus='1' WHERE id_carga='$id_carga'";
	return ejecutarConsulta($sql);
}


//listar registros
public function listar(){
	$sql="SELECT * FROM ee_carga";
	return ejecutarConsulta($sql);
}

}

 ?>
