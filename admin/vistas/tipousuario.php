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
        <!-- Main content -->
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-file"></i></span>
            <div class="info-box-content">
                <h1 class="box-title">TIPO DE USUARIO</h1>
            </div>

        </div>

        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h1 class="box-title"><button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i
                                    class="fa fa-plus-circle"></i>Agregar</button>
                        </h1>
                        <div class="box-tools pull-right">

                        </div>
                    </div>
                    <!--box-header-->
                    <!--centro-->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-hover table-fixed" width ='100%'>
                            <thead>
                                <th>Opciones</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Fecha/registro</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <th>Opciones</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Fecha/registro</th>
                            </tfoot>
                        </table>
                    </div>
                    <div class="panel-body"  id="formularioregistros">
                        <form action="" name="formulario" id="formulario" method="POST">
                            <div class="form-group col-lg-12 col-md-12 col-xs-12">
                                <label for="">Nombre</label>
                                <input class="form-control" type="hidden" name="idtipousuario" id="idtipousuario">
                                <input class="form-control" type="text" name="nombre" id="nombre" maxlength="50"
                                    placeholder="Nombre" required>
                            </div>
                             <div class="form-group col-lg-12 col-md-12 col-xs-12">
                                <label for="">Descripcion</label>
                                <input class="form-control" type="text" name="descripcion" id="descripcion"
                                    maxlength="256" placeholder="Descripcion">
                            </div>
                             <div class="form-group col-lg-12 col-md-12 col-xs-12">
                                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>
                                    Guardar</button>

                                <button class="btn btn-danger" onclick="cancelarform()" type="button"><i
                                        class="fa fa-arrow-circle-left"></i> Cancelar</button>
                            </div>
                        </form>
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
<script src="scripts/tipousuario.js"></script>
<?php 
}

ob_end_flush();
  ?>