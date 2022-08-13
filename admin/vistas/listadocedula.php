<?php

require '../config/Conexion.php';

$cedula = $_GET[ 'param_id' ];
$rspta = mysqli_query( $conexion, " SELECT * FROM usuarios WHERE  $cedula = cedula " );

while ( $row = mysqli_fetch_array( $rspta ) ) {
    echo '<option value="'.$row[ 'nombre'].' '.$row[ 'apellidos'].'">' . $row[ 'cedula' ] . '</option>';
}
