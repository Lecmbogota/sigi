<?php

require '../config/Conexion.php';

$rspta = mysqli_query(
    $conexion,
    'SELECT DISTINCT cedulacap,agentecap FROM capacitacion '
);
while ($row = mysqli_fetch_array($rspta)) {
    echo '<option value="' .
        $row['cedulacap'] .
        '">' .
        $row['agentecap'] .
        '</option>';
}
