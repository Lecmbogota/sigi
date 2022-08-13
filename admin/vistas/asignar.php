<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

require 'header.php';
 ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-file"></i></span>
            <div class="info-box-content">
                <h1 class="box-title">Asignar Estudios</h1>
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
                                <th>ESTUDIO</th>
                                <th>FECHA</th>
                                <th>HORA</th>
                            </thead>
                        </table>
                    </div>


                    <!-- FORMULARIO AGREGAR ESTUDIO -->
                    <div class="panel-body" id="formularioregistros">
                        <form action="" name="formulario" id="formulario" method="POST">
                            <div class="form-group col-lg-4 ">
                                <!-- INPUT CLIENTE -->

                                <label for="">AGENTE:</label>
                                <select name='agente' id='agente' class='form-control select-picker' placeholder="Seleccionar..." required>
                                </select>
                            </div>
                            <!-- SELECT ESTUDIO -->
                            <div class='form-group col-lg-8 '>
                                <label for=''>ESTUDIO:</label>
                                <select name='estudio' id='estudio' class='form-control select-picker' required>

                                </select>
                            </div>
                            <div class='form-group col-lg-4 ' hidden>
                                <label for=''>CEDULA:</label>
                                <select name='cedula' id='cedula' class='form-control select-picker'  required>

                                </select>
                            </div>

                            <!-- INPUT TMO -->
                            <div class="form-group col-lg-2 ">
                                <label for="">FECHA:</label>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                                <script>
                                $(document).ready(function() {

                                    var now = new Date();

                                    var day = ("0" + now.getDate()).slice(-2);
                                    var month = ("0" + (now.getMonth() + 1)).slice(-2);

                                    var today = now.getFullYear() + "-" + (month) + "-" + (day);
                                    $("#fecha_asignacion").val(today);
                                });
                                </script>
                                <input type="date" class="form-control" id="fecha_asignacion" name="fecha_asignacion"
                                    min="2022-08-01" max="2032-12-31">


                            </div>
                            <div class="form-group col-lg-2 ">
                                <label for="">HORA:</label>
                                <input type="time" class="form-control" id="horaasig" name="horaasig" min="05:00" max="24:00" required>
                            </div>




                            <!-- BOTON GUARDAR -->
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>
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
<?php 

require 'footer.php';
 ?>
<script src="scripts/asignar.js"></script>
<?php 
}

ob_end_flush();
  ?>