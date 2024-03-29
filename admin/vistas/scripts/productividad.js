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

  $('#imagenmuestra').hide()
  //mostramos los permisos
  $.post('../ajax/productividad.php?op=permisos&id=', function (r) {
    $('#permisos').html(r)
  })

  //cargamos los items al select departamento
  $.post('../ajax/departamento.php?op=selectDepartamento', function (r) {
    $('#iddepartamento').html(r)
    $('#iddepartamento').selectpicker('refresh')
  })

  //cargamos los items al select tipousuario
  $.post('../ajax/tipousuario.php?op=selectTipousuario', function (r) {
    $('#idtipousuario').html(r)
    $('#idtipousuario').selectpicker('refresh')
  })
}

//funcion limpiar
function limpiar() {
  $('#ee_id').val('')
  $('#ee_encuestador').val('')
  $('#ee_fecha').val('')
  $('#ee_estudio').val('')
  $('#ee_estatus').selectpicker('refresh')
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
  tabla = $('#tbllistado').dataTable({
    aProcessing: true, //activamos el procedimiento del datatable
    aServerSide: true, //paginacion y filrado realizados por el server
    dom: 'Bfrtip', //definimos los elementos del control de la tabla
    buttons: ['excelHtml5'],
    language: {
      url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
    },
    ajax: {
      url: '../ajax/productividad.php?op=listar',
      type: 'get',
      dataType: 'json',
      error: function (e) {
        console.log(e.responseText)
      },
    },
    bDestroy: true,
    iDisplayLength: 50, //paginacion
    order: [
      [5, 'desc'],
      [2, 'asc'],
      [1, 'asc'],
    ], //ordenar (columna, orden)
  })
}

//funcion para guardaryeditar
function guardaryeditar(e) {
  e.preventDefault() //no se activara la accion predeterminada
  $('#btnGuardar').prop('disabled', true)
  var formData = new FormData($('#formulario')[0])

  $.ajax({
    url: '../ajax/productividad.php?op=guardaryeditar',
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
    url: '../ajax/productividad.php?op=editar_clave',
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
function mostrar(id_carga) {
  $.post(
    '../ajax/productividad.php?op=mostrar',
    { id_carga: id_carga },
    function (data, status) {
      data = JSON.parse(data)
      mostrarform(true)
      if ($('#id_carga').val(data.id_carga).length == 0) {
        $('#claves').show()
      } else {
        $('#claves').hide()
      }
      $('#ee_id').val(data.ee_id)
      $('#ee_encuestador').val(data.ee_encuestador)
      $('#ee_fecha').val(data.ee_fecha)
      $('#ee_estudio').val('ee_estudio')
      $('#ee_estatus').val(data.ee_estatus)
    },
  )
  $.post('../ajax/productividad.php?op=permisos&id=' + id_carga, function (r) {
    $('#permisos').html(r)
  })
}

//funcion para desactivar
function desactivar(id_carga) {
  bootbox.confirm('¿Esta seguro de desactivar este dato?', function (result) {
    if (result) {
      $.post(
        '../ajax/productividad.php?op=desactivar',
        { id_carga: id_carga },
        function (e) {
          bootbox.alert(e)
          tabla.ajax.reload()
        },
      )
    }
  })
}

function activar(id_carga) {
  bootbox.confirm('¿Esta seguro de activar este dato?', function (result) {
    if (result) {
      $.post(
        '../ajax/productividad.php?op=activar',
        { id_carga: id_carga },
        function (e) {
          bootbox.alert(e)
          tabla.ajax.reload()
        },
      )
    }
  })
}

init()
