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
            <span class="info-box-icon bg-blue"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
            <div class="border border-primary">
                <div class="info-box-content">
                    <h1 class="box-title">Capacitacion</h1>
                </div>
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
                                <th>AGENTE</th>
                                <th>CEDULA</th>
                                <th>ESTUDIO</th>
                                <th>CALIFICACION</th>
                                <th>FECHA</th>

                            </thead>
                        </table>
                    </div>



                    <div class="panel-body" id="formularioregistros">
                        <!-- INICIO FORMULARIO -->
                        <form action="loadNewCapacitacion.php" method="POST">
                            <div class="col-xs-12">
                                <div class='form-group col-lg-3 '>
                                    <label for="">AGENTE:</label>
                                    <select name="idcliente[]" id="idcliente"  class="form-control selectpicker"
                                multiple="multiple" data-live-search="true"   required>  
                                                  
                                </select>
 
                                




                                </div>

                                <div class='form-group col-lg-5 '>
                                    <label for=''>ESTUDIO:</label>
                                    <select name="estudio" id="estudio"  class="form-control selectpicker "
                                data-live-search="true"    >
                                </select>
                                </div>
                                
                                <div class="form-group col-lg-2">
                                    <label for="">CALIFICACION:</label>
                                    <input class="form-control" type="number" step="0.1" name="calificacion"
                                        id="calificacion" min="0" max="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>
                                <div class="form-group col-lg-2 ">
                                    <label for="">FECHA:</label>
                                    <input type="date" class="form-control" id="fecha_capacitacion"
                                        name="fecha_capacitacion" min="2022-08-01" max="2032-12-31">

                                </div>
                            </div>
                            <div <div class="col-xs-10">
                            </div>
                            <div class="btn-group" role="group">
                                <button class="btn btn-danger" onclick="cancelarform()" type="button"><i
                                        class="fa fa-arrow-circle-left"></i>
                                    Volver</button>
                                <button class="btn btn-primary" type="submit" name="save_multi_select"><i class="fa fa-save"
                                        aling='middle'></i>
                                    Guardar</button>
                            </div>
                        </form>
                        <!-- FIN FORMULARIO  -->
                    </div>

                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<?php require 'footer.php'; ?>
<script src="scripts/capacitacion.js"></script>
<?php
}

ob_end_flush();
?>
