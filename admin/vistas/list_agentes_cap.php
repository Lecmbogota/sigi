<?php

require '../config/Conexionasis.php';
$idestudiocap = $_GET['param_id'];
$rspta = mysqli_query(
    $conexion,
    "SELECT DISTINCT cedulacap,agentecap FROM capacitacion  WHERE idestudiocap = $idestudiocap"
);

while ($row = mysqli_fetch_array($rspta)) {
    echo '<option value="' .
        $row['cedulacap'] .
        '">' .
        $row['agentecap'] .
        '</option>';
}
