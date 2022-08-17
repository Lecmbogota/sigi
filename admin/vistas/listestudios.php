<?php

require "../config/Conexionasis.php";


$rspta = mysqli_query($conexion,"SELECT * FROM estudios");

while ($row = mysqli_fetch_array($rspta)){
    
    echo'<option value="'.$row['Estudio'].'">'.$row['Estudio'].'</option>';
}