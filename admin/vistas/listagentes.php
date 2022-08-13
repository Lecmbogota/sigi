<?php

require '../config/Conexion.php';

$rspta = mysqli_query( $conexion, 'SELECT *  FROM usuarios WHERE estado = 1 and idtipousuario = 6'   );
echo'<option disabled selected>Selecccionar...</option>';
while ( $row = mysqli_fetch_array( $rspta ) ) {
    echo'<option value="'.$row[ 'cedula' ].'" >'.$row[ 'nombre'].' '.$row[ 'apellidos'].'</option>';
}