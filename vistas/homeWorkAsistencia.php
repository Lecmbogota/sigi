<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../admin/public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../admin/public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../admin/public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../admin/public/css/blue.css">
    <link rel="shortcut icon" href="">
</head>
<body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <?php  ?>
        <div name="movimientos" id="movimientos">
        </div>
        <div class="lockscreen-logo">
            <a href="#"><b></b> CONTROL DE ASISTENCIA</a>
        </div>
        <div class="lockscreen-item">
        <!-- FORMULARIO DE ASISTENCIA -->
            <form action="" class="panel-body" name="formulario" id="formulario" method="POST">
                <div class="input-group">
                    <input type="password" class="form-control" name="codigo_persona" id="codigo_persona"
                        placeholder="INGRESA TU CEDULA">
                        
                        
                        <select name="tipo" class="form-control" id="tipo">
                            <option disabled selected>Selecccionar...</option>
                           
                        <!-- GRUPO DE OPC GESTION -------------------------------------->   
                            <optgroup label="GESTION">
                                
                            <!-- OPC SELECT (INICIO DE GESTION) -------------------------------------->
                                <?php
                                //PARAMETROS ESTANDART-------------------------------------------
                                date_default_timezone_set('America/Bogota');
                                $timenow = date('H:i:s');
                                $day = date('l');
                                //---------------------------------------------------------------

                                //CONDICIONAL SABADOS Y DOMINGOS---------------------------------
                                if ($day == 'Satuday' || $day == 'Sunday') {
                                    if (
                                        $timenow > date('05:00:00') &&
                                        $timenow < date('10:10:00')
                                    ) {
                                        echo '<option value="INICIO GESTION">INICIO GESTION</option>';
                                    }
                                }
                                //---------------------------------------------------------------
                                //CONDICIONAL LUNES A VIERNES -----------------------------------
                                elseif (
                                    $day == 'Monday' ||
                                    $day == 'Tuesday' ||
                                    $day == 'Wednesday' ||
                                    $day == 'Thursday' ||
                                    $day == 'Friday'
                                ) {
                                    if (
                                        $timenow > date('05:00:00') &&
                                        $timenow > date('08:10:00')
                                    ) {
                                        echo '<option value="INICIO GESTION">INICIO GESTION</option>';
                                    }
                                }

//---------------------------------------------------------------
?>
                            <!------------------------------------------------------------------------>

                            <!-- OPC SELECT (FIN DE GESTION) ----------------------------------------->

                                <?php
                                //PARAMETROS ESTANDART-------------------------------------------
                                date_default_timezone_set('America/Bogota');
                                $timenow = date('H:i:s');
                                $day = date('l');
                                //---------------------------------------------------------------

                                //CONDICIONAL SABADOS Y DOMINGOS---------------------------------
                                if ($day == 'Satuday' || $day == 'Sunday') {
                                    if (
                                        $timenow > date('11:00:00') &&
                                        $timenow < date('23:59:59')
                                    ) {
                                        echo '<option value="FIN GESTION">FIN GESTION</option>';
                                    }
                                }
                                //---------------------------------------------------------------
                                //CONDICIONAL LUNES A VIERNES -----------------------------------
                                elseif (
                                    $day == 'Monday' ||
                                    $day == 'Tuesday' ||
                                    $day == 'Wednesday' ||
                                    $day == 'Thursday' ||
                                    $day == 'Friday'
                                ) {
                                    if (
                                        $timenow < date('23:59:59') &&
                                        $timenow > date('12:00:00')
                                    ) {
                                        echo '<option value="FIN GESTION">FIN GESTION</option>';
                                    }
                                }

//---------------------------------------------------------------
?>
                            <!------------------------------------------------------------------------>
                            </optgroup>
                        <!--------------------------------------------------------------->   

                        
                        <!-- GRUPO DE OPC BREAK -------------------------------------->
                            <optgroup label="BREAK">                        
                                <option value="INICIO BREAK">INICIO BREAK</option>
                                <option value="FIN BREAK">FIN BREAK</option>
                            </optgroup>
                        <!--------------------------------------------------------------->   
                        
                        
                        <!-- GRUPO DE OPC ALMUERZO -------------------------------------->    
                            <optgroup label="ALMUERZO">
                                <?php
                                date_default_timezone_set('America/Bogota');
                                $timenow = date('H:i:s');
                                $day = date('l');
                                if (
                                    $timenow > date('11:00:00') &&
                                    $timenow < date('16:00:00')
                                ) {
                                    echo '<option value="INICIO ALMUERZO">INICIO ALMUERZO</option>';
                                } else {
                                    echo '<option disabled hidden>INICIO ALMUERZO</option>';
                                }
                                ?>
                                <?php if (
                                    $timenow > date('11:30:00') &&
                                    $timenow < date('17:30:00')
                                ) {
                                    echo '<option value="FIN ALMUERZO">FIN ALMUERZO</option>';
                                } else {
                                    echo '<option disabled hidden>FIN ALMUERZO</option>';
                                } ?>
                            </optgroup>
                        <!--------------------------------------------------------------->   
                        
                            
                        <!-- GRUPO DE OPC CAPACITACION -------------------------------------->
                            <optgroup label="CAPACITACION"> 
                                <option value="INICIO CAPACITACION">INICIO CAPACITACION</option>
                                <option value="FIN CAPACITACION">FIN CAPACITACION</option>
                            </optgroup>
                        <!--------------------------------------------------------------->   
                        
                    <!-- GRUPO DE OPC GESTION -------------------------------------->   
                       


                        </select>
                    <div class="input-group-btn">
                        
                        
                    </div>
                </div>
                <button type="submit" class="btn input-block-level form-control button-primary" ><i
                                class="fa fa-arrow-right text-muted" ></i></button>
            </form>
        <!------------------------------>
        </div>
        <script src="../admin/public/js/jquery-3.1.1.min.js"></script>
        <script src="../admin/public/js/bootstrap.min.js"></script>
        <script src="../admin/public/js/bootbox.min.js"></script>
        <script type="text/javascript" src="scripts/asistencia.js"></script>
</body>

</html>