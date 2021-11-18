<?php 
require "../Config/Conexion.php";

class Usuario
{
	
	public function __construct()
	{
		
	}
	
	public function insertar ($Nombre,$Apellido,$Correo,$Cargo,$Telefono,$Login,$Password,$Imagen)
	{
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
		$sql="INSERT INTO usuario (Nombre,Apellido,Correo,Cargo,Telefono,Login,Password,Imagen,Condicion, FechaRegistro, FechaModificacion) VALUES ('$Nombre','$Apellido','$Correo','$Cargo','$Telefono','$Login','$Password','$Imagen','1','$FechaRegistro','$FechaRegistro')";
		return ejecutarConsulta($sql);
	}

	public function editar ($IdUsuario,$Nombre,$Apellido,$Correo,$Cargo,$Telefono,$Login,$Password,$Imagen){
         date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
        $sql= "UPDATE usuario SET Nombre='$Nombre',Apellido= '$Apellido',Correo= '$Correo',
                            Cargo= '$Cargo',Telefono= '$Telefono', Login= '$Login', Password= '$Password',
                            Imagen= '$Imagen',
                            FechaModificacion= '$FechaRegistro' WHERE IdUsuario='$IdUsuario'";
      return ejecutarConsulta($sql);
	}

    public function activar ($IdUsuario)
    {
        $sql= "UPDATE usuario SET Condicion='1' WHERE IdUsuario='$IdUsuario'";
        return ejecutarConsulta($sql);
    }

     public function desactivar ($IdUsuario)
    {
        $sql= "UPDATE usuario SET Condicion='0' WHERE IdUsuario='$IdUsuario'";
        return ejecutarConsulta($sql);
    }

    public function mostrar ($IdUsuario)
    {
        $sql= "SELECT * FROM usuario WHERE IdUsuario = $IdUsuario";
        return ejecutarConsultaSimpleFila($sql);
    }

     public function listar ()
    {
        $sql= "SELECT * FROM usuario";
        return ejecutarConsulta($sql);
    }
}




 ?>