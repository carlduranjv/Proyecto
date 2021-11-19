<?php 
require "../Config/Conexion.php";

class Categoria
{
	
	public function __construct()
	{
		
	}
	
	public function insertar ($CodCategoria,$NombreCategoria)
	{
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
		$sql="INSERT INTO categoria (CodCategoria, NombreCategoria, Condicion, FechaRegistro, FechaActualizacion) VALUES ('$CodCategoria','$NombreCategoria','1', '$FechaRegistro', '$FechaRegistro')";
		return ejecutarConsulta($sql);
	}

	public function editar ($IdCategoria,$CodCategoria, $NombreCategoria){
         date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
        $sql= "UPDATE categoria SET CodCategoria='$CodCategoria', 
                            NombreCategoria= '$NombreCategoria',
                            FechaActualizacion= '$FechaRegistro' WHERE IdCategoria='$IdCategoria'";
      return ejecutarConsulta($sql);
	}

    public function activar ($IdCategoria)
    {
        $sql= "UPDATE categoria SET Condicion='1' WHERE IdCategoria='$IdCategoria'";
        return ejecutarConsulta($sql);
    }

     public function desactivar ($IdCategoria)
    {
        $sql= "UPDATE categoria SET Condicion='0' WHERE IdCategoria='$IdCategoria'";
        return ejecutarConsulta($sql);
    }

    public function mostrar ($IdCategoria)
    {
        $sql= "SELECT * FROM categoria WHERE IdCategoria = $IdCategoria";
        return ejecutarConsultaSimpleFila($sql);
    }

     public function listar ()
    {
        $sql= "SELECT * FROM categoria";
        return ejecutarConsulta($sql);
    }
}




 ?>