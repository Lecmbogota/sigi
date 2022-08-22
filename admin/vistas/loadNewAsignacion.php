<?php
require '../config/Conexion.php';

if (isset($_POST['save_multi_select'])) {
    $id_estudio_asig = $_POST['estudio'];
    $cedula_asig = $_POST['agente'];
    $fecha_asig = $_POST['fecha_asignacion'];
    $hora_asig = $_POST['horaasig'];
    foreach ($cedula_asig as $item) {
        // echo $item."<br>";
        $query = "INSERT INTO asignacionestudio (cedula_asig,id_estudio_asig,fecha_asig,hora_asig) VALUES ('$item','$id_estudio_asig','$fecha_asig','$hora_asig')";
        $query_run = mysqli_query($conexion, $query);

        $query =
            'UPDATE asignacionestudio INNER JOIN capacitacion ON asignacionestudio.cedula_asig = capacitacion.cedulacap  SET asignacionestudio.agente_asig = capacitacion.agentecap';
        $query_run = mysqli_query($conexion, $query);

        $query =
            'UPDATE asignacionestudio INNER JOIN capacitacion ON asignacionestudio.id_estudio_asig = capacitacion.idestudiocap SET asignacionestudio.estudio_asig = capacitacion.estudio';
        $query_run = mysqli_query($conexion, $query);
    }
    if ($query_run) {
        header('Location: http://192.168.0.122/sigi/admin/vistas/asignar.php');
    }
}
?>
