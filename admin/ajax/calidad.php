<?php
session_start();
require_once '../modelos/calidad.php';

$carga = new Carga();



$id_carga = isset( $_POST[ 'id_carga' ] )? limpiarCadena( $_POST[ 'id_carga' ] ):'';
$ee_id = isset( $_POST[ 'ee_id' ] )? limpiarCadena( $_POST[ 'ee_id' ] ):'';
$ee_encuestador = isset( $_POST[ 'ee_encuestador' ] )? limpiarCadena( $_POST[ 'ee_encuestador' ] ):'';
$ee_fecha = isset( $_POST[ 'ee_fecha' ] )? limpiarCadena( $_POST[ 'ee_fecha' ] ):'';
$ee_estudio = isset( $_POST[ 'ee_estudio' ] )? limpiarCadena( $_POST[ 'ee_estudio' ] ):'';
$ee_estatus = isset( $_POST[ 'ee_estatus' ] )? limpiarCadena( $_POST[ 'ee_estatus' ] ):'';


switch ($_GET["op"]) {
	
	

	case 'desactivar':
		$rspta=$carga->desactivar($id_carga);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
	break;

	case 'activar':
		$rspta=$carga->activar($id_carga);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
	break;
	
	
	case 'listar':
		$rspta=$carga->listar();
		//declaramos un array
		$data=Array();


		while ($reg=$rspta->fetch_object()) {
			$data[]=array(

				"0"=>($reg->ee_estatus)?'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->id_carga.')"><i class="fa fa-close"></i></button>':''.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->id_carga.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->ee_id,	
				"3"=>$reg->ee_encuestador,		
				"2"=>$reg->ee_estudio,
                "4"=>$reg->ee_fecha,				
				"5"=>($reg->ee_estatus)?'<span class="label bg-green">EFECTIVA</span>':'<span class="label bg-red">ANULADA</span>'
				);
		}

		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

	break;

    }