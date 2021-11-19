<?php 
require_once "../Models/Proveedor.php";
$proveedor = new Proveedor();
$IdProveedor = isset($_POST['IdProveedor'])? limpiarCadena($_POST['IdProveedor']):"";
$Rif = isset($_POST['Rif'])? limpiarCadena($_POST['Rif']):"";
$RazonSocial = isset($_POST['RazonSocial'])? limpiarCadena($_POST['RazonSocial']):"";
$Direccion = isset($_POST['Direccion'])? limpiarCadena($_POST['Direccion']):"";
$Telefono = isset($_POST['Telefono'])? limpiarCadena($_POST['Telefono']):"";

switch ($_GET['Operacion']) 
{

	case 'listar':
	       $Respuesta=$proveedor->listar();
	       $datos= array();
	       while ($reg= $Respuesta->fetch_object())
	       {
           $datos[]=array(
           "0"=>($reg->Condicion)?'<button class="btn btn-warning" onClick="mostrar('.$reg->IdProveedor.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-danger" onClick="desactivar('.$reg->IdProveedor.')"><i class="fas fa-close"></i></button>':
           '<button class="btn btn-warning" onClick="mostrar('.$reg->IdProveedor.')"><i class="fas fa-edit"></i></button>'.' <button class="col-auto" class="btn btn-primary" onClick="activar('.$reg->IdProveedor.')"><i class="fas fa-check"></i></button>',
           "1"=>$reg->Rif,
           "2"=>$reg->RazonSocial,
           "3"=>$reg->Direccion,
           "4"=>$reg->Telefono,
           "5"=>($reg->Condicion)?'<span class="label bg-green">Activado</span>':
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
             $Respuesta=$proveedor->mostrar($IdProveedor);
    		echo json_encode($Respuesta);
    	break;

    case 'guardaryeditar':
    	
    	if (empty($IdProveedor)) 
    	{
    		$Respuesta=$proveedor->insertar($Rif, $RazonSocial, $Direccion, $Telefono);
    		echo $Respuesta ? "Proveedor Registrado con Exito!" : "Falló al Registrar el Proveedor";
    	}
    	else
    	{
            $Respuesta=$proveedor->editar($IdProveedor, $Rif, $RazonSocial, $Direccion, $Telefono);
    		echo $Respuesta ? "Proveedor Actualizado!" : "Falló al Actualizar el Proveedor";
    	}
    	break;	

    case 'activar':
    	  $Respuesta=$proveedor->activar($IdProveedor);
    		echo $Respuesta ? "Proveedor Activado con Exito!" : "Falló al Activar el Proveedor";
    	break;

	case 'desactivar':
	        $Respuesta=$proveedor->desactivar($IdProveedor);
    		echo $Respuesta ? "Proveedor Desactivado con Exito!" : "Falló al Desactivar el Proveerdor";
		  break;
}

 ?>