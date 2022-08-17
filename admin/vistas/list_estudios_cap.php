<?php

require "../config/Conexionasis.php";

$cedula = $_GET[ 'param_id' ];
$rspta = mysqli_query($conexion,"SELECT DISTINCT cedulacap,estudio FROM capacitacion WHERE cedulacap = $cedula");

while ($row = mysqli_fetch_array($rspta)){
    echo'<option value="'.$row['estudio'].'">'.$row['estudio'].'</option>';
}

    