<?php 
require "../Config/Conexion.php";

class TipoDocumento
{
	
	public function __construct()
	{
		
	}
	
	public function insertar ($NombreDocumento)
	{
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
		$sql="INSERT INTO tipodocumento (NombreDocumento, Condicion, FechaRegistro, FechaModificacion) VALUES ('$NombreDocumento','1', '$FechaRegistro', '$FechaRegistro')";
		return ejecutarConsulta($sql);
	}

	public function editar ($IdTipoDocumento,$NombreDocumento){
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
        $sql= "UPDATE tipodocumento SET NombreDocumento='$NombreDocumento',
                    FechaModificacion= '$FechaRegistro' WHERE IdTipoDocumento='$IdTipoDocumento'";
      return ejecutarConsulta($sql);
	}

    public function activar ($IdTipoDocumento)
    {
        $sql= "UPDATE tipodocumento SET Condicion='1' WHERE IdTipoDocumento='$IdTipoDocumento'";
        return ejecutarConsulta($sql);
    }

     public function desactivar ($IdTipoDocumento)
    {
        $sql= "UPDATE tipodocumento SET Condicion='0' WHERE IdTipoDocumento='$IdTipoDocumento'";
        return ejecutarConsulta($sql);
    }

    public function mostrar ($IdTipoDocumento)
    {
        $sql= "SELECT * FROM tipodocumento WHERE IdTipoDocumento = $IdTipoDocumento";
        return ejecutarConsultaSimpleFila($sql);
    }

     public function listar ()
    {
        $sql= "SELECT * FROM tipodocumento";
        return ejecutarConsulta($sql);
    }
}




 ?>