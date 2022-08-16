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
  

}

//funcion limpiar
function limpiar(){
	$("#Cliente").val("");
    $("#Estudio").val("");
	$("#Nivel").val("");
	$("#Muestra").val("");
	$("#Fecha_Inicio_Estudio").val("");
	$("#Fecha_Entrega_Estudio").val("");
	$("#TMO").val("");
	$("#TME").val("");
	$("#Fecha_Creacion").val("");

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
			url:'../ajax/estudio.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":50,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}
//funcion para guardaryeditar
function guardareditar(e){
     e.preventDefault();//no se activara la accion predeterminada 
     $("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../ajax/estudio.php?op=guardareditar",
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
     	url: "../ajax/estudio.php?op=editar_clave",
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
function mostrar(id_Estudio){
	$.post("../ajax/estudio.php?op=mostrar",{id_Estudio : id_Estudio},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarformu(true);
			if ($("#id_Estudio").val(data.id_Estudio).length==0) {
           	$("#claves").show();
           	
           }else{
			$("#claves").hide();
			}
			$("#Cliente").val(data.Cliente);
            $("#Estudio").val(data.Estudio);
			$("#Nivel").val(data.Nivel);
            $("#Muestra").val(data.Muestra);
            $("#Fecha_Inicio_Estudio").val(data.Fecha_Inicio_Estudio);
            $("#Fecha_Entrega_Estudio").val(data.Fecha_Entrega_Estudio);
            $("#TMO").val(data.TMO);
            $("#TME").val(data.TME);
            $("#Fecha_Creacion").val(data.Fecha_Creacion);


 
		});
	$.post("../ajax/estudio.php?op=permisos&id="+id_Estudio, function(r){
	$("#permisos").html(r);
});
}

function mostrar_clave(id_Estudio){
	 $("#getCodeModal").modal('show');
	$.post("../ajax/estudio.php?op=mostrar_clave",{id_Estudio : id_Estudio},
		function(data,status)
		{
			data=JSON.parse(data);
            $("#id_Estudio").val(data.id_Estudio);
		});
}
//funcion para desactivar
function desactivar(id_Estudio){
	bootbox.confirm("¿Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../ajax/estudio.php?op=desactivar", {id_Estudio : id_Estudio}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function activar(id_Estudio){
	bootbox.confirm("¿Esta seguro de activar este dato?" , function(result){
		if (result) {
			$.post("../ajax/estudio.php?op=activar", {id_Estudio : id_Estudio}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}



init();