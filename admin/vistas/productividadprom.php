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
                <h1 class="box-title">Usuarios</h1>
            </div>

        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">

                        <form action="" name="formulariol" id="formularioa" method="POST">
                            <h1 class="box-title"> <button class="btn btn-primary" type="submit"
                                    id="btnGuarda"><i class="fa fa-save"></i>Calcular</button>
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
                                <th>ESTUDIO</th>
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
<script src="scripts/productividad.js"></script>
<?php
}

ob_end_flush();
?>
