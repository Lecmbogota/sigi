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
                <h1 class="box-title">CARGAR ENCUESTAS EXITOSAS</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- ENCABEZADOS DE LA TABLA ESTUDIOS  -->
                    <div class="panel-body table-responsive" id="listadoregistros">

                        <!-- FORMULARIO DE CARGA DE ARCHIVO  -->
                        <form action="" name="form_cargaeexitosas" id="form_cargaeexitosas" enctype="multipart/form-data"
                            method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <!-- INPUT ESTUDIO -->
                                    <div class="form-group col-lg-10">
                                        <input type="file" name="archivoexcel " id="archivoexcel" class="form-control"
                                            accept=".xls, .xlsx">
                                    </div>
                                    <!-- BOTON GUARDAR -->
                                    <div class="form-group col-lg-2">
                                        <button class="btn btn-primary" type="submit" value="Cargar Encuestas Exitosas"
                                            name="cargar " id="cargar"><i class="fa fa-save"></i>
                                            Cargar</button>
                                    </div>
                                </div>
                            </div>
                        </form><!-- FIN FORMULARIO ARCHIVO  -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
$(document).ready(function() {

    $('#form_cargaeexitosas').on('submit', function(e) {
        e.preventDefault();

        /* ------------------------------------------------------------*/
        //VALIDAR QUE SE SELECCCIONE 
        /* ------------------------------------------------------------*/
        if ($('#archivoexcel').get(0).files.length == 0) {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Debe seleccionar un archivo (excel) ',
                showConfirmButton: false,
                timer: 2500,
            })

        }

    })
})
</script>

<?php 

require 'footer.php';
 ?>
<script src=" scripts/estudio.js"></script>
<?php 
}

ob_end_flush();
  ?>