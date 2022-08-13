<?php 
//incluir la conexion de base de datos
require "../admin/config/Conexion.php";
class Asistencia{


	//implementamos nuestro constructor
public function __construct(){

}



public function verificarcodigo_persona($codigo_persona){
 	$sql = "SELECT * FROM usuarios WHERE codigo_persona='$codigo_persona'";
	return ejecutarConsultaSimpleFila($sql);
}

public function seleccionarcodigo_persona($codigo_persona){
    $sql = "SELECT * FROM asistencia WHERE codigo_persona = '$codigo_persona'";
	return ejecutarConsulta($sql);
}



public function registrar_inicio_gestion($codigo_persona,$tipo){
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d");
	$hora = date("H:i");
 	$sql = "INSERT INTO asistencia (codigo_persona,  tipo, fecha) VALUES ('$codigo_persona', '$tipo', '$fecha')";
    return ejecutarConsulta($sql);
}
public function registrar_fin_gestion($codigo_persona,$tipo){
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d");
	$hora = date("H:i");
 	$sql = "INSERT INTO asistencia (codigo_persona,  tipo, fecha) VALUES ('$codigo_persona', '$tipo', '$fecha')";
    return ejecutarConsulta($sql);
}
public function registrar_inicio_break($codigo_persona,$tipo){
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d");
	$hora = date("H:i");
 	$sql = "INSERT INTO asistencia (codigo_persona,  tipo, fecha) VALUES ('$codigo_persona', '$tipo', '$fecha')";
    return ejecutarConsulta($sql);
}
public function registrar_fin_break($codigo_persona,$tipo){
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d");
	$hora = date("H:i");
 	$sql = "INSERT INTO asistencia (codigo_persona,  tipo, fecha) VALUES ('$codigo_persona', '$tipo', '$fecha')";
    return ejecutarConsulta($sql);
}
public function registrar_inicio_almuerzo($codigo_persona,$tipo){
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d");
	$hora = date("H:i");
 	$sql = "INSERT INTO asistencia (codigo_persona,  tipo, fecha) VALUES ('$codigo_persona', '$tipo', '$fecha')";
    return ejecutarConsulta($sql);
}
public function registrar_fin_almuerzo($codigo_persona,$tipo){
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d");
	$hora = date("H:i");
 	$sql = "INSERT INTO asistencia (codigo_persona,  tipo, fecha) VALUES ('$codigo_persona', '$tipo', '$fecha')";
    return ejecutarConsulta($sql);
}
public function registrar_inicio_capacitacion($codigo_persona,$tipo){
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d");
	$hora = date("H:i");
 	$sql = "INSERT INTO asistencia (codigo_persona,  tipo, fecha) VALUES ('$codigo_persona', '$tipo', '$fecha')";
    return ejecutarConsulta($sql);
}
public function registrar_fin_capacitacion($codigo_persona,$tipo){
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d");
	$hora = date("H:i");
 	$sql = "INSERT INTO asistencia (codigo_persona,  tipo, fecha) VALUES ('$codigo_persona', '$tipo', '$fecha')";
    return ejecutarConsulta($sql);
}


//listar registros
public function listar(){
	$sql="SELECT * FROM asistencia";
	return ejecutarConsulta($sql);
}


}

 ?>
