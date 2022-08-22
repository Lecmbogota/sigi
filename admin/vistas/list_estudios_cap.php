<?php

require '../config/Conexion.php';

$rspta = mysqli_query(
    $conexion,
    'SELECT DISTINCT estudio,idestudiocap FROM capacitacion'
);
while ($row = mysqli_fetch_array($rspta)) {
    echo '<option value="' .
        $row['idestudiocap'] .
        '">' .
        $row['estudio'] .
        '</option>';
}
