<?php
$servername = "localhost";
$database = "sigi";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql="INSERT INTO
    productividad (
        enc_realizadas_prod,
        agente_prod,
        estudio_prod,
        fecha_prod
    )
SELECT
    COUNT(ee_estudio) ee_estatus,
    ee_encuestador,
    ee_estudio,
    ee_fecha
FROM
    ee_carga
WHERE
    ee_estatus = 1
GROUP BY
    ee_estudio,
    ee_fecha,
    ee_encuestador";
mysqli_close($conn);
?>