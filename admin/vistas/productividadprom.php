<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: login.html');
} else {


//actualizar data
    require '../config/Conexion.php';
    for ($e = 1; $e < 2; $e++) {

                $query ='TRUNCATE TABLE productividad2';
        $query_run = mysqli_query($conexion, $query);
        $query ='INSERT INTO productividad2(agente_prod2,meta_prod2,enc_realizadas_prod2,fecha_prod2,hora_ini_prod2,hora_fin_prod2,tiempo_muerto_prod2) SELECT agente_prod,SUM(meta_prod),SUM(enc_realizadas_prod),fecha_prod,SUM(hora_ini_prod),SUM(hora_fin_prod),SUM(tiempo_muerto_prod) FROM productividad GROUP BY agente_prod, fecha_prod';
        $query_run = mysqli_query($conexion, $query);
        $query ='UPDATE productividad2 INNER JOIN tsg ON productividad2.agente_prod2 = tsg.cedula_tsg  AND productividad2.fecha_prod2 = tsg.fecha_tsg SET productividad2.tiempo_muerto_prod2 =  tsg.tiempo_tsg';
        $query_run = mysqli_query($conexion, $query);
        $query ='UPDATE productividad2 SET productividad2.total_horas_trabajadas_prod2 = (SELECT (TIMEDIFF(`hora_fin_prod2`,`hora_ini_prod2`)/10000)) WHERE  `hora_fin_prod2` >  "00:00:00"';
        $query_run = mysqli_query($conexion, $query);
        $query ='UPDATE productividad2 SET productividad2.total_horas_trabajadas_prod2 = productividad2.total_horas_trabajadas_prod2 - (( productividad2.tiempo_muerto_prod2 / 10000)+1)';
        $query_run = mysqli_query($conexion, $query);
        $query ='UPDATE productividad2 SET `total_horas_trabajadas_prod2`= (SELECT (FORMAT(`total_horas_trabajadas_prod2`, 1)))';
        $query_run = mysqli_query($conexion, $query);
        $query ='UPDATE productividad2 SET productividad2.porcentaje_prod2 = ((productividad2.enc_realizadas_prod2/productividad2.meta_prod2)*100)';
        $query_run = mysqli_query($conexion, $query);
        $query ='UPDATE productividad2 SET porcentaje_prod2= (SELECT (FORMAT(porcentaje_prod2, 1)))';
        $query_run = mysqli_query($conexion, $query);


    }

//---






    require 'header.php'; ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-file"></i></span>
            <div class="info-box-content">
                <h1 class="box-title">Productividad Diaria</h1>
            </div>

        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">

                        <form action="" name="formulariol" id="formularioa" method="POST">
                            <h1 class="box-title"> <button class="btn btn-primary" type="submit"
                                    id="btnGuarda"><i class="fa fa-save"></i>Actualizar</button>
                        </form>
                        <div class="box-tools pull-right">

                        </div>
                    </div>
                    <!--box-header-->
                    <!--centro-->



                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-hover table-fixed" width='100%'>
                            <thead>
                                <th>ID</th>
                                <th>AGENTE</th>
                                <th>META</th>
                                <th>EFECTIVAS</th>
                                <th>FECHA</th>
                                <th>H INI</th>
                                <th>H FIN</th>
                                <th>TMU</th>
                                <th>HTR</th>
                                <th>%</th>
                            </thead>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form action="" name="formulario" id="formulario" method="POST">

                            <div class="form-group col-lg-12">
                                <div class="card">
                                    <h5 class="card-header">DATOS PERSONALES</h5>
                                    <div class="card-body">
                                        <div class="form-group col-lg-2">
                                            <label for="">Documento de Identidad (*):</label>
                                            <input class="form-control" type="number" name="cedula" id="cedula"
                                                maxlength="100" placeholder="123456789" required>
                                        </div>


                                        <div class="form-group col-lg-2">
                                            <label for="">Nombres (*):</label>
                                            <input class="form-control" type="hidden" name="idusuario" id="idusuario">
                                            <input class="form-control" type="text" name="nombre" id="nombre"
                                                maxlength="100" placeholder="Nombres" required>
                                        </div>


                                        <div class="form-group col-lg-2">
                                            <label for="">Apellidos (*):</label>
                                            <input class="form-control" type="text" name="apellidos" id="apellidos"
                                                maxlength="100" placeholder="Apellidos" required>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="">Email: </label>
                                            <input class="form-control" type="text" name="email" id="email"
                                                maxlength="70" placeholder="Ejemplo@operative.net.co">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <div class="card">
                                    <h5 class="card-header">ASIGNACION DE CARGO Y DEPARTAMENTO</h5>
                                    <div class="card-body">
                                        <div class="form-group col-lg-12">
                                            <div class="form-group col-lg-6">
                                                <label class="form-label select-label">Departamento:</label>
                                                <select class="select" name="idtipousuario" id="idtipousuario" required>
                                                </select>

                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label class="form-label select-label">Departamento:</label>
                                                <select class="select" name="iddepartamento" id="iddepartamento"
                                                    required>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <div class="card">
                                        <h5 class="card-header">ACCESO A LA PLATAFORMA (SIGI)</h5>
                                        <div class="card-body">
                                            <div class="form-group col-lg-2">
                                                <label for="">Usuario:</label>
                                                <input class="form-control" type="text" name="login" id="login"
                                                    maxlength="20" placeholder="*Cedula" required>
                                            </div>


                                            <div class="form-group col-lg-2" id="claves">
                                                <label for="">Contraseña:</label>
                                                <input class="form-control" type="password" name="clave" id="clave"
                                                    maxlength="64" placeholder="*Cedula">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-lg-12">
                                    <div class="card">
                                        <h5 class="card-header">PIN Control de Asistencia</h5>
                                        <div class="card-body">
                                            <div class="form-group col-lg-2" id="claves">
                                                <label for="">PIN:</label>
                                                <input class="form-control" type="text" name="codigo_persona"
                                                    id="codigo_persona" maxlength="64" placeholder="*Cedula">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i
                                            class="fa fa-save"></i>
                                        Guardar</button>
                                    <button class="btn btn-danger" onclick="cancelarform()" type="button"><i
                                            class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                </div>
                        </form>
                    </div>
                    <!--modal para ver la venta-->
                    <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" style="width: 20% !important;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Cambio de contraseña</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="" name="formularioc" id="formularioc" method="POST">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Password:</label>
                                            <input class="form-control" type="hidden" name="idusuarioc" id="idusuarioc">
                                            <input class="form-control" type="password" name="clavec" id="clavec"
                                                maxlength="64" placeholder="Clave" required>
                                        </div>
                                        <button class="btn btn-primary" type="submit" id="btnGuardar_clave"><i
                                                class="fa fa-save"></i> Guardar</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i
                                                class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                    </form>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" type="button"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--inicio de modal editar contraseña--->
                        <!--fin de modal editar contraseña--->
                        <!--fin centro-->
                    </div>

                </div>
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<?php require 'footer.php'; ?>
<script src="scripts/productividadprom.js"></script>
<?php
}

ob_end_flush();
?>
