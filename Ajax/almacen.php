<?php 
require_once "../Models/Almacen.php";
$almacen = new Almacen();
$IdAlmacen = isset($_POST['IdAlmacen'])? limpiarCadena($_POST['IdAlmacen']):"";
$CodAlmacen = isset($_POST['CodAlmacen'])? limpiarCadena($_POST['CodAlmacen']):"";
$NombreAlmacen = isset($_POST['NombreAlmacen'])? limpiarCadena($_POST['NombreAlmacen']):"";


switch ($_GET['Operacion']) 
{

	case 'listar':
	       $Respuesta=$almacen->listar();
	       $datos= array();
	       while ($reg= $Respuesta->fetch_object())
	       {
           $datos[]=array(
           "0"=>($reg->Condicion)?'<button class="btn btn-warning" onClick="mostrar('.$reg->IdAlmacen.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-danger" onClick="desactivar('.$reg->IdAlmacen.')"><i class="fas fa-close"></i></button>':
           '<button class="btn btn-warning" onClick="mostrar('.$reg->IdAlmacen.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-primary" onClick="activar('.$reg->IdAlmacen.')"><i class="fas fa-check"></i></button>',
           "1"=>$reg->CodAlmacen,
           "2"=>$reg->NombreAlmacen,
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
             $Respuesta=$almacen->mostrar($IdAlmacen);
    		echo json_encode($Respuesta);
    	break;

    case 'guardaryeditar':
    	
    	if (empty($IdAlmacen)) 
    	{
    		$Respuesta=$almacen->insertar($CodAlmacen, $NombreAlmacen);
    		echo $Respuesta ? "Almacen Registrado con Exito!" : "Falló al Registrar el Almacen";
    	}
    	else
    	{
            $Respuesta=$almacen->editar($IdAlmacen, $CodAlmacen, $NombreAlmacen);
    		echo $Respuesta ? "Almacen Actualizado!" : "Falló al Actualizar el Almacen";
    	}
    	break;	

    case 'activar':
    	  $Respuesta=$almacen->activar($IdAlmacen);
    		echo $Respuesta ? "Almacen Activado con Exito!" : "Falló al Activar el Almacen";
    	break;

	case 'desactivar':
	        $Respuesta=$almacen->desactivar($IdAlmacen);
    		echo $Respuesta ? "Almacen Desactivado con Exito!" : "Falló al Desactivar el Almacen";
		  break;
}

 ?>