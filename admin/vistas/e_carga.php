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
            <span class="info-box-icon bg-blue"><i class="fa fa-upload" aria-hidden="true"></i></span>
            <div class="info-box-content">
                <h1 class="box-title">Cargar Encuestas Exitosas</h1>
            </div>

        </div>
        <!-- Default box -->

        <div class="row">
            <div class="col-md-12">



                <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">




                            
                                <form method="post" enctype="multipart/form-data" id="form_carga_encuesta">
                                    <div class="row">
                                        <div class="btn-group" role="group" aria-label="...">
                                        <input type="file" name="fileencuestas" id="fileencuestas"
                                            class="btn btn-light" accept=".xls, .xlsx">
                                        <input type="submit" value="Cargar Encuestas" class="btn btn-primary"
                                                id="btnCargar">
                                                <a class="btn btn-danger" role="button"
                                                href="../public/plantillas/ENCUESTAS_EFECTIVAS_PLANTILLA_SIGI.xlsx"
                                                download="_PLANTILLA_SIGI">
                                                Descargar Plantilla
                                            </a>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@getbootstrap">Cargar Encuestas</button>




            </div>
            <div class="row mx-0">
                <div class="col-lg-12 mx-0 text-center">
                    <img src="../loading.gif" id="img_carga" style="display:none;">
                </div>
            </div>


    </section>
    <!-- /.content -->
</div>



<?php require 'footer.php'; ?>
<script src="scripts/cargar.js"></script>
<?php
}

ob_end_flush();
?>
