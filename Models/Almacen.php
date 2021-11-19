<?php 
require "../Config/Conexion.php";

class Almacen
{
	
	public function __construct()
	{
		
	}
	
	public function insertar ($CodAlmacen,$NombreAlmacen)
	{
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
		$sql="INSERT INTO almacen (CodAlmacen, NombreAlmacen, Condicion, FechaRegistro, FechaModificacion) VALUES ('$CodAlmacen','$NombreAlmacen','1', '$FechaRegistro', '$FechaRegistro')";
		return ejecutarConsulta($sql);
	}

	public function editar ($IdAlmacen,$CodAlmacen, $NombreAlmacen){
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
        $sql= "UPDATE almacen SET CodAlmacen='$CodAlmacen', 
                            NombreAlmacen= '$NombreAlmacen',
                            FechaModificacion= '$FechaRegistro' WHERE IdAlmacen='$IdAlmacen'";
      return ejecutarConsulta($sql);
	}

    public function activar ($IdAlmacen)
    {
        $sql= "UPDATE almacen SET Condicion='1' WHERE IdAlmacen='$IdAlmacen'";
        return ejecutarConsulta($sql);
    }

     public function desactivar ($IdAlmacen)
    {
        $sql= "UPDATE almacen SET Condicion='0' WHERE IdAlmacen='$IdAlmacen'";
        return ejecutarConsulta($sql);
    }

    public function mostrar ($IdAlmacen)
    {
        $sql= "SELECT * FROM almacen WHERE IdAlmacen = $IdAlmacen";
        return ejecutarConsultaSimpleFila($sql);
    }

     public function listar ()
    {
        $sql= "SELECT * FROM almacen";
        return ejecutarConsulta($sql);
    }
}




 ?>