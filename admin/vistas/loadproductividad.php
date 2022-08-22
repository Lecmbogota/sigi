<?php

require '../config/Conexion.php';

for ($e = 1; $e < 2; $e++) {
    $query =
        'DELETE t1 FROM ee_carga t1 INNER JOIN ee_carga t2 WHERE t1.id_carga > t2.id_carga AND t1.ee_id = t2.ee_id';
    $query_run = mysqli_query($conexion, $query);
}

?>
