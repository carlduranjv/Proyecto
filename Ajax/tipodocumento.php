<?php 
require_once "../Models/TipoDocumento.php";
$tipodocumento = new TipoDocumento();
$IdTipoDocumento= isset($_POST['IdTipoDocumento'])? limpiarCadena($_POST['IdTipoDocumento']):"";
$NombreDocumento = isset($_POST['NombreDocumento'])? limpiarCadena($_POST['NombreDocumento']):"";



switch ($_GET['Operacion']) 
{

	case 'listar':
	       $Respuesta=$tipodocumento->listar();
	       $datos= array();
	       while ($reg= $Respuesta->fetch_object())
	       {
           $datos[]=array(
           "0"=>($reg->Condicion)?'<button class="btn btn-warning" onClick="mostrar('.$reg->IdTipoDocumento.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-danger" onClick="desactivar('.$reg->IdTipoDocumento.')"><i class="fas fa-close"></i></button>':
           '<button class="btn btn-warning" onClick="mostrar('.$reg->IdTipoDocumento.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-primary" onClick="activar('.$reg->IdTipoDocumento.')"><i class="fas fa-check"></i></button>',
           "1"=>$reg->NombreDocumento,
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
             $Respuesta=$tipodocumento->mostrar($IdTipoDocumento);
    		echo json_encode($Respuesta);
    	break;

    case 'guardaryeditar':
    	
    	if (empty($IdTipoDocumento)) 
    	{
    		$Respuesta=$tipodocumento->insertar($NombreDocumento);
    		echo $Respuesta ? "Tipo de Documento Registrado con Exito!" : "Falló al Registrar el Tipo de Documento";
    	}
    	else
    	{
            $Respuesta=$tipodocumento->editar($IdTipoDocumento, $NombreDocumento);
    		echo $Respuesta ? "Tipo de Documento Actualizado!" : "Falló al Actualizar el Tipo de Documento";
    	}
    	break;	

    case 'activar':
    	  $Respuesta=$tipodocumento->activar($IdTipoDocumento);
    		echo $Respuesta ? "El tipo de Documento Activado con Exito!" : "Falló al Activar el Tipo de Documento";
    	break;

	case 'desactivar':
	        $Respuesta=$tipodocumento->desactivar($IdTipoDocumento);
    		echo $Respuesta ? "El Tipo de Documento Desactivado con Exito!" : "Falló al Desactivar el Tipo de Documento";
		  break;
}

 ?>