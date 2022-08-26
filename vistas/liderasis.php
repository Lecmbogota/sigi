<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGI</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../admin/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/public/css/font-awesome.css">
    <link rel="stylesheet" href="../admin/public/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../admin/public/css/blue.css">
    <link rel="shortcut icon" href="">
</head>
<body class="hold-transition lockscreen">
    <div class="lockscreen-wrapper">
        <div name="movimientos" id="movimientos">
        </div>
        <div class="lockscreen-logo">
            <a href="#"><b></b> CONTROL DE ASISTENCIA</a>
        </div>
        <div class="lockscreen-name"></div>
        <div class="lockscreen-item">
            <form action="" class="panel-body" name="formulario" id="formulario" method="POST">
                <div class="input-group" >
                    <input type="password" class="form-control" name="codigo_persona" id="codigo_persona"
                        placeholder="INGRESA TU CEDULA">
                        <!--<option selected value="INICIO GESTION">INICIO GESTION</option>-->

                    <select  name="tipo" class="form-control" id="tipo" >
                            <?php
                            date_default_timezone_set('America/Bogota');
                            $timenow = date('H:i:s');
                            $day = date('l');

                            if ($day == 'Saturday' || $day == 'Sunday') {
                                if (
                                    $timenow < date('09:10:00') &&
                                    $timenow > date('05:00:00')
                                ) {
                                    echo '<option selected value="INICIO GESTION">INICIO GESTION</option>';
                                } else {
                                    echo '<option selected  value="">LLEGADA TARDE</option>';
                                }
                            }
                            if (
                                $day == 'Monday' ||
                                $day == 'Tuesday' ||
                                $day == 'Wednesday' ||
                                $day == 'Thursday' ||
                                $day == 'Friday'
                            ) {
                                if (
                                    $timenow > date('05:00:00') &&
                                    $timenow < date('08:50:00')
                                ) {
                                    echo '<option selected value="INICIO GESTION">INICIO GESTION</option>';
                                } else {
                                    echo '<option selected  value="">LLEGADA TARDE</option>';
                                }
                            }
                            ?>
                    </select>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i
                                class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <script src="../admin/public/js/jquery-3.1.1.min.js"></script>
        <script src="../admin/public/js/bootstrap.min.js"></script>
        <script src="../admin/public/js/bootbox.min.js"></script>
        <script type="text/javascript" src="scripts/asistencia.js"></script>
</body>
</html>

