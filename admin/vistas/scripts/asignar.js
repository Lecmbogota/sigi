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
    $('#agente').selectpicker('refresh')
    $('#estudio').load('list_Estudios_cap.php')
    $('#estudio').change(function () {
      var id = $('#estudio').val()
      $.get('list_agentes_cap.php', { param_id: id }).done(function (Data) {
        $('#agente').html(Data)
        $('#agente').selectpicker('refresh')
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

function eliminaregistro(id_asig) {
  bootbox.confirm('¿Esta seguro de Eliminar este Registro?', function (result) {
    if (result) {
      $.post(
        '../ajax/asignar.php?op=eliminaregistro',
        { id_asig: id_asig },
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



function mostrar(id_asig) {
  $.post('../ajax/asignar.php?op=mostrar', { id_asig: id_asig }, function (
    data,
    status,
  ) {
    data = JSON.parse(data)
    mostrarformu(true)
    if ($('#id_asig').val(data.id_asig).length == 0) {
      $('#claves').show()
    } else {
      $('#claves').hide()
    }
    $('#agente_asig').val(data.agente_asig)
    $('#estudio_asig').val(data.estudio_asig)
    $('#fecha_asig').val(data.fecha_asig)
    $('#hora_asig	').val(data.hora_asig)
  })
  $.post('../ajax/asignar.php?op=permisos&id=' + id_asig, function (r) {
    $('#permisos').html(r)
  })
}
init()
