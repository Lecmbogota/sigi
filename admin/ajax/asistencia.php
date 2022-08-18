<?php
require_once "../modelos/Asistencia.php";
if (strlen(session_id()) < 1) {
  session_start();
}
$asistencia = new Asistencia();

$codigo_persona = isset($_POST["codigo_persona"])
  ? limpiarCadena($_POST["codigo_persona"])
  : "";
$iddepartamento = isset($_POST["iddepartamento"])
  ? limpiarCadena($_POST["iddepartamento"])
  : "";

switch ($_GET["op"]) {
  case 'guardaryeditar':
    $result = $asistencia->verificarcodigo_persona($codigo_persona);

    if ($result > 0) {
      date_default_timezone_set('America/Bogota');
      $fecha = date("Y-m-d");
      $hora = date("H:i");

      if ($tipo == "INICIO GESTION") {
        $rspta = $asistencia->registrar_inicio_gestion($codigo_persona, $tipo);
        //$movimiento = 0;
        echo $rspta
          ? '<h3><strong>Nombres: </strong> ' .
            $result['nombre'] .
            '</h3><div class="alert alert-success"> INICIO GESTION - REGISTRADO ' .
            $hora .
            '</div>'
          : 'No se pudo registrar el ingreso';
      }

      if ($tipo == "FIN GESTION") {
        $rspta = $asistencia->registrar_fin_gestion($codigo_persona, $tipo);
        //$movimiento = 1;
        echo $rspta
          ? '<h3><strong>Nombres: </strong> ' .
            $result['nombre'] .
            '</h3><div class="alert alert-danger"> FIN GESTION - REGISTRADO ' .
            $hora .
            '</div>'
          : 'No se pudo registrar la salida';
      }

      if ($tipo == "INICIO BREAK") {
        $rspta = $asistencia->registrar_inicio_break($codigo_persona, $tipo);
        //$movimiento = 1;
        echo $rspta
          ? '<h3><strong>Nombres: </strong> ' .
            $result['nombre'] .
            '</h3><div class="alert alert-success"> INICIO BREAK - REGISTRADO ' .
            $hora .
            '</div>'
          : 'No se pudo registrar la salida';
      }

      if ($tipo == "FIN BREAK") {
        $rspta = $asistencia->registrar_fin_break($codigo_persona, $tipo);
        //$movimiento = 1;
        echo $rspta
          ? '<h3><strong>Nombres: </strong> ' .
            $result['nombre'] .
            '</h3><div class="alert alert-danger"> FIN BREAK - REGISTRADO ' .
            $hora .
            '</div>'
          : 'No se pudo registrar la salida';
      }
      if ($tipo == "INICIO ALMUERZO") {
        $rspta = $asistencia->registrar_inicio_break($codigo_persona, $tipo);
        //$movimiento = 1;
        echo $rspta
          ? '<h3><strong>Nombres: </strong> ' .
            $result['nombre'] .
            '</h3><div class="alert alert-success"> INICIO ALMUERZO - REGISTRADO ' .
            $hora .
            '</div>'
          : 'No se pudo registrar la salida';
      }

      if ($tipo == "FIN ALMUERZO") {
        $rspta = $asistencia->registrar_fin_break($codigo_persona, $tipo);
        //$movimiento = 1;
        echo $rspta
          ? '<h3><strong>Nombres: </strong> ' .
            $result['nombre'] .
            '</h3><div class="alert alert-danger"> FIN ALMUERZO - REGISTRADO ' .
            $hora .
            '</div>'
          : 'No se pudo registrar la salida';
      }
      if ($tipo == "INICIO CAPACITACION") {
        $rspta = $asistencia->registrar_inicio_break($codigo_persona, $tipo);
        //$movimiento = 1;
        echo $rspta
          ? '<h3><strong>Nombres: </strong> ' .
            $result['nombre'] .
            '</h3><div class="alert alert-success"> INICIO CAPACITACION - REGISTRADO ' .
            $hora .
            '</div>'
          : 'No se pudo registrar la salida';
      }

      if ($tipo == "FIN CAPACITACION") {
        $rspta = $asistencia->registrar_fin_break($codigo_persona, $tipo);
        //$movimiento = 1;
        echo $rspta
          ? '<h3><strong>Nombres: </strong> ' .
            $result['nombre'] .
            '</h3><div class="alert alert-danger"> FIN CAPACITACION - REGISTRADO ' .
            $hora .
            '</div>'
          : 'No se pudo registrar la salida';
      } elseif (
        $tipo != "INICIO GESTION" &&
        $tipo != "FIN GESTION" &&
        $tipo != "INICIO BREAK" &&
        $tipo != "FIN BREAK" &&
        $tipo != "INICIO ALMUERZO" &&
        $tipo != "FIN ALMUERZO" &&
        $tipo != "INICIO CAPACITACION" &&
        $tipo != "FIN CAPACITACION"
      ) {
        echo '<div class="alert alert-danger">
                       <i class="icon fa fa-warning"></i> No hay empleado registrado con esa código...!
                         </div>';
      }

      break;
    }

  case 'mostrar':
    $rspta = $asistencia->mostrar($idasistencia);
    echo json_encode($rspta);
    break;

  case 'listar':
    $rspta = $asistencia->listar();
    //declaramos un array
    $data = [];

    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" =>
          '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>',
        "1" => $reg->codigo_persona,
        "2" => $reg->nombre,
        "3" => $reg->apellidos,
        "4" => $reg->tipousuario,
        "5" => $reg->fecha_hora,
        "6" => $reg->tipo,
        "7" => $reg->fecha,
      ];
    }

    $results = [
      "sEcho" => 1, //info para datatables
      "iTotalRecords" => count($data), //enviamos el total de registros al datatable
      "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
      "aaData" => $data,
    ];
    echo json_encode($results);

    break;

  case 'listaru':
    $idusuario = $_SESSION["idusuario"];
    $rspta = $asistencia->listaru($idusuario);
    break;

  case 'listar_asistencia':
    $fecha_inicio = $_REQUEST["fecha_inicio"];
    $fecha_fin = $_REQUEST["fecha_fin"];
    $codigo_persona = $_REQUEST["idcliente"];
    $rspta = $asistencia->listar_asistencia(
      $fecha_inicio,
      $fecha_fin,
      $codigo_persona
    );
    //declaramos un array
    $data = [];

    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => $reg->fecha,
        "1" => $reg->nombre,
        "2" => $reg->tipo,
        "3" => $reg->fecha_hora,
        "4" => $reg->codigo_persona,
      ];
    }

    $results = [
      "sEcho" => 1, //info para datatables
      "iTotalRecords" => count($data), //enviamos el total de registros al datatable
      "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
      "aaData" => $data,
    ];
    echo json_encode($results);

    break;
  case 'listar_asistenciau':
    $fecha_inicio = $_REQUEST["fecha_inicio"];
    $fecha_fin = $_REQUEST["fecha_fin"];
    $codigo_persona = $_SESSION["codigo_persona"];
    $rspta = $asistencia->listar_asistencia(
      $fecha_inicio,
      $fecha_fin,
      $codigo_persona
    );
    //declaramos un array
    $data = [];

    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => $reg->fecha,
        "1" => $reg->nombre,
        "2" => $reg->tipo,
        "3" => $reg->fecha_hora,
        "4" => $reg->codigo_persona,
      ];
    }

    $results = [
      "sEcho" => 1, //info para datatables
      "iTotalRecords" => count($data), //enviamos el total de registros al datatable
      "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
      "aaData" => $data,
    ];
    echo json_encode($results);

    break;

  case 'selectPersona':
    require_once "../modelos/Usuario.php";
    $usuario = new Usuario();

    $rspta = $usuario->listar();

    while ($reg = $rspta->fetch_object()) {
      echo '<option value=' .
        $reg->codigo_persona .
        '>' .
        $reg->nombre .
        ' ' .
        $reg->apellidos .
        '</option>';
    }
    break;
}
?>
