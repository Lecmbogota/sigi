<?php 
require_once "../modelos/Asistencia.php";

$asistencia=new Asistencia();

$codigo_persona=isset($_POST["codigo_persona"])? limpiarCadena($_POST["codigo_persona"]):"";
$iddepartamento=isset($_POST["iddepartamento"])? limpiarCadena($_POST["iddepartamento"]):"";
$tipo=isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]):"";




switch ($_GET["op"]) {
	case 'registrar_asistencia':
		$result=$asistencia->verificarcodigo_persona($codigo_persona);

      	if($result > 0) {
	date_default_timezone_set('America/Bogota');
      		$fecha = date("Y-m-d");
			$hora = date("H:i");



          	if ($tipo == "INICIO GESTION" ){        
                $rspta=$asistencia->registrar_inicio_gestion($codigo_persona,$tipo);
    			//$movimiento = 0;
    			echo $rspta ? '<h3><strong>Nombres: </strong> '. $result['nombre'].'</h3><div class="alert alert-success"> INICIO GESTION - REGISTRADO '.$hora.'</div>' : 'No se pudo registrar el ingreso';
		
			}
			
			if ($tipo == "FIN GESTION" ){
                
         		$rspta=$asistencia->registrar_fin_gestion($codigo_persona,$tipo);
     			//$movimiento = 1;
     			echo $rspta ? '<h3><strong>Nombres: </strong> '. $result['nombre'].'</h3><div class="alert alert-danger"> FIN GESTION - REGISTRADO '.$hora.'</div>' : 'No se pudo registrar la salida';             
        
			}
			
			if ($tipo == "INICIO BREAK" ){
                
         		$rspta=$asistencia->registrar_inicio_break($codigo_persona,$tipo);
     			//$movimiento = 1;
     			echo $rspta ? '<h3><strong>Nombres: </strong> '. $result['nombre'].'</h3><div class="alert alert-success"> INICIO BREAK - REGISTRADO '.$hora.'</div>' : 'No se pudo registrar la salida';             
			
			}
			
			if ($tipo == "FIN BREAK" ){
                
         		$rspta=$asistencia->registrar_fin_break($codigo_persona,$tipo);
     			//$movimiento = 1;
     			echo $rspta ? '<h3><strong>Nombres: </strong> '. $result['nombre'].'</h3><div class="alert alert-danger"> FIN BREAK - REGISTRADO '.$hora.'</div>' : 'No se pudo registrar la salida';             
			
			}
			if ($tipo == "INICIO ALMUERZO" ){
                
				$rspta=$asistencia->registrar_inicio_break($codigo_persona,$tipo);
				//$movimiento = 1;
				echo $rspta ? '<h3><strong>Nombres: </strong> '. $result['nombre'].'</h3><div class="alert alert-success"> INICIO ALMUERZO - REGISTRADO '.$hora.'</div>' : 'No se pudo registrar la salida';             
		   
		   }
		   
		   if ($tipo == "FIN ALMUERZO" ){
			   
				$rspta=$asistencia->registrar_fin_break($codigo_persona,$tipo);
				//$movimiento = 1;
				echo $rspta ? '<h3><strong>Nombres: </strong> '. $result['nombre'].'</h3><div class="alert alert-danger"> FIN ALMUERZO - REGISTRADO '.$hora.'</div>' : 'No se pudo registrar la salida';             
		   
		   }if ($tipo == "INICIO CAPACITACION" ){
                
			$rspta=$asistencia->registrar_inicio_break($codigo_persona,$tipo);
			//$movimiento = 1;
			echo $rspta ? '<h3><strong>Nombres: </strong> '. $result['nombre'].'</h3><div class="alert alert-success"> INICIO CAPACITACION - REGISTRADO '.$hora.'</div>' : 'No se pudo registrar la salida';             
	   
	   }
	   
	   if ($tipo == "FIN CAPACITACION" ){
		   
			$rspta=$asistencia->registrar_fin_break($codigo_persona,$tipo);
			//$movimiento = 1;
			echo $rspta ? '<h3><strong>Nombres: </strong> '. $result['nombre'].'</h3><div class="alert alert-danger"> FIN CAPACITACION - REGISTRADO '.$hora.'</div>' : 'No se pudo registrar la salida';             
	   
	   }
			elseif($tipo != "INICIO GESTION" && $tipo != "FIN GESTION" && $tipo != "INICIO BREAK" && $tipo != "FIN BREAK" && $tipo != "INICIO ALMUERZO" && $tipo != "FIN ALMUERZO" && $tipo != "INICIO CAPACITACION" && $tipo != "FIN CAPACITACION" ) {
		         echo '<div class="alert alert-danger">
                       <i class="icon fa fa-warning"></i> Debe Seleccionar Una Opcion Valida...!
                         </div>';
              }

	break;
			}
}
?>