<?php

require '../config/Conexion.php';
$rspta = mysqli_query(
    $conexion,
    "SELECT DISTINCT cedula,nombre,apellidos FROM usuarios  WHERE estado='1' and idtipousuario='6'"
);
while ($row = mysqli_fetch_array($rspta)) {
    echo '<option value="' .
        $row['cedula'] .
        '">' .
        $row['nombre'] .
        ' ' .
        $row['apellidos'] .
        '</option>';
}
