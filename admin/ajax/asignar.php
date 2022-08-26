<?php
session_start();
require_once '../modelos/asignar.php';

$asignar = new Asignar();

$id_asig = isset($_POST['id_asig']) ? limpiarCadena($_POST['id_asig']) : '';
$agente_asig = isset($_POST['cedula']) ? limpiarCadena($_POST['cedula']) : '';
$estudio_asig = isset($_POST['estudio'])
  ? limpiarCadena($_POST['estudio'])
  : '';
$fecha_asig = isset($_POST['fecha_asignacion'])
  ? limpiarCadena($_POST['fecha_asignacion'])
  : '';
$hora_asig = isset($_POST['horaasig']) ? limpiarCadena($_POST['horaasig']) : '';

switch ($_GET['op']) {
  case 'guardareditar':
    if (empty($id_asig)) {
      $rspta = $asignar->insertar(
        $agente_asig,
        $estudio_asig,
        $fecha_asig,
        $hora_asig
      );
      echo $rspta
        ? 'Datos registrados correctamente'
        : 'No se pudo registrar todos los datos del usuario';
    } else {
      $rspta = $asignar->editar(
        id_asig,
        $agente_asig,
        $estudio_asig,
        $fecha_asig,
        $hora_asig
      );
    }
    break;

  case 'mostrar':
    $rspta = $asignar->mostrar($id_asig);
    echo json_encode($rspta);
    break;

  case 'eliminaregistro':
    $rspta = $asignar->eliminaregistro($id_asig);
    echo $rspta
      ? ' Registro Eliminado correctamente'
      : ' El Registro no pudo ser Eliminado';
    break;

  case 'listar':
    $rspta = $asignar->listar();
    //declaramos un array
    $data = [];

    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => $reg->id_asig
          ? '<button class="btn btn-danger btn-xs" onclick="eliminaregistro(' .
            $reg->id_asig .
            ')"><i class="fa fa-times"></i> BORRAR</button>'
          : '<button class="btn btn-danger btn-xs" onclick="eliminaregistro(' .
            $reg->id_asig .
            ')"><i class="fa fa-times"></i> BORRAR</button>',
        '1' => $reg->agente_asig,
        '2' => $reg->estudio_asig,
        '3' => $reg->fecha_asig,
        '4' => $reg->hora_asig,
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

  case 'selectAgente':
    require_once "../modelos/capacitacion.php";
    $capacitacion = new Capacitacion();
    $rspta = $capacitacion->listaru();

    while ($reg = $rspta->fetch_object()) {
      echo '<option value=' .
        $reg->agentecap .
        '>' .
        $reg->agentecap .
        '</option>';
    }
    break;

  case 'selectEstudio':
    require_once "../modelos/capacitacion.php";
    $capacitacion = new Capacitacion();
    $rspta = $capacitacion->Selectes();

    while ($reg = $rspta->fetch_object()) {
      echo '<option value=' . $reg->estudio . '>' . $reg->estudio . '</option>';
    }
    break;
}
