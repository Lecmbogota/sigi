<?php
session_start();
require_once '../modelos/productividadprom.php';

$productividad = new Productividad();

$id_carga = isset($_POST['id_carga']) ? limpiarCadena($_POST['id_carga']) : '';
$ee_id = isset($_POST['ee_id']) ? limpiarCadena($_POST['ee_id']) : '';
$ee_encuestador = isset($_POST['ee_encuestador'])
  ? limpiarCadena($_POST['ee_encuestador'])
  : '';
$ee_fecha = isset($_POST['ee_fecha']) ? limpiarCadena($_POST['ee_fecha']) : '';
$ee_estudio = isset($_POST['ee_estudio'])
  ? limpiarCadena($_POST['ee_estudio'])
  : '';
$ee_estatus = isset($_POST['ee_estatus'])
  ? limpiarCadena($_POST['ee_estatus'])
  : '';

switch ($_GET["op"]) {
  case 'guardaryeditar':
    //Hash SHA256 para la contraseña
    $clavehash = hash("SHA256", $password);

    if (empty($id_carga)) {
      $id_carga = $_SESSION["id_carga"];
      $rspta = $productividad->insertar(
        $ee_id,
        $ee_encuestador,
        $ee_fecha,
        $ee_estudio,
        $ee_estatus
      );
      echo $rspta
        ? "Datos registrados correctamente"
        : "No se pudo registrar todos los datos del productividad";
    } else {
      $rspta = $productividad->editar(
        $id_carga,
        $ee_id,
        $ee_encuestador,
        $ee_fecha,
        $ee_estudio,
        $ee_estatus
      );
    }
    break;

  case 'desactivar':
    $rspta = $productividad->desactivar($id_carga);
    echo $rspta
      ? "Datos desactivados correctamente"
      : "No se pudo desactivar los datos";
    break;

  case 'activar':
    $rspta = $productividad->activar($id_carga);
    echo $rspta
      ? "Datos activados correctamente"
      : "No se pudo activar los datos";
    break;

  case 'mostrar':
    $rspta = $productividad->mostrar($id_carga);
    echo json_encode($rspta);
    break;

  case 'listar':
    $rspta = $productividad->listar();
    //declaramos un array
    $data = [];

    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => $reg->id_productividad2,
        "1" => $reg->agente_prod2,
        "2" => $reg->meta_prod2,
        "3" => $reg->enc_realizadas_prod2,
        "4" => $reg->fecha_prod2,
        "5" => $reg->hora_ini_prod2,
        "6" => $reg->hora_fin_prod2,
        "7" => $reg->tiempo_muerto_prod2,
        "8" => $reg->total_horas_trabajadas_prod2,
        "9" => $reg->porcentaje_prod2,
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
}
