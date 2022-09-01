<?php
session_start();
require_once '../modelos/tsg.php';

$tsg = new Tsg();

$id_tsg = isset($_POST['id_tsg']) ? limpiarCadena($_POST['id_tsg']) : '';
$agente_tsg = isset($_POST['agente_tsg'])
  ? limpiarCadena($_POST['agente_tsg'])
  : '';
$supervisor_tsg = isset($_POST['supervisor_tsg'])
  ? limpiarCadena($_POST['supervisor_tsg'])
  : '';
$hora_ini_tsg = isset($_POST['hora_ini_tsg'])
  ? limpiarCadena($_POST['hora_ini_tsg'])
  : '';
$hora_fin_tsg = isset($_POST['hora_fin_tsg'])
  ? limpiarCadena($_POST['hora_fin_tsg'])
  : '';

switch ($_GET['op']) {
  case 'mostrar':
    $rspta = $tsg->mostrar($id_tsg);
    echo json_encode($rspta);
    break;

  case 'eliminaregistro':
    $rspta = $tsg->eliminaregistro($id_tsg);
    echo $rspta
      ? ' Registro Eliminado correctamente'
      : ' El Registro no pudo ser Eliminado';
    break;

  case 'listar':
    $rspta = $tsg->listar();
    //declaramos un array
    $data = [];

    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => $reg->id_tsg
          ? '<button class="btn btn-danger btn-xs" onclick="eliminaregistro(' .
            $reg->id_tsg .
            ')"><i class="fa fa-times"></i> BORRAR</button>'
          : '<button class="btn btn-danger btn-xs" onclick="eliminaregistro(' .
            $reg->id_tsg .
            ')"><i class="fa fa-times"></i> BORRAR</button>',
        '1' => $reg->supervisor_tsg,
        '2' => $reg->cedula_tsg,
        '3' => $reg->fecha_tsg,
        '4' => $reg->hora_ini_tsg,
        '5' => $reg->hora_fin_tsg
      ];
    }

    $results = [
      'sEcho' => 1, //info para datatables
      'iTotalRecords' => count($data), //enviamos el total de registros al datatable
      'iTotalDisplayRecords' => count($data), //enviamos el total de registros a visualizar
      'aaData' => $data,
    ];

    echo json_encode($results);

    break;
}
