<?php 
require_once "../Models/Grupo.php";
$grupo = new Grupo();
$IdGrupo = isset($_POST['IdGrupo'])? limpiarCadena($_POST['IdGrupo']):"";
$CodGrupo = isset($_POST['CodGrupo'])? limpiarCadena($_POST['CodGrupo']):"";
$NombreGrupo = isset($_POST['NombreGrupo'])? limpiarCadena($_POST['NombreGrupo']):"";


switch ($_GET['Operacion']) 
{

	case 'listar':
	       $Respuesta=$grupo->listar();
	       $datos= array();
	       while ($reg= $Respuesta->fetch_object())
	       {
           $datos[]=array(
           "0"=>($reg->Condicion)?'<button class="btn btn-warning" onClick="mostrar('.$reg->IdGrupo.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-danger" onClick="desactivar('.$reg->IdGrupo.')"><i class="fas fa-close"></i></button>':
           '<button class="btn btn-warning" onClick="mostrar('.$reg->IdGrupo.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-primary" onClick="activar('.$reg->IdGrupo.')"><i class="fas fa-check"></i></button>',
           "1"=>$reg->CodGrupo,
           "2"=>$reg->NombreGrupo,
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
             $Respuesta=$grupo->mostrar($IdGrupo);
    		echo json_encode($Respuesta);
    	break;

    case 'guardaryeditar':
    	
    	if (empty($IdGrupo)) 
    	{
    		$Respuesta=$grupo->insertar($CodGrupo, $NombreGrupo);
    		echo $Respuesta ? "Grupo Registrado con Exito!" : "Falló al Registrar el grupo";
    	}
    	else
    	{
            $Respuesta=$grupo->editar($IdGrupo, $CodGrupo, $NombreGrupo);
    		echo $Respuesta ? "Grupo Actualizado!" : "Falló al Actualizar el Grupo";
    	}
    	break;	

    case 'activar':
    	  $Respuesta=$grupo->activar($IdGrupo);
    		echo $Respuesta ? "Grupo Activado con Exito!" : "Falló al Activar el Grupo";
    	break;

	case 'desactivar':
	        $Respuesta=$grupo->desactivar($IdGrupo);
    		echo $Respuesta ? "Grupo Desactivado con Exito!" : "Falló al Desactivar el Grupo";
		  break;
}

 ?>