<?php 
require_once "../Models/Cliente.php";
$cliente = new Cliente();
$IdCliente = isset($_POST['IdCliente'])? limpiarCadena($_POST['IdCliente']):"";
$Rif = isset($_POST['Rif'])? limpiarCadena($_POST['Rif']):"";
$RazonSocial = isset($_POST['RazonSocial'])? limpiarCadena($_POST['RazonSocial']):"";
$Direccion = isset($_POST['Direccion'])? limpiarCadena($_POST['Direccion']):"";
$Telefono = isset($_POST['Telefono'])? limpiarCadena($_POST['Telefono']):"";

switch ($_GET['Operacion']) 
{

	case 'listar':
	       $Respuesta=$cliente->listar();
	       $datos= array();
	       while ($reg= $Respuesta->fetch_object())
	       {
           $datos[]=array(
           "0"=>($reg->Condicion)?'<button class="btn btn-warning" onClick="mostrar('.$reg->IdCliente.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-danger" onClick="desactivar('.$reg->IdCliente.')"><i class="fas fa-close"></i></button>':
           '<button class="btn btn-warning" onClick="mostrar('.$reg->IdCliente.')"><i class="fas fa-edit"></i></button>'.' <button class="btn btn-primary" onClick="activar('.$reg->IdCliente.')"><i class="fas fa-check"></i></button>',
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
             $Respuesta=$cliente->mostrar($IdCliente);
    		echo json_encode($Respuesta);
    	break;

    case 'guardaryeditar':
    	
    	if (empty($IdCliente)) 
    	{
    		$Respuesta=$cliente->insertar($Rif, $RazonSocial, $Direccion, $Telefono);
    		echo $Respuesta ? "Cliente Registrado con Exito!" : "Falló al Registrar el Cliente";
    	}
    	else
    	{
            $Respuesta=$cliente->editar($IdCliente, $Rif, $RazonSocial, $Direccion, $Telefono);
    		echo $Respuesta ? "Cliente Actualizado!" : "Falló al Actualizar el Cliente";
    	}
    	break;	

    case 'activar':
    	  $Respuesta=$cliente->activar($IdCliente);
    		echo $Respuesta ? "Cliente Activado con Exito!" : "Falló al Activar el Cliente";
    	break;

	case 'desactivar':
	        $Respuesta=$cliente->desactivar($IdCliente);
    		echo $Respuesta ? "Cliente Desactivado con Exito!" : "Falló al Desactivar el Cliente";
		  break;
}

 ?>