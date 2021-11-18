<?php 
require "../Config/Conexion.php";

class Grupo
{
	
	public function __construct()
	{
		
	}
	
	public function insertar ($CodGrupo,$NombreGrupo)
	{
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
		$sql="INSERT INTO grupo (CodGrupo, NombreGrupo, Condicion, FechaRegistro, FechaModificacion) VALUES ('$CodGrupo','$NombreGrupo','1', '$FechaRegistro', '$FechaRegistro')";
		return ejecutarConsulta($sql);
	}

	public function editar ($IdGrupo,$CodGrupo, $NombreGrupo){
         date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
        $sql= "UPDATE grupo SET CodGrupo='$CodGrupo', 
                            NombreGrupo= '$NombreGrupo',
                            FechaModificacion= '$FechaRegistro' WHERE IdGrupo='$IdGrupo'";
      return ejecutarConsulta($sql);
	}

    public function activar ($IdGrupo)
    {
        $sql= "UPDATE grupo SET Condicion='1' WHERE IdGrupo='$IdGrupo'";
        return ejecutarConsulta($sql);
    }

     public function desactivar ($IdGrupo)
    {
        $sql= "UPDATE grupo SET Condicion='0' WHERE IdGrupo='$IdGrupo'";
        return ejecutarConsulta($sql);
    }

    public function mostrar ($IdGrupo)
    {
        $sql= "SELECT * FROM grupo WHERE IdGrupo = $IdGrupo";
        return ejecutarConsultaSimpleFila($sql);
    }

     public function listar ()
    {
        $sql= "SELECT * FROM grupo";
        return ejecutarConsulta($sql);
    }
}




 ?>