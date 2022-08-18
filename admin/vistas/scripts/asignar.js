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
    $('#agente').load('list_agentes_cap.php')
    $('#agente').change(function () {
      var id = $('#agente').val()
      $.get('list_Estudios_cap.php', { param_id: id }).done(function (Data) {
        $('#estudio').html(Data)
        $('#estudio').selectpicker('refresh')
      })
    })
  })

  $('document').ready(function () {
    $('#agente').change(function () {
      var id = $('#agente').val()
      $.get('list_cedula_cap.php', { param_id: id }).done(function (Data) {
        $('#cedula').html(Data)
      })
    })
  })

  //cargamos los items al select Estudio
  $.post('../ajax/asignar.php?op=selectEstudio', function (r) {
    $('#estudio').html(r)
    $('#estudio').selectpicker('refresh')
  })

  //cargamos los items al select Agente
  $.post('../ajax/asignar.php?op=selectAgente', function (r) {
    $('#idcliente').html(r)
    $('#idcliente').selectpicker('refresh')
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

function cancelarform() {
  $('#claves').show()
  limpiar()
  mostrarformu(false)
}

function cancelarform_clave() {
  limpiar()
  mostrarform_clave(false)
}

function listar() {
  tabla = $('#tbllist')
    .dataTable({
      aProcessing: true, //activamos el procedimiento del datatable
      aServerSide: true, //paginacion y filrado realizados por el server
      dom: 'Bfrtip', //definimos los elementos del control de la tabla
      buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5'],
      ajax: {
        url: '../ajax/asignar.php?op=listar',
        type: 'get',
        dataType: 'json',
        error: function (e) {
          console.log(e.responseText)
        },
      },
      bDestroy: true,
      iDisplayLength: 10, //paginacion
      order: [[0, 'desc']], //ordenar (columna, orden)
    })
    .DataTable()
}

function guardareditar(e) {
  e.preventDefault() //no se activara la accion predeterminada
  $('#btnGuardar').prop('disabled', true)
  var formData = new FormData($('#formulario')[0])
  $.ajax({
    url: '../ajax/asignar.php?op=guardareditar',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      bootbox.alert(datos)
      mostrarformu(false)
      tabla.ajax.reload()
    },
  })
  $('#claves').show()
  limpiar()
}
init()
