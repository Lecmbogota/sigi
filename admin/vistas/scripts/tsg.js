var tabla
function init() {
  mostrarformu(false)
  mostrarform_clave(false)
  listar()

  $('#formularioc').on('submit', function (c) {
    editar_clave(c)
  })

  $('#formulario').on('submit', function (e) {
    guardareditar(e)
  })

  $('document').ready(function () {
    $('#agente_tsg').selectpicker('refresh')
    $('#supervisor_tsg').load('list_area_tsg.php')
    $('#supervisor_tsg').change(function () {
      var id = $('#supervisor_tsg').val()
      $.get('list_agentes_tsg.php', { param_id: id }).done(function (Data) {
        $('#agente_tsg').html(Data)
        $('#agente_tsg').selectpicker('refresh')
      })
    })
  })
}

function limpiar() {
  $('#idusuario ').val('')
  $('#estudio ').val('')
  $('#calificacion').val('')
  $('#fecha_capacitacion').val('')
}

function mostrarformu(flag) {
  limpiar()
  if (flag) {
    $('#listadoregistros').hide()
    $('#formularioregistros').show()
    $('#btnGuardar').prop('disabled', false)
    $('#btnagregar').hide()
  } else {
    $('#listadoregistros').show()
    $('#formularioregistros').hide()
    $('#btnagregar').show()
  }
}

function mostrarform_clave(flag) {
  limpiar()
  if (flag) {
    $('#listadoregistros').hide()
    $('#formulario_clave').show()
    $('#btnGuardar_clave').prop('disabled', false)
    $('#btnagregar').hide()
  } else {
    $('#listadoregistros').show()
    $('#formulario_clave').hide()
    $('#btnagregar').show()
  }
}

function eliminaregistro(id_tsg) {
  bootbox.confirm('¿Esta seguro de Eliminar este Registro?', function (result) {
    if (result) {
      $.post(
        '../ajax/tsg.php?op=eliminaregistro',
        { id_tsg: id_tsg },
        function (e) {
          bootbox.alert(e)
          tabla.ajax.reload()
        },
      )
    }
  })
}

function cancelarform() {
  $('#claves').show()
  limpiar()
  mostrarformu(false)
}

function listar() {
  tabla = $('#tbllist')
    .dataTable({
      aProcessing: true, //activamos el procedimiento del datatable
      aServerSide: true, //paginacion y filrado realizados por el server
      dom: 'Bfrtip', //definimos los elementos del control de la tabla
      buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5'],
      ajax: {
        url: '../ajax/tsg.php?op=listar',
        type: 'get',
        dataType: 'json',
        error: function (e) {
          console.log(e.responseText)
        },
      },
      bDestroy: true,
      iDisplayLength: 30, //paginacion
      order: [
        [3, 'desc'],
        [2, 'desc'],
      ], //ordenar (columna, orden)
    })
    .DataTable()
}

init()
