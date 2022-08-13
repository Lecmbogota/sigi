<?php 
//incluir la conexion de base de datos
require "../config/Conexionasis.php";
class Estudio{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($Cliente,$Estudio,$Nivel,$Muestra,$Fecha_Inicio_Estudio,$Fecha_Entrega_Estudio,$TMO,$TME){
	date_default_timezone_set('America/Bogota');
	$sql="INSERT INTO estudios (Cliente,Estudio,Nivel,Muestra,Fecha_Inicio_Estudio,Fecha_Entrega_Estudio,TMO,TME) VALUES ('$Cliente','$Estudio','$Nivel','$Muestra','$Fecha_Inicio_Estudio','$Fecha_Entrega_Estudio','$TMO','$TME')";
	return ejecutarConsulta($sql);

}

public function editar($id_Estudio,$Cliente,$Estudio,$Nivel,$Muestra,$Fecha_Inicio_Estudio,$Fecha_Entrega_Estudio,$TMO,$TME,$Fecha_Creacion){
	$sql="UPDATE estudios SET Cliente='$Cliente',Estudio='$Estudio',Nivel='$Nivel',Muestra='$Muestra',Fecha_Inicio_Estudio='$Fecha_Inicio_Estudio',Fecha_Entrega_Estudio='$Fecha_Entrega_Estudio',TMO='$TMO',TME='$TME' ,Fecha_Creacion='$Fecha_Creacion' WHERE id_Estudio='$id_Estudio'";
	 return ejecutarConsulta($sql);

}

//metodo para mostrar registros
public function mostrar($id_Estudio){
	$sql="SELECT * FROM estudios WHERE id_Estudio='$id_Estudio'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros
public function listar(){
	$sql="SELECT * FROM estudios";
	return ejecutarConsulta($sql);
}

public function cantidad_usuario(){
	$sql="SELECT count(*) Cliente FROM estudios";
	return ejecutarConsulta($sql);
}
//listar y mostrar en select
public function select(){
	$sql="SELECT * FROM estudios";
	return ejecutarConsulta($sql);
}

}

 ?>