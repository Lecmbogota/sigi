<?php

require "../config/Conexion.php";

$cedula = $_GET[ 'param_id' ];
$rspta = mysqli_query($conexion,"SELECT DISTINCT cedulacap,agentecap FROM capacitacion WHERE cedulacap = $cedula");
while ($row = mysqli_fetch_array($rspta)){
    echo'<option value="'.$row['agentecap'].'">'.$row['cedulacap'].'</option>';
}