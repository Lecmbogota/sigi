<?php
$con = mysqli_connect('192.168.0.122', 'operative', 'Operative2020*', 'sigi');

if (isset($_POST['save_multi_select'])) {
    $idcliente = $_POST['idcliente'];
    $idestudiocap = $_POST['estudio'];
    $calificacion = $_POST['calificacion'];
    $fecha_capacitacion = $_POST['fecha_capacitacion'];
    foreach ($idcliente as $item) {
        // echo $item."<br>";
        $query = "INSERT INTO capacitacion (cedulacap,idestudiocap,calificacion,fecha_capacitacion) VALUES ('$item','$idestudiocap','$calificacion','$fecha_capacitacion')";

        $query_run = mysqli_query($con, $query);
        $query =
            'UPDATE capacitacion INNER JOIN usuarios SET capacitacion.agentecap = CONCAT ( usuarios.nombre, " ", usuarios.apellidos ) WHERE capacitacion.cedulacap = usuarios.cedula';
        $query_run = mysqli_query($con, $query);

        $query =
            'UPDATE capacitacion INNER JOIN estudios ON capacitacion.idestudiocap = estudios.id_Estudio SET capacitacion.estudio = estudios.Estudio';
        $query_run = mysqli_query($con, $query);
    }
    if ($query_run) {
        header(
            'Location: http://192.168.0.122/sigi/admin/vistas/capacitacion.php'
        );
    }
}
?>
