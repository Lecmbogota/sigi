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
            <span class="info-box-icon bg-blue"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
            <div class="info-box-content">
                <h1 class="box-title">REGISTRAR TIEMPO SIN GESTIÓN</h1>
            </div>

        </div>




        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- BOTON AGREGAR NUEVO ESTUDIO -->
                    <div class="box-header with-border">
                        <h1 class="box-title"><button class="btn btn-success" onclick="mostrarformu(true)"
                                id="btnagregar"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
                    </div>
                    <!-- ENCABEZADOS DE LA TABLA ESTUDIOS  -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllist" class="table table-hover table-fixed" width='100%'>
                            <thead>
                                <th>ID</th>
                                <th>SUPERVISOR</th>
                                <th>AGENTE</th>
                                <th>FECHA</th>
                                <th>HORA INICIO</th>
                                <th>HORA FIN</th>

                            </thead>
                        </table>
                    </div>


                    <!-- FORMULARIO AGREGAR ESTUDIO -->
                    <div class="panel-body" id="formularioregistros">
                            <form action="loadNewtsg.php" method="POST">
                                <div class='form-group col-lg-8 '>
                                    <label for=''>AREA:</label>
                                    <input class="form-control" type="hidden" name="id_tsg" id="id_tsg">
                                    <select name="supervisor_tsg" class="form-control" id="supervisor_tsg" 
                                    data-live-search="true" required>
                                </select>
                                </div>

                                <div class="form-group col-lg-4 ">
                                    <label for="">AGENTE:</label>
                                        <select name="agente_tsg[]" id="agente_tsg"   class="form-control"
                                    multiple="multiple" data-live-search="true"  required>                     
                                    </select>
                                </div>

                                <div class="form-group col-lg-2 ">
                                    <label for="">HORA INICIO:</label>
                                    <input type="time" class="form-control" id="hora_ini_tsg" name="hora_ini_tsg" min="05:00" max="24:00" required>
                                </div>

                                <div class="form-group col-lg-2 ">
                                    <label for="">HORA FIN:</label>
                                    <input type="time" class="form-control" id="hora_fin_tsg" name="hora_fin_tsg" min="05:00" max="24:00" required>
                                </div>
                                <div class="col-xs-10">
                                <button class="btn btn-primary" type="submit" name="save_multi_select"><i class="fa fa-save"
                                            aling='middle'></i>
                                        Guardar</button>



                                    <!-- BOTON CANCELAR -->
                                    <button class="btn btn-danger" onclick="cancelarform()" type="button"><i
                                            class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                </div>
                            </form>
                    </div>
                    <!-- FIN FORMULARIO AGREGAR ESTUDIO -->
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<?php require 'footer.php'; ?>
<script src="scripts/tsg.js"></script>
<?php
}

ob_end_flush();
?>
