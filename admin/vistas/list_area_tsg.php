<?php
if (strlen(session_id()) < 1) {
    session_start();
} ?>

<?php
// CAPACITACIÓN Y FORMACIÓN :
    ?>
    <?php if (
                            $_SESSION['tipousuario'] ==
                            'AUXILIAR DE CAPACITACIÓN Y FORMACIÓN
    ' 
                        ) { ?>

    <?php

    require '../config/Conexion.php';
    $rspta = mysqli_query(
        $conexion,
        "SELECT DISTINCT nombre FROM tipousuario  WHERE nombre != 'AUXILIAR DE CAPACITACIÓN Y FORMACIÓN'"
    );
    echo '<option value="" selected disabled>Seleccionar...</option>';
    while ($row = mysqli_fetch_array($rspta)) {
        echo '<option value="' .
            $row['nombre'] .
            '">' .
            $row['nombre'] .
            '</option>';
    }
    ?>
                    <?php } ?>

<?php
// CALIDAD :
?>
    <?php if (
                            $_SESSION['tipousuario'] ==
                            'ANALISTA DE CALIDAD' || $_SESSION['tipousuario'] ==
                            'LÍDER DE CALIDAD' 
                        ) { ?>

    <?php

    require '../config/Conexion.php';
    $rspta = mysqli_query(
        $conexion,
        "SELECT DISTINCT nombre FROM tipousuario  WHERE nombre = 'ANALISTA DE CALIDAD' AND nombre = 'LÍDER DE CALIDAD' "
    );
    echo '<option value="" selected disabled>Seleccionar...</option>';
    while ($row = mysqli_fetch_array($rspta)) {
        echo '<option value="' .
            $row['nombre'] .
            '">' .
            $row['nombre'] .
            '</option>';
    }
    ?>
                    <?php } ?>


<?php
// TECNOLOGIA DE LA INFORMACION :
?>
    <?php if ( $_SESSION['tipousuario'] == 'Administrador' || $_SESSION['tipousuario'] == 'AUXILIAR IT' ) { ?>

    <?php

    require '../config/Conexion.php';
    $rspta = mysqli_query(
        $conexion,
        "SELECT DISTINCT nombre FROM tipousuario "
    );
    echo '<option value="" selected disabled>Seleccionar...</option>';
    while ($row = mysqli_fetch_array($rspta)) {
        echo '<option value="' .
            $row['nombre'] .
            '">' .
            $row['nombre'] .
            '</option>';
    }
    ?>
                    <?php } ?>

<?php
// OPERACIONES CATI :
?>
        <?php if ( $_SESSION['tipousuario'] == 'LÍDER CATI ESTUDIOS MASIVOS' || $_SESSION['tipousuario'] == 'LIDER DE GESTION' || $_SESSION['tipousuario'] == 'COORDINADOR CATI
    '  ) { ?>

        <?php

        require '../config/Conexion.php';
        $rspta = mysqli_query(
            $conexion,
            "SELECT DISTINCT nombre FROM tipousuario WHERE nombre = 'LÍDER CATI ESTUDIOS MASIVOS' AND nombre = 'LIDER DE GESTION' AND nombre = 'COORDINADOR CATI'
    "
        );
        echo '<option value="" selected disabled>Seleccionar...</option>';
        while ($row = mysqli_fetch_array($rspta)) {
            echo '<option value="' .
                $row['nombre'] .
                '">' .
                $row['nombre'] .
                '</option>';
        }
        ?>
                        <?php } ?>

<?php
// ADMINISTRACION:
?>
        <?php if ( $_SESSION['tipousuario'] == 'AUXILIAR ADMINISTRATIVO' || $_SESSION['tipousuario'] == 'DIRECTOR ADMINISTRATIVO Y FINANCIERO
    '   ) { ?>

        <?php

        require '../config/Conexion.php';
        $rspta = mysqli_query(
            $conexion,
            "SELECT DISTINCT nombre FROM tipousuario WHERE nombre = 'AUXILIAR ADMINISTRATIVO' AND nombre = 'DIRECTOR ADMINISTRATIVO Y FINANCIERO
    '"
        );
        echo '<option value="" selected disabled>Seleccionar...</option>';
        while ($row = mysqli_fetch_array($rspta)) {
            echo '<option value="' .
                $row['nombre'] .
                '">' .
                $row['nombre'] .
                '</option>';
        }
        ?>
                        <?php } ?>
                        
<?php
// DIR OPERACIONES:
?>
        <?php if ( $_SESSION['tipousuario'] == 'DIRECTOR DE OPERACIONES'    ) { ?>

        <?php

        require '../config/Conexion.php';
        $rspta = mysqli_query(
            $conexion,
            "SELECT DISTINCT nombre FROM tipousuario WHERE nombre = 'DIRECTOR DE OPERACIONES' "
        );
        echo '<option value="" selected disabled>Seleccionar...</option>';
        while ($row = mysqli_fetch_array($rspta)) {
            echo '<option value="' .
                $row['nombre'] .
                '">' .
                $row['nombre'] .
                '</option>';
        }
        ?>
                        <?php } ?>


                        

