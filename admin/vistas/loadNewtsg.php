
        <?php
require '../config/Conexion.php';

if (isset($_POST['save_multi_select'])) {
    $id_tsg = $_POST['id_tsg'];
    $supervisor_tsg = $_POST['supervisor_tsg'];
    $agente_tsg = $_POST['agente_tsg'];
    $hora_ini_tsg = $_POST['hora_ini_tsg'];
    $hora_fin_tsg = $_POST['hora_fin_tsg'];
    foreach ($agente_tsg as $item) {
        // echo $item."<br>";
        $query = "INSERT INTO tsg (supervisor_tsg,agente_tsg,hora_ini_tsg,hora_fin_tsg) VALUES ('$supervisor_tsg','$item','$hora_ini_tsg','$hora_fin_tsg')";
        $query_run = mysqli_query($conexion, $query);

        $query =
            'UPDATE tsg INNER JOIN usuarios ON tsg.agente_tsg = usuarios.cedula SET tsg.cedula_tsg = (SELECT CONCAT(nombre, " ", apellidos) FROM usuarios where tsg.agente_tsg = usuarios.cedula)';
        $query_run = mysqli_query($conexion, $query);
    }
    if ($query_run) {
        header('Location: http://192.168.0.122/sigi/admin/vistas/tsg.php');
    }
}
?>          

