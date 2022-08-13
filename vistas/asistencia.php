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
    <link rel="shortcut icon" href="../admin/public/img/favicon.ico">

</head>

<body class="hold-transition lockscreen">

    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <?php 
 //include '../ajax/asistencia.php' ?>
        <div name="movimientos" id="movimientos">
        </div>



        <div class="lockscreen-logo">
            <a href="#"><b></b> CONTROL DE ASISTENCIA</a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name"></div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">


            <!-- lockscreen credentials (contains the form) -->
            <form action="" class="panel-body" name="formulario" id="formulario" method="POST">
                <div class="input-group">
                    <input type="password" class="form-control" name="codigo_persona" id="codigo_persona"
                        placeholder="INGRESA TU CEDULA">
                        <select name="tipo" class="form-control" id="tipo">
                        <option disabled selected>Selecccionar...</option>
                        <option value="FIN GESTION">FIN GESTION</option>
                        <option value="INICIO BREAK">INICIO BREAK</option>
                        <option value="FIN BREAK">FIN BREAK</option>
                        <option value="INICIO ALMUERZO">INICIO ALMUERZO</option>
                        <option value="FIN ALMUERZO">FIN ALMUERZO</option>
                        <option value="INICIO CAPACITACION">INICIO CAPACITACION</option>
                        <option value="FIN CAPACITACION">FIN CAPACITACION</option>



                        </select>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i
                                class="fa fa-arrow-right text-muted"></i></button>
                        

                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->

        <!-- /.center -->


        <!-- jQuery -->
        <script src="../admin/public/js/jquery-3.1.1.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="../admin/public/js/bootstrap.min.js"></script>
        <!-- Bootbox -->
        <script src="../admin/public/js/bootbox.min.js"></script>

        <script type="text/javascript" src="scripts/asistencia.js"></script>


</body>

</html>