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
                <h1 class="box-title">Estudios</h1>
            </div>

        </div>




        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">



                    <!-- BOTON AGREGAR NUEVO ESTUDIO -->
                    <div class="box-header with-border">
                        <h1 class="box-title"><button class="btn btn-success" onclick="mostrarformu(true)"
                                id="btnagregar"><i class="fa fa-plus-circle"></i>Crear Estudio</button></h1>
                    </div>


                    <!-- ENCABEZADOS DE LA TABLA ESTUDIOS  -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllist" class="table table-hover table-fixed" width='100%'>
                            <thead>
                                <th>OPC</th>
                                <th>CLIENTE</th>
                                <th>ESTUDIO</th>
                                <th>NIVEL</th>
                                <th>PRECIO</th>
                                <th>MUESTRA</th>
                                <th>FECHA INICIO</th>
                                <th>FECHA ENTREGA</th>
                                <th>TMO</th>
                                <th>TME</th>
                                <th>ESTATUS</th>

                            </thead>
                        </table>
                    </div>


                    <!-- FORMULARIO AGREGAR ESTUDIO -->
                    <div class="panel-body" id="formularioregistros">
                        <form action="" name="formulario" id="formulario" method="POST">
                            <div class="form-group col-lg-4 col-md-4 col-xs-4">
                                <!-- INPUT CLIENTE -->
                                <input class="form-control" type="hidden" name="id_Estudio " id="id_Estudio ">
                                <label for="">Cliente:</label>
                                <input class="form-control" type="text" name="Cliente" id="nombre" maxlength="100"
                                onkeyup="this.value = this.value.toUpperCase();" required>
                            </div>

                            <!-- INPUT ESTUDIO -->
                            <div class="form-group col-lg-8 col-md-8 col-xs-8">
                                <label for="">Estudio:</label>
                                <input class="form-control" type="text" name="Estudio" id="Estudio" maxlength="100"
                                onkeyup="this.value = this.value.toUpperCase();" required>
                            </div>

                            <!-- INPUT NIVEL -->
                            <div class="form-group col-lg-2 col-md-2 col-xs-2">
                                <label for="">Nivel:</label>
                                <select class="form-control" name="Nivel" id="Nivel">
                                    <option value="Nivel 1">Nivel 1</option>
                                    <option value="Nivel 2">Nivel 2</option>
                                    <option value="Nivel 3">Nivel 3</option>
                                    <option value="Nivel 4">Nivel 4 </option>
                                </select>
                            </div>

                            <!-- INPUT MUESTRA -->
                            <div class="form-group col-lg-2 col-md-2 col-xs-2">
                                <label for="">Muestra:</label>
                                <input class="form-control" type="text" name="Muestra" id="Muestra" maxlength="100"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>

                            <!-- INPUT PRECIO -->
                            <div class="form-group col-lg-2 col-md-2 col-xs-2">
                                <label for="">Precio:</label>
                                <input class="form-control" type="text" name="Precio" id="Precio" maxlength="100"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>

                            <!-- INPUT TMO -->
                            <div class="form-group col-lg-1 col-md-1 col-xs-1">
                                <label for="">TMO:</label>
                                <input class="form-control" type="text" name="TMO" id="TMO" maxlength="100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>

                            <!-- INPUT TME -->
                            <div class="form-group col-lg-1 col-md-1 col-xs-1">
                                <label for="">TME:</label>
                                <input class="form-control" type="text" name="TME" id="TME" maxlength="100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>


                            <!-- DATAPICKER FECHA DE INICIO -->
                            <div class="form-group col-lg-2 col-md-2 col-xs-2">
                                <label for="">Fecha de Inicio:</label>
                                <input type="date" class="form-control" id="Fecha_Inicio_Estudio"
                                    name="Fecha_Inicio_Estudio" min="2022-01-01" max="2032-12-31" required>
                            </div <!-- DATAPICKER FECHA DE ENTREGA -->
                            <div class="form-group col-lg-2 col-md-2 col-xs-2">
                                <label for="">Fecha de Entrega:</label>
                                <input type="date" class="form-control" id="Fecha_Entrega_Estudio"
                                    name="Fecha_Entrega_Estudio" min="2022-01-01" max="2032-12-31" required>
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
                        <!--fin centro-->
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
<script src="scripts/estudio.js"></script>
<?php 
}

ob_end_flush();
  ?>