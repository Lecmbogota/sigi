<?php
session_start();
require_once '../modelos/estudio.php';

$estudio = new Estudio();

$id_Estudio = isset($_POST['id_Estudio'])
  ? limpiarCadena($_POST['id_Estudio'])
  : '';
$Cliente = isset($_POST['Cliente']) ? limpiarCadena($_POST['Cliente']) : '';
$Estudio = isset($_POST['Estudio']) ? limpiarCadena($_POST['Estudio']) : '';
$Nivel = isset($_POST['Nivel']) ? limpiarCadena($_POST['Nivel']) : '';
$PCotizacion = isset($_POST['PCotizacion'])
  ? limpiarCadena($_POST['PCotizacion'])
  : '';
$PComision = isset($_POST['PComision'])
  ? limpiarCadena($_POST['PComision'])
  : '';
$Muestra = isset($_POST['Muestra']) ? limpiarCadena($_POST['Muestra']) : '';
$Fecha_Inicio_Estudio = isset($_POST['Fecha_Inicio_Estudio'])
  ? limpiarCadena($_POST['Fecha_Inicio_Estudio'])
  : '';
$Fecha_Entrega_Estudio = isset($_POST['Fecha_Entrega_Estudio'])
  ? limpiarCadena($_POST['Fecha_Entrega_Estudio'])
  : '';
$TMO = isset($_POST['TMO']) ? limpiarCadena($_POST['TMO']) : '';
$TME = isset($_POST['TMO']) ? limpiarCadena($_POST['TME']) : '';
$Estado = isset($_POST['Estado']) ? limpiarCadena($_POST['Estado']) : '';
$slash = isset($_POST['slash']) ? limpiarCadena($_POST['slash']) : '';
$Avance_estudio = isset($_POST['Avance_estudio'])
  ? limpiarCadena($_POST['Avance_estudio'])
  : '';

switch ($_GET['op']) {
  case 'guardareditar':
    if (empty($id_Estudio)) {
      $rspta = $estudio->insertar(
        $Cliente,
        $Estudio,
        $Nivel,
        $PCotizacion,
        $Muestra,
        $Fecha_Inicio_Estudio,
        $Fecha_Entrega_Estudio,
        $TMO,
        $TME,
        $Estado,
        $slash,
        $Avance_estudio
      );
      echo $rspta
        ? 'Datos del Estudio registrados correctamente'
        : 'No se pudo registrar todos los datos del Estudio';
    } else {
      $rspta = $estudio->editar(
        $id_Estudio,
        $Cliente,
        $Estudio,
        $Nivel,
        $PCotizacion,
        $Muestra,
        $Fecha_Inicio_Estudio,
        $Fecha_Entrega_Estudio,
        $TMO,
        $TME,
        $slash,
        $Avance_estudio
      );
      echo $rspta
        ? 'Datos del Estudio actualizados correctamente'
        : 'No se pudo actualizar los datos del Estudio';
    }
    break;

  case 'eliminaregistro':
    $rspta = $estudio->eliminaregistro($id_Estudio);
    echo $rspta
      ? ' Estudio Eliminado correctamente'
      : ' El Estudio no pudo ser Eliminado';
    break;

  case 'mostrar':
    $rspta = $estudio->mostrar($id_Estudio);
    echo json_encode($rspta);
    break;

  case 'listar':
    $rspta = $estudio->listar();
    //declaramos un array
    $data = [];

    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => $reg->Estado
          ? '<div class="btn-group btn-group-toggle" data-toggle="buttons"><button class="btn btn-warning btn-xs" onclick="mostrar(' .
            $reg->id_Estudio .
            ')"><i class="fa fa-pencil"></i></button>' .
            ' ' .
            '<button class="btn btn-danger btn-xs" onclick="eliminaregistro(' .
            $reg->id_Estudio .
            ')"><i class="fa fa-times"></i></button>'
          : '<div class="btn-group btn-group-toggle" data-toggle="buttons"><button class="btn btn-warning btn-xs" onclick="mostrar(' .
            $reg->id_Estudio .
            ')"><i class="fa fa-pencil"></i></button>' .
            ' ' .
            '<button class="btn btn-danger btn-xs" onclick="eliminaregistro(' .
            $reg->id_Estudio .
            ')"><i class="fa fa-times"></i></button>',
        "1" => $reg->Estado
          ? '<button class="btn btn-success btn-xs " onclick="desactivar(' .
            $reg->id_Estudio .
            ')disabled"><i class="fa fa-unlock" aria-hidden="true"></i> ACTIVO  .</button>'
          : '<button class="btn btn-danger btn-xs " onclick="activar(' .
            $reg->id_Estudio .
            ')disabled"><i class="fa fa-lock" aria-hidden="true"></i> CERRADO</button>',

        '2' => $reg->Cliente,
        '3' => $reg->Estudio,
        '4' => $reg->Nivel,
        '5' => $reg->PCotizacion,
        '6' => $reg->Muestra,
        '7' => $reg->Fecha_Inicio_Estudio,
        '8' => $reg->Fecha_Entrega_Estudio,
        '9' => $reg->TMO,
        '10' => $reg->TME,
        "11" => $reg->Estado
          ? '<progress value="' .
            $reg->Avance_estudio .
            '" max="' .
            $reg->Muestra .
            '"></progress>' .
            $reg->Avance_estudio .
            '' .
            $reg->slash .
            '' .
            $reg->Muestra .
            ''
          : '<progress value="' .
            $reg->Avance_estudio .
            '" max="' .
            $reg->Muestra .
            '"></progress>' .
            $reg->Avance_estudio .
            '' .
            $reg->slash .
            '' .
            $reg->Muestra .
            '',
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

  case 'selectEstudio':
    $rspta = $estudio->select();
    while ($reg = $rspta->fetch_object()) {
      echo '<option value=' .
        $reg->id_Estudio .
        '>' .
        $reg->Estudio .
        '</option>';
    }
    break;

  case 'desactivar':
    $rspta = $estudio->desactivar($id_Estudio);
    echo $rspta
      ? "Estudio cerrado correctamente"
      : "El estudio no pudo ser cerrado correctamente";
    break;

  case 'activar':
    $rspta = $estudio->activar($id_Estudio);
    echo $rspta
      ? "Estudio reactivado correctamente"
      : "El estudio no pudo ser reactivado correctamente";
    break;
}
