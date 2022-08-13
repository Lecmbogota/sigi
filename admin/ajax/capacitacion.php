<?php
session_start();
require_once '../modelos/capacitacion.php';

$Capacitacion = new Capacitacion();

$id_capacitacion  = isset( $_POST[ 'id_capacitacion' ] )? limpiarCadena( $_POST[ 'id_capacitacion' ] ):'';
$cedulacap = isset( $_POST[ 'documento' ] )? limpiarCadena( $_POST[ 'documento' ] ):'';
$agentecap = isset( $_POST[ 'agente' ] )? limpiarCadena( $_POST[ 'agente' ] ):'';
$estudio = isset( $_POST[ 'estudio' ] )? limpiarCadena( $_POST[ 'estudio' ] ):'';
$calificacion = isset( $_POST[ 'calificacion' ] )? limpiarCadena( $_POST[ 'calificacion' ] ):'';
$fecha_capacitacion = isset( $_POST[ 'fecha_capacitacion' ] )? limpiarCadena( $_POST[ 'fecha_capacitacion' ] ):'';

switch ( $_GET[ 'op' ] ) {
    case 'guardareditar':

    if ( empty( $id_capacitacion ) ) {
        $rspta = $Capacitacion->insertar( $agentecap, $cedulacap, $estudio, $calificacion, $fecha_capacitacion );
        echo $rspta ? 'Datos registrados correctamente' : 'No se pudo registrar todos los datos del usuario';
    } else {
        $rspta = $usuario->insertar( $agentecap, $cedulacap, $estudio, $calificacion, $fecha_capacitacion );
        echo $rspta ? 'Datos actualizados correctamente' : 'No se pudo actualizar los datos';
    }
    break;

    case 'mostrar':
    $rspta = $Capacitacion->mostrar( $id_capacitacion );
    echo json_encode( $rspta );
    break;

    case 'listar':
    $rspta = $Capacitacion->listar();
    //declaramos un array
    $data = Array();

    while ( $reg = $rspta->fetch_object() ) {
        $data[] = array(
            '0'=>$reg->id_capacitacion ,
            '1'=>$reg->agentecap,
            '2'=>$reg->cedulacap,
            '3'=>$reg->estudio,
            '4'=>$reg->calificacion,
            '5'=>$reg->fecha_capacitacion,

        );
    }

    $results = array(
        'sEcho'=>1, //info para datatables
        'iTotalRecords'=>count( $data ), //enviamos el total de registros al datatable
        'iTotalDisplayRecords'=>count( $data ), //enviamos el total de registros a visualizar
        'aaData'=>$data );

        echo json_encode( $results );

        break;

        case 'selectCapacitacion':
        $rspta = $Capacitacion->select();
        while ( $reg = $rspta->fetch_object() ) {
            echo '<option value=' . $reg->id_Estudio.'>'.$reg->Estudio.'</option>';
        }
        break;

    }