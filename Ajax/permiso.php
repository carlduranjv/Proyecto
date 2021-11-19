<?php 
require_once "../Models/Permiso.php";
$permiso = new Permiso();
$IdPermiso= isset($_POST['IdPermiso'])? limpiarCadena($_POST['IdPermiso']):"";
$NombrePermiso = isset($_POST['NombrePermiso'])? limpiarCadena($_POST['NombrePermiso']):"";



switch ($_GET['Operacion']) 
{

	case 'listar':
	       $Respuesta=$permiso->listar();
	       $datos= array();
	       while ($reg= $Respuesta->fetch_object())
	       {
           $datos[]=array(
           "0"=>($reg->Condicion)?'<button class="btn btn-warning" onClick="mostrar('.$reg->IdPermiso.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-danger" onClick="desactivar('.$reg->IdPermiso.')"><i class="fas fa-close"></i></button>':
           '<button class="btn btn-warning" onClick="mostrar('.$reg->IdPermiso.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-primary" onClick="activar('.$reg->IdPermiso.')"><i class="fas fa-check"></i></button>',
           "1"=>$reg->NombrePermiso,
           "2"=>($reg->Condicion)?'<span class="label bg-green">Activado</span>':
           '<span class="label bg-red">Desactivado</span>'
             ); 
	       }
	       $Resultados= array(
            "sEccho"=>1,
            "iTotalRecords"=>count($datos),
            "iTotalDisplayRecords"=>count($datos),
            "aaData"=>$datos);
            echo json_encode($Resultados);
		  break;
	
    case 'mostrar':
             $Respuesta=$permiso->mostrar($IdPermiso);
    		echo json_encode($Respuesta);
    	break;

    case 'guardaryeditar':
    	
    	if (empty($IdPermiso)) 
    	{
    		$Respuesta=$permiso->insertar($NombrePermiso);
    		echo $Respuesta ? "Permiso Registrado con Exito!" : "Falló al Registrar el Permiso";
    	}
    	else
    	{
            $Respuesta=$permiso->editar($IdPermiso, $NombrePermiso);
    		echo $Respuesta ? "Permiso Actualizado!" : "Falló al Actualizar el Permiso";
    	}
    	break;	

    case 'activar':
    	  $Respuesta=$permiso->activar($IdPermiso);
    		echo $Respuesta ? "Permiso Activado con Exito!" : "Falló al Activar el Permiso";
    	break;

	case 'desactivar':
	        $Respuesta=$permiso->desactivar($IdPermiso);
    		echo $Respuesta ? "Permiso Desactivado con Exito!" : "Falló al Desactivar el Permiso";
		  break;
}

 ?>