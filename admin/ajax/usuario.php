<?php
session_start();
require_once '../modelos/Usuario.php';

$usuario = new Usuario();

$idusuarioc = isset($_POST['idusuarioc'])
  ? limpiarCadena($_POST['idusuarioc'])
  : '';
$clavec = isset($_POST['clavec']) ? limpiarCadena($_POST['clavec']) : '';
$idusuario = isset($_POST['idusuario'])
  ? limpiarCadena($_POST['idusuario'])
  : '';
$nombre = isset($_POST['nombre']) ? limpiarCadena($_POST['nombre']) : '';
$cedula = isset($_POST['cedula']) ? limpiarCadena($_POST['cedula']) : '';
$apellidos = isset($_POST['apellidos'])
  ? limpiarCadena($_POST['apellidos'])
  : '';
$login = isset($_POST['login']) ? limpiarCadena($_POST['login']) : '';
$iddepartamento = isset($_POST['iddepartamento'])
  ? limpiarCadena($_POST['iddepartamento'])
  : '';
$idtipousuario = isset($_POST['idtipousuario'])
  ? limpiarCadena($_POST['idtipousuario'])
  : '';
$email = isset($_POST['email']) ? limpiarCadena($_POST['email']) : '';
$codigo_persona = isset($_POST['codigo_persona'])
  ? limpiarCadena($_POST['codigo_persona'])
  : '';
$password = isset($_POST['clave']) ? limpiarCadena($_POST['clave']) : '';
$usuariocreado = isset($_POST['nombre']) ? limpiarCadena($_POST['nombre']) : '';
$usr_rotator = isset($_POST['usr_rotator'])
  ? limpiarCadena($_POST['usr_rotator'])
  : '';
$pwd_rotator = isset($_POST['pwd_rotator'])
  ? limpiarCadena($_POST['pwd_rotator'])
  : '';

switch ($_GET["op"]) {
  case 'guardaryeditar':
    //Hash SHA256 para la contraseña
    $clavehash = hash("SHA256", $password);

    if (empty($idusuario)) {
      $idusuario = $_SESSION["idusuario"];
      $rspta = $usuario->insertar(
        $nombre,
        $apellidos,
        $cedula,
        $login,
        $iddepartamento,
        $idtipousuario,
        $email,
        $clavehash,
        $usuariocreado,
        $codigo_persona,
        $usr_rotator,
        $pwd_rotator
      );
      echo $rspta
        ? "Datos registrados correctamente"
        : "No se pudo registrar todos los datos del usuario";
    } else {
      $rspta = $usuario->editar(
        $idusuario,
        $nombre,
        $apellidos,
        $cedula,
        $login,
        $iddepartamento,
        $idtipousuario,
        $email,
        $usuariocreado,
        $codigo_persona,
        $usr_rotator,
        $pwd_rotator
      );
      echo $rspta
        ? "Datos actualizados correctamente"
        : "No se pudo actualizar los datos";
    }
    break;

  case 'desactivar':
    $rspta = $usuario->desactivar($idusuario);
    echo $rspta
      ? "Datos desactivados correctamente"
      : "No se pudo desactivar los datos";
    break;

  case 'activar':
    $rspta = $usuario->activar($idusuario);
    echo $rspta
      ? "Datos activados correctamente"
      : "No se pudo activar los datos";
    break;

  case 'mostrar':
    $rspta = $usuario->mostrar($idusuario);
    echo json_encode($rspta);
    break;

  case 'editar_clave':
    $clavehash = hash("SHA256", $clavec);

    $rspta = $usuario->editar_clave($idusuarioc, $clavehash);
    echo $rspta
      ? "Password actualizado correctamente"
      : "No se pudo actualizar el password";
    break;

  case 'mostrar_clave':
    $rspta = $usuario->mostrar_clave($idusuario);
    echo json_encode($rspta);
    break;

  case 'listar':
    $rspta = $usuario->listar();
    //declaramos un array
    $data = [];

    while ($reg = $rspta->fetch_object()) {
      $data[] = [
        "0" => $reg->estado
          ? '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idusuario .')"><i class="fa fa-pencil"></i></button>' .' ' .'<button class="btn btn-info btn-xs" onclick="mostrar_clave(' .
            $reg->idusuario .
            ')"><i class="fa fa-key"></i></button>'
          : '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idusuario .')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-info btn-xs" onclick="mostrar_clave(' .
            $reg->idusuario .
            ')"><i class="fa fa-key"></i></button>',
        "1" => $reg->nombre,
        "2" => $reg->apellidos,
        "3" => $reg->cedula,
        "4" => $reg->usr_rotator,
        "5" => $reg->estado
          ? '<a" onclick="desactivar(' .
            $reg->idusuario .
            ')"><i class="fa fa-toggle-on fa-2x" style="color:green"></i></a</div>'
          : '<a onclick="activar(' .
            $reg->idusuario .
            ')"><i class="fa fa-toggle-off fa-2x" style="color:red"></i></a></div>',
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
    //validar si el usuario tiene acceso al sistema
    $logina = $_POST['logina'];
    $clavea = $_POST['clavea'];

    //Hash SHA256 en la contraseña
    $clavehash = hash("SHA256", $clavea);

    $rspta = $usuario->verificar($logina, $clavehash);

    $fetch = $rspta->fetch_object();

    if (isset($fetch)) {
      # Declaramos la variables de sesion
      $_SESSION['idusuario'] = $fetch->idusuario;
      $id = $fetch->idusuario;
      $_SESSION['nombre'] = $fetch->nombre;
      $_SESSION['codigo_persona'] = $fetch->codigo_persona;
      $_SESSION['login'] = $fetch->login;
      $_SESSION['tipousuario'] = $fetch->tipousuario;
      $_SESSION['departamento'] = $fetch->iddepartamento;

      require "../config/Conexion.php";

      $sql = "UPDATE usuarios SET iteracion='1' WHERE idusuario='$id'";
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
    //Redireccionamos al login
    header('Location: http://192.168.0.123');

    break;
}
