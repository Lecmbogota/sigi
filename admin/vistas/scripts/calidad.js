var tabla;

//funcion que se ejecuta al inicio
function init(){

   listar();



}

//funcion listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: ['excelHtml5'],
		
		"ajax":
		{
			url:'../ajax/calidad.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":200,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}

//funcion para desactivar
function desactivar(id_carga ){
	bootbox.confirm("¿Esta seguro de ANULAR este ID?", function(result){
		if (result) {
			$.post("../ajax/calidad.php?op=desactivar", {id_carga  : id_carga }, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function activar(id_carga ){
	bootbox.confirm("¿Esta seguro de cambiar a EFECTIVA este ID?" , function(result){
		if (result) {
			$.post("../ajax/calidad.php?op=activar", {id_carga  : id_carga }, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}



init();