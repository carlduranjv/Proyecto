<?php 
require_once "../Models/UnidadMedida.php";
$unidadmedida = new UnidadMedida();
$IdUnidad = isset($_POST['IdUnidad'])? limpiarCadena($_POST['IdUnidad']):"";
$CodUnidad = isset($_POST['CodUnidad'])? limpiarCadena($_POST['CodUnidad']):"";
$NombreUnidad = isset($_POST['NombreUnidad'])? limpiarCadena($_POST['NombreUnidad']):"";


switch ($_GET['Operacion']) 
{

	case 'listar':
	       $Respuesta=$unidadmedida->listar();
	       $datos= array();
	       while ($reg= $Respuesta->fetch_object())
	       {
           $datos[]=array(
           "0"=>($reg->Condicion)?'<button class="btn btn-warning" onClick="mostrar('.$reg->IdUnidad.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-danger" onClick="desactivar('.$reg->IdUnidad.')"><i class="fas fa-close"></i></button>':
           '<button class="btn btn-warning" onClick="mostrar('.$reg->IdUnidad.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-primary" onClick="activar('.$reg->IdUnidad.')"><i class="fas fa-check"></i></button>',
           "1"=>$reg->CodUnidad,
           "2"=>$reg->NombreUnidad,
           "3"=>($reg->Condicion)?'<span class="label bg-green">Activado</span>':
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
             $Respuesta=$unidadmedida->mostrar($IdUnidad);
    		echo json_encode($Respuesta);
    	break;

    case 'guardaryeditar':
    	
    	if (empty($IdUnidad)) 
    	{
    		$Respuesta=$unidadmedida->insertar($CodUnidad, $NombreUnidad);
    		echo $Respuesta ? "Unidad de Medida Registrada con Exito!" : "Falló al Registrar la Unidad de Medida";
    	}
    	else
    	{
            $Respuesta=$unidadmedida->editar($IdUnidad, $CodUnidad, $NombreUnidad);
    		echo $Respuesta ? "Unidad de Medida Actualizada!" : "Falló al Actualizar la Unidad de Medida";
    	}
    	break;	

    case 'activar':
    	  $Respuesta=$unidadmedida->activar($IdUnidad);
    		echo $Respuesta ? "Unidad de Medida Activada con Exito!" : "Falló al Activar la Unidad de Medida";
    	break;

	case 'desactivar':
	        $Respuesta=$unidadmedida->desactivar($IdUnidad);
    		echo $Respuesta ? "Unidad de Medida Desactivada con Exito!" : "Falló al Desactivar la Unidad de Medida";
		  break;
}

 ?>