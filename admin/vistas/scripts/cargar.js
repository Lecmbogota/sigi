var tabla

//funcion que se ejecuta al inicio
function init() {
  $(document).ready(function () {
    $('#form_carga_encuesta').on('submit', function (e) {
      e.preventDefault()

      /*===================================================================*/
      //VALIDAR QUE SE SELECCIONE UN ARCHIVO
      /*===================================================================*/
      if ($('#fileencuestas').get(0).files.length == 0) {
        Swal.fire({
          position: 'center',
          icon: 'warning',
          title: 'Debe seleccionar un archivo (Excel).',
          showConfirmButton: false,
          timer: 2500,
        })
      } else {
        /*===================================================================*/
        //VALIDAR QUE EL ARCHIVO SELECCIONADO SEA EN EXTENSION XLS O XLSX
        /*===================================================================*/
        var extensiones_permitidas = ['.xls', '.xlsx']
        var input_file_encuesta = $('#fileencuestas')
        var exp_reg = new RegExp(
          '([a-zA-Z0-9s_\\-.:])+(' + extensiones_permitidas.join('|') + ')$',
        )

        if (!exp_reg.test(input_file_encuesta.val().toLowerCase())) {
          Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Debe seleccionar un archivo con extensión .xls o .xlsx.',
            showConfirmButton: false,
            timer: 2500,
          })

          return false
        }

        var datos = new FormData($(form_carga_encuesta)[0])

        $('#btnCargar').prop('disabled', true)
        $('#img_carga').attr('style', 'display:block')
        $('#img_carga').attr('style', 'height:200px')
        $('#img_carga').attr('style', 'width:200px')

        $.ajax({
          url: '../ajax/carga.ajax.php',
          type: 'POST',
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function (respuesta) {
            // console.log("respuesta",respuesta);

            if (respuesta['totalProductos'] > 0) {
              Swal.fire({
                position: 'center',
                icon: 'success',
                title:
                  'Encuestas Registradas Correctamente!',
                showConfirmButton: false,
                timer: 2500,
              }, function(){
      window.location.href = "http://192.168.0.122/sigi/admin/vistas/productividad.php";
})

              $('#btnCargar').prop('disabled', false)
              $('#img_carga').attr('style', 'display:none')
            } else {
              Swal.fire({
                position: 'center',
                icon: 'error',
                title:
                  'Se presento un error al momento de realizar la carga del archivo!',
                showConfirmButton: false,
                timer: 2500,
              })

              $('#btnCargar').prop('disabled', false)
              $('#img_carga').attr('style', 'display:none')
            }
          },
        })
      }
    })
  })

  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })

  $('#fileRequest').click(function () {
    // hope the server sets Content-Disposition: attachment!
    window.location =
      'admin/public/plantillas/ENCUESTAS_EFECTIVAS_PLANTILLA_SIGI.xlsx'
  })
}

init()
