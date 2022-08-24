<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: login.html');
} else {
    require 'header.php'; ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-file"></i></span>
            <div class="info-box-content">
                <h1 class="box-title">Establecer Hora</h1>
            </div>

        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!--box-header-->
                    <!--centro-->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-hover table-fixed" width='100%'>
                            <thead>
                                <th>ID</th>
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
                                            <label for="">"agente_asig"</label>
                                            <input class="form-control" type="hidden" name="id_asig" id="id_asig">
                                            <input class="form-control" type="text" name="agente_asig" id="agente_asig" disabled>
                                            <input class="form-control" type="date" name="fecha_asig" id="fecha_asig" disabled>
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
<script src="scripts/editarasig.js"></script>
<?php
}

ob_end_flush();
?>
