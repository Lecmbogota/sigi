<?php

require '../config/Conexionasis.php';

$rspta = mysqli_query($conexion, 'SELECT DISTINCT estudio FROM capacitacion');
while ($row = mysqli_fetch_array($rspta)) {
    echo '<option value="' .
        $row['estudio'] .
        '">' .
        $row['estudio'] .
        '</option>';
}
