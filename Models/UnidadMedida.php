<?php 
require "../Config/Conexion.php";

class UnidadMedida
{
	
	public function __construct()
	{
		
	}
	
	public function insertar ($CodUnidad,$NombreUnidad)
	{
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
		$sql="INSERT INTO unidad (CodUnidad, NombreUnidad, Condicion, FechaRegistro, FechaModificacion) VALUES ('$CodUnidad','$NombreUnidad','1', '$FechaRegistro', '$FechaRegistro')";
		return ejecutarConsulta($sql);
	}

	public function editar ($IdUnidad,$CodUnidad, $NombreUnidad){
         date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
        $sql= "UPDATE unidad SET CodUnidad='$CodUnidad', 
                            NombreUnidad= '$NombreUnidad',
                            FechaModificacion= '$FechaRegistro' WHERE IdUnidad='$IdUnidad'";
      return ejecutarConsulta($sql);
	}

    public function activar ($IdUnidad)
    {
        $sql= "UPDATE unidad SET Condicion='1' WHERE IdUnidad='$IdUnidad'";
        return ejecutarConsulta($sql);
    }

     public function desactivar ($IdUnidad)
    {
        $sql= "UPDATE unidad SET Condicion='0' WHERE IdUnidad='$IdUnidad'";
        return ejecutarConsulta($sql);
    }

    public function mostrar ($IdUnidad)
    {
        $sql= "SELECT * FROM unidad WHERE IdUnidad = $IdUnidad";
        return ejecutarConsultaSimpleFila($sql);
    }

     public function listar ()
    {
        $sql= "SELECT * FROM unidad";
        return ejecutarConsulta($sql);
    }
}




 ?>