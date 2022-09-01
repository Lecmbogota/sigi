var tabla

//funcion que se ejecuta al inicio
function init() {
  mostrarform(false)
  mostrarform_clave(false)
  listar()
  $('#formularioc').on('submit', function (c) {
    editar_clave(c)
  })
  $('#formulario').on('submit', function (e) {
    guardaryeditar(e)
  })
}

//funcion limpiar
function limpiar() {
  $('#agente_asig').val('')
  $('#cedula_asig').val('')
  $('#estudio_asig').val('')
  $('#fecha_asig').val('')
  $('#hora_asig').val('')
  $('#hora_fin_asig').val('')
  $('#id_estudio_asig').val('')
}

//funcion mostrar formulario
function mostrarform(flag) {
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
//cancelar form
function cancelarform() {
  $('#claves').show()
  limpiar()
  mostrarform(false)
}
function cancelarform_clave() {
  limpiar()
  mostrarform_clave(false)
}
//funcion listar
function listar() {
  tabla = $('#tbllistado')
    .dataTable({
      aProcessing: true, //activamos el procedimiento del datatable
      aServerSide: true, //paginacion y filrado realizados por el server
      dom: 'Bfrtip', //definimos los elementos del control de la tabla
      lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength'
        ],

      ajax: {
        url: '../ajax/verasig_agente.php?op=listar',
        type: 'get',
        dataType: 'json',
        error: function (e) {
          console.log(e.responseText)
        },
      },
      bDestroy: true,
      iDisplayLength: 10, //paginacion
      order: [[0, 'a2000sc']], //ordenar (columna, orden)
    })
    .DataTable()
}
//funcion para guardaryeditar
function guardaryeditar(e) {
  e.preventDefault() //no se activara la accion predeterminada
  $('#btnGuardar').prop('disabled', true)
  var formData = new FormData($('#formulario')[0])

  $.ajax({
    url: '../ajax/editarasig.php?op=guardaryeditar',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      bootbox.alert(datos)
      mostrarform(false)
      tabla.ajax.reload()
    },
  })
  $('#claves').show()
  limpiar()
}

function editar_clave(c) {
  c.preventDefault() //no se activara la accion predeterminada
  $('#btnGuardar_clave').prop('disabled', true)
  var formData = new FormData($('#formularioc')[0])

  $.ajax({
    url: '../ajax/editarasig.php?op=editar_clave',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      bootbox.alert(datos)
      mostrarform_clave(false)
      tabla.ajax.reload()
    },
  })

  limpiar()
  $('#getCodeModal').modal('hide')
}
function mostrar(id_asig) {
  $.post('../ajax/editarasig.php?op=mostrar', { id_asig: id_asig }, function (
    data,
    status,
  ) {
    data = JSON.parse(data)
    mostrarform(true)
    if ($('#id_asig').val(data.id_asig).length == 0) {
      $('#claves').show()
    } else {
      $('#claves').hide()
    }
    $('#agente_asig').val(data.agente_asig)
    $('#	cedula_asig').val(data.cedula_asig)
    $('#estudio_asig').val(data.estudio_asig)
    $('#fecha_asig').val(data.fecha_asig)
    $('#hora_asig').val(data.hora_asig)
    $('#hora_fin_asig').val(data.hora_fin_asig)
    $('#id_estudio_asig').val(data.id_estudio_asig)
  })
  $.post('../ajax/editarasig.php?op=permisos&id=' + id_asig, function (r) {
    $('#permisos').html(r)
  })
}

function mostrar_clave(id_asig) {
  $('#getCodeModal').modal('show')
  $.post(
    '../ajax/editarasig.php?op=mostrar_clave',
    { id_asig: id_asig },
    function (data, status) {
      data = JSON.parse(data)
      $('#idusuarioc').val(data.id_asig)
    },
  )
}

//funcion para desactivar
function desactivar(id_asig) {
  bootbox.confirm('¿Esta seguro de desactivar este dato?', function (result) {
    if (result) {
      $.post(
        '../ajax/editarasig.php?op=desactivar',
        { id_asig: id_asig },
        function (e) {
          bootbox.alert(e)
          tabla.ajax.reload()
        },
      )
    }
  })
}

function activar(id_asig) {
  bootbox.confirm('¿Esta seguro de activar este dato?', function (result) {
    if (result) {
      $.post(
        '../ajax/editarasig.php?op=activar',
        { id_asig: id_asig },
        function (e) {
          bootbox.alert(e)
          tabla.ajax.reload()
        },
      )
    }
  })
}

init()
