<?php
session_start();
require_once '../modelos/editarasig.php';

$asignacionestudio = new Editarasig();

$idusuarioc = isset($_POST['idusuarioc'])
  ? limpiarCadena($_POST['idusuarioc'])
  : '';
$clavec = isset($_POST['clavec']) ? limpiarCadena($_POST['clavec']) : '';
$id_asig = isset($_POST['id_asig']) ? limpiarCadena($_POST['id_asig']) : '';
$agente_asig = isset($_POST['agente_asig'])
  ? limpiarCadena($_POST['agente_asig'])
  : '';
$cedula_asig = isset($_POST['cedula_asig'])
  ? limpiarCadena($_POST['cedula_asig'])
  : '';
$estudio_asig = isset($_POST['estudio_asig'])
  ? limpiarCadena($_POST['estudio_asig'])
  : '';
$fecha_asig = isset($_POST['fecha_asig'])
  ? limpiarCadena($_POST['fecha_asig'])
  : '';
$hora_asig = isset($_POST['hora_asig'])
  ? limpiarCadena($_POST['hora_asig'])
  : '';
$hora_fin_asig = isset($_POST['hora_fin_asig'])
  ? limpiarCadena($_POST['hora_fin_asig'])
  : '';

switch ($_GET["op"]) {
  case 'guardaryeditar':
    if (empty($id_asig)) {
      $id_asig = $_SESSION["id_asig"];
      $rspta = $asignacionestudio->insertar(
        $agente_asig,
        $estudio_asig,
        $cedula_asig,
        $fecha_asig,
        $hora_asig,
        $hora_fin_asig,
        $id_estudio_asig
      );
      echo $rspta
        ? "Datos registrados correctamente"
        : "No se pudo registrar todos los datos del asignacionestudio";
    } else {
      $rspta = $asignacionestudio->editar($id_asig, $hora_fin_asig);
      echo $rspta
        ? "Datos actualizados correctamente"
        : "No se pudo actualizar los datos";
    }
    break;

  case 'desactivar':
    $rspta = $asignacionestudio->desactivar($id_asig);
    echo $rspta
      ? "Datos desactivados correctamente"
      : "No se pudo desactivar los datos";
    break;

  case 'activar':
    $rspta = $asignacionestudio->activar($id_asig);
    echo $rspta
      ? "Datos activados correctamente"
      : "No se pudo activar los datos";
    break;

  case 'mostrar':
    $rspta = $asignacionestudio->mostrar($id_asig);
    echo json_encode($rspta);
    break;

  case 'editar_clave':
    $clavehash = hash("SHA256", $clavec);

    $rspta = $asignacionestudio->editar_clave($idusuarioc, $clavehash);
    echo $rspta
      ? "Password actualizado correctamente"
      : "No se pudo actualizar el password";
    break;

  case 'mostrar_clave':
    $rspta = $asignacionestudio->mostrar_clave($id_asig);
    echo json_encode($rspta);
    break;

  case 'listar':
    $rspta = $asignacionestudio->listar();
    //declaramos un array
    $data = [];

    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => $reg->id_asig
          ? '<button class="btn btn-warning btn-xs" onclick="mostrar(' .
            $reg->id_asig .
            ')"><i class="fa fa-pencil"></i> Establecer hora fin</button>'
          : '<button class="btn btn-warning btn-xs" onclick="mostrar(' .
            $reg->id_asig .
            ')"><i class="fa fa-pencil"></i></button>',
        "1" => $reg->agente_asig,
        "2" => $reg->estudio_asig,
        "3" => $reg->fecha_asig,
        "4" => $reg->hora_asig,
        "5" => $reg->hora_fin_asig,
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

  case 'verificar':
    //validar si el asignacionestudio tiene acceso al sistema
    $logina = $_POST['logina'];
    $clavea = $_POST['clavea'];

    //Hash SHA256 en la contraseña
    $clavehash = hash("SHA256", $clavea);

    $rspta = $asignacionestudio->verificar($logina, $clavehash);

    $fetch = $rspta->fetch_object();

    if (isset($fetch)) {
      # Declaramos la variables de sesion
      $_SESSION['id_asig'] = $fetch->id_asig;
      $id = $fetch->id_asig;
      $_SESSION['agente_asig'] = $fetch->agente_asig;
      $_SESSION['hora_fin_asig'] = $fetch->hora_fin_asig;
      $_SESSION['fecha_asig'] = $fetch->fecha_asig;
      $_SESSION['tipousuario'] = $fetch->tipousuario;
      $_SESSION['departamento'] = $fetch->hora_asig;

      require "../config/Conexion.php";

      $sql = "UPDATE usuarios SET iteracion='1' WHERE id_asig='$id'";
      echo $sql;
      ejecutarConsulta($sql);
    }

    echo json_encode($fetch);

    break;

  case 'salir':
    //Limpiamos las variables de sesión
    session_unset();
    //Destruìmos la sesión
    session_destroy();
    //Redireccionamos al fecha_asig
    header('Location: http://192.168.0.123');

    break;
}
