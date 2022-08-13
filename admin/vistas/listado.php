<?php

require "../config/Conexion.php";


$rspta = mysqli_query($conexion,"SELECT capacitacion.id_capacitacion, estudios.Estudio , usuarios.nombre, capacitacion.calificacion, capacitacion.fecha_capacitacion FROM capacitacion 
INNER JOIN usuarios ON capacitacion.idusuario = usuarios.idusuario 
INNER JOIN estudios ON capacitacion.estudio = estudios.id_Estudio");

while ($row = mysqli_fetch_array($rspta)){
    
    echo'<option value="'.$row['Estudio'].'">'.$row['Estudio'].'</option>';
}


