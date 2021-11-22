<?php 
require_once "../Models/Usuario.php";
$usuario = new Usuario();
$IdUsuario = isset($_POST['IdUsuario'])? limpiarCadena($_POST['IdUsuario']):"";
$Nombre = isset($_POST['Nombre'])? limpiarCadena($_POST['Nombre']):"";
$Apellido = isset($_POST['Apellido'])? limpiarCadena($_POST['Apellido']):"";
$Correo = isset($_POST['Correo'])? limpiarCadena($_POST['Correo']):"";
$Cargo = isset($_POST['Cargo'])? limpiarCadena($_POST['Cargo']):"";
$Telefono = isset($_POST['Telefono'])? limpiarCadena($_POST['Telefono']):"";
$Login = isset($_POST['Login'])? limpiarCadena($_POST['Login']):"";
$Password = isset($_POST['Password'])? limpiarCadena($_POST['Password']):"";
$Imagen = isset($_POST['Imagen'])? limpiarCadena($_POST['Imagen']):"";

switch ($_GET['Operacion']) 
{

	case 'listar':
	       $Respuesta=$usuario->listar();
	       $datos= array();
	       while ($reg= $Respuesta->fetch_object())
	       {
           $datos[]=array(
           "0"=>$reg->Nombre,
           "1"=>$reg->Apellido,
           "2"=>$reg->Correo,
           "3"=>$reg->Cargo,
           "4"=>$reg->Telefono,
           "5"=>$reg->Login,
           "6"=>$reg->Password,
           "7"=>"<img src ='../Files/Usuarios/".$reg->Imagen."' height='50px' width='50px' >",
           "8"=>($reg->Condicion)?'<button class="btn btn-warning" onClick="mostrar('.$reg->IdUsuario.')"><i class="fas fa-edit"></i></button>'.'<button class="btn btn-danger" onClick="desactivar('.$reg->IdUsuario.')"><i class="fas fa-close"></i></button>':
           '<button class="btn btn-warning" onClick="mostrar('.$reg->IdUsuario.')"><i class="fas fa-edit"></i></button>'.'<button class="btn btn-primary" onClick="activar('.$reg->IdUsuario.')"><i class="fas fa-check"></i></button>',
           "9"=>($reg->Condicion)?'<span class="label bg-green">Activado</span>':
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
             $Respuesta=$usuario->mostrar($IdUsuario);
    		echo json_encode($Respuesta);
    	break;

    case 'guardaryeditar':
    	
      if (!file_exists($_FILES['Imagen']['tmp_name'])|| !is_uploaded_file($_FILES['Imagen']['tmp_name']))
       {
       $Imagen=$_POST["ImagenActual"];
      }
      else
      {
        $ext=explode(".", $_FILES['Imagen']["name"]);
        if($_FILES['Imagen']['type']=="image/jpg" || $_FILES['Imagen']['type']=="image/jpeg" || $_FILES['Imagen']['type']=="image/png")
        {
          $Imagen=round(microtime(true)) . '.' . end($ext);
          move_uploaded_file($_FILES["Imagen"]["tmp_name"], "../Files/Usuarios/" . $Imagen);
        }
      }
    	if (empty($IdUsuario)) 
    	{
    		$Respuesta=$usuario->insertar($Nombre, $Apellido, $Correo, $Cargo, $Telefono, $Login, $Password, $Imagen);
    		echo $Respuesta ? "Usuario Registrado con Exito!" : "Falló al Registrar el Usuario";
    	}
    	else
    	{
            $Respuesta=$usuario->editar($IdUsuario, $Nombre, $Apellido, $Correo, $Cargo, $Telefono, $Login, $Password, $Imagen);
    		echo $Respuesta ? "Usuario Actualizado!" : "Falló al Actualizar el Usuario";
    	}
    	break;	

    case 'activar':
    	  $Respuesta=$usuario->activar($IdUsuario);
    		echo $Respuesta ? "Usuario Activado con Exito!" : "Falló al Activar el Usuario";
    	break;

	case 'desactivar':
	        $Respuesta=$usuario->desactivar($IdUsuario);
    		echo $Respuesta ? "Usuario Desactivado con Exito!" : "Falló al Desactivar el Usuario";
		  break;

   case 'permiso':
   require_once "../Models/Permiso.php";
   $permiso= new Permiso();
   $Respuesta = $permiso->listar();
   while ($registro= $Respuesta->fetch_object())
   {
    echo '<li> <input type="checkbox" style="width : 20px; heigth : 8px" name="permiso[]" value= "'.$registro->IdPermiso.'">'.$registro->NombrePermiso.'</li>';
   }
   break; 
 }
 ?>