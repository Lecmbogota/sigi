<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: login.html');
} else {
    require '../config/Conexion.php';
$query ='UPDATE asignacionestudio INNER JOIN usuarios ON asignacionestudio.cedula_asig = usuarios.cedula SET asignacionestudio.nomb_asig = usuarios.nombre';
        $query_run = mysqli_query($conexion, $query);


    require 'header.php'; ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-file"></i></span>
            <div class="info-box-content">
                <h1 class="info-box-number">PLANIFICACION </h1>
                <h8 class="info-box-text"><?php
                echo ' HOLA ' .
                    $_SESSION['nombre'] .
                    ', TU PLANIFICACION  PARA EL DIA DE HOY ';
                if (date('l') == 'Thursday') {
                    echo 'JUEVES';
                } elseif (date('l') == 'Friday') {
                    echo 'VIERNES';
                } elseif (date('l') == 'Saturday') {
                    echo 'SABADO';
                } elseif (date('l') == 'Sunday') {
                    echo 'DOMINGO';
                } elseif (date('l') == 'Monday') {
                    echo 'LUNES';
                } elseif (date('l') == 'Tuesday') {
                    echo 'MARTES';
                } elseif (date('l') == 'Wednesday') {
                    echo 'MIERCOLES';
                }
                echo ', ' . date('d-m-Y') . ' ES LA SIGUIENTE:';
                ?></h8>        
                
            </div>
        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!--box-header-->
                    <!--centro-->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-hover " width='100%'>
                            <thead>
                                <th>AGENTE</th>
                                <th>ESTUDIO</th>                             
                                <th>FECHA</th>
                                <th>HORA INI</th>
                                <th>HORA FIN</th>
                            </thead>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form action="" name="formulario" id="formulario" method="POST">
                            <div class="form-group col-lg-12">
                                <div class="card">
                                    <h5 class="card-header"></h5>
                                    <div class="card-body">
                                        <div class="form-group col-lg-2">
                                            <input class="form-control" type="hidden" name="id_asig" id="id_asig">
                                            <input type="time" class="form-control" id="hora_fin_asig" name="hora_fin_asig" min="05:00" max="24:00" required>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i
                                            class="fa fa-save"></i>
                                            Guardar</button>
                                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i
                                            class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require 'footer.php'; ?>
<script src="scripts/verasig_agente.js"></script>
<?php
}
ob_end_flush();
?>
