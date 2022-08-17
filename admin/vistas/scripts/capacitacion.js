var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarformu(false);
   mostrarform_clave(false);
   listar();
$("#formularioc").on("submit",function(c){
   	editar_clave(c);
   })
   $("#formulario").on("submit",function(e){
   	guardareditar(e);
   })
  



    $(document).ready(function() {
        $('idcliente').multiselect({
            buttonWidth: '400px',
            dropRight: true
        });
    });

    //cargamos los items al select cliente
   $.post("../ajax/asistencia.php?op=selectAgente", function(r){
   	$("#idcliente").html(r);
   	$('#idcliente').selectpicker('refresh');
   });

}

//funcion limpiar
function limpiar(){
	$("#agentecap ").val("");
    $("#estudio ").val("");
	$("#calificacion").val("");
	$("#fecha_capacitacion").val("");
}

//funcion mostrar formulario
function mostrarformu(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}
function mostrarform_clave(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formulario_clave").show();
		$("#btnGuardar_clave").prop("disabled",false);
		$("#btnagregar").hide();
	}else{
		$("#listadoregistros").show();
		$("#formulario_clave").hide();
		$("#btnagregar").show();
	}
}
//cancelar form
function cancelarform(){
	$("#claves").show();
	limpiar();
	mostrarformu(false);
}
function cancelarform_clave(){
	limpiar();
	mostrarform_clave(false);

}



//funcion listar
function listar(){

	
	tabla=$('#tbllist').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
				  'csvHtml5'
				  

		],
		"ajax":
		{
			url:'../ajax/capacitacion.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":100,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}



//funcion para guardaryeditar
function guardareditar(e){
     e.preventDefault();//no se activara la accion predeterminada 

	 $('#exampleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var recipient = button.data('whatever') // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('.modal-title').text('New message to ' + recipient)
		modal.find('.modal-body input').val(recipient)
	})



     $("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../ajax/capacitacion.php?op=guardareditar",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarformu(false);
     		tabla.ajax.reload();
     	}
     });
$("#claves").show();
     limpiar();
}

function editar_clave(c){
     c.preventDefault();//no se activara la accion predeterminada 
     $("#btnGuardar_clave").prop("disabled",true);
     var formData=new FormData($("#formularioc")[0]);

     $.ajax({
     	url: "../ajax/capacitacion.php?op=editar_clave",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarform_clave(false);
     		tabla.ajax.reload();
     	}
     });

     limpiar();
	 $("#getCodeModal").modal('hide');
}
function mostrar(id_capacitacion ){
	$.post("../ajax/capacitacion.php?op=mostrar",{id_capacitacion  : id_capacitacion },
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarformu(true);
			if ($("#id_capacitacion ").val(data.id_capacitacion ).length==0) {
           	$("#claves").show();
           	
           }else{
			$("#claves").hide();
			}
			$("#agentecap ").val(data.agentecap );
            $("#estudio ").val(data.estudio );
            $("#calificacion").val(data.calificacion);
            $("#fecha_capacitacion").val(data.fecha_capacitacion);
    


 
		});
	$.post("../ajax/capacitacion.php?op=permisos&id="+id_capacitacion , function(r){
	$("#permisos").html(r);
});
}





init();