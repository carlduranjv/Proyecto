<?php 
require "../Config/Conexion.php";

class Permiso
{
	
	public function __construct()
	{
		
	}
	
	public function insertar ($NombrePermiso)
	{
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
		$sql="INSERT INTO permiso (NombrePermiso, Condicion, FechaRegistro, FechaModificacion) VALUES ('$NombrePermiso','1', '$FechaRegistro', '$FechaRegistro')";
		return ejecutarConsulta($sql);
	}

	public function editar ($IdPermiso,$NombrePermiso){
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
        $sql= "UPDATE permiso SET NombrePermiso='$NombrePermiso',
                    FechaModificacion= '$FechaRegistro' WHERE IdPermiso='$IdPermiso'";
      return ejecutarConsulta($sql);
	}

    public function activar ($IdPermiso)
    {
        $sql= "UPDATE permiso SET Condicion='1' WHERE IdPermiso='$IdPermiso'";
        return ejecutarConsulta($sql);
    }

     public function desactivar ($IdPermiso)
    {
        $sql= "UPDATE permiso SET Condicion='0' WHERE IdPermiso='$IdPermiso'";
        return ejecutarConsulta($sql);
    }

    public function mostrar ($IdPermiso)
    {
        $sql= "SELECT * FROM permiso WHERE IdPermiso = $IdPermiso";
        return ejecutarConsultaSimpleFila($sql);
    }

     public function listar ()
    {
        $sql= "SELECT * FROM permiso";
        return ejecutarConsulta($sql);
    }
}




 ?>