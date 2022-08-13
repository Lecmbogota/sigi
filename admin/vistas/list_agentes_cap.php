<?php

require "../config/Conexion.php";


$rspta = mysqli_query($conexion,"SELECT DISTINCT agentecap,cedulacap FROM capacitacion  ");
echo'<option disabled selected>Selecccionar...</option>';
while ($row = mysqli_fetch_array($rspta)){
    echo'<option value="'.$row['cedulacap'].'">'.$row['agentecap'].'</option>';
}