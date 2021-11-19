<?php 
require_once "../Models/Producto.php";
$producto = new Producto();
$IdCategoria = isset($_POST['IdCategoria'])? limpiarCadena($_POST['IdCategoria']):"";
$CodCategoria = isset($_POST['CodCategoria'])? limpiarCadena($_POST['CodCategoria']):"";
$NombreCategoria = isset($_POST['NombreCategoria'])? limpiarCadena($_POST['NombreCategoria']):"";


switch ($_GET['Operacion']) 
{

	case 'listar':
	       $Respuesta=$categoria->listar();
	       $datos= array();
	       while ($reg= $Respuesta->fetch_object())
	       {
           $datos[]=array(
           "0"=>($reg->Condicion)?'<button class="btn btn-warning" onClick="mostrar('.$reg->IdCategoria.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-danger" onClick="desactivar('.$reg->IdCategoria.')"><i class="fas fa-close"></i></button>':
           '<button class="btn btn-warning" onClick="mostrar('.$reg->IdCategoria.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-primary" onClick="activar('.$reg->IdCategoria.')"><i class="fas fa-check"></i></button>',
           "1"=>$reg->CodCategoria,
           "2"=>$reg->NombreCategoria,
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
             $Respuesta=$categoria->mostrar($IdCategoria);
    		echo json_encode($Respuesta);
    	break;

    case 'guardaryeditar':
    	
    	if (empty($IdCategoria)) 
    	{
    		$Respuesta=$categoria->insertar($CodCategoria, $NombreCategoria);
    		echo $Respuesta ? "Categoria Registrada con Exito!" : "Falló al Registrar la Categoria";
    	}
    	else
    	{
            $Respuesta=$categoria->editar($IdCategoria, $CodCategoria, $NombreCategoria);
    		echo $Respuesta ? "Categoria Actualizada!" : "Falló al Actualizar la Categoria";
    	}
    	break;	

    case 'activar':
    	  $Respuesta=$categoria->activar($IdCategoria);
    		echo $Respuesta ? "Categoria Activada con Exito!" : "Falló al Activar la Categoria";
    	break;

	case 'desactivar':
	        $Respuesta=$categoria->desactivar($IdCategoria);
    		echo $Respuesta ? "Categoria Desactivada con Exito!" : "Falló al Desactivar la Categoria";
		  break;
}

 ?>