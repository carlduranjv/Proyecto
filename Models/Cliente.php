<?php 
require "../Config/Conexion.php";

class Cliente
{
	
	public function __construct()
	{
		
	}
	
	public function insertar ($Rif,$RazonSocial,$Direccion,$Telefono)
	{
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
		$sql="INSERT INTO cliente (Rif, RazonSocial, Direccion, Telefono, Condicion, FechaRegistro, FechaModificacion) VALUES ('$Rif','$RazonSocial', '$Direccion','Telefono', '1', '$FechaRegistro', '$FechaRegistro')";
		return ejecutarConsulta($sql);
	}

	public function editar ($IdCliente,$Rif,$RazonSocial,$Direccion,$Telefono){
         date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
        $sql= "UPDATE cliente SET Rif='$Rif', 
                            RazonSocial= '$RazonSocial',
                            Direccion= '$Direccion',
                            Telefono= '$Telefono',
                            FechaModificacion= '$FechaRegistro' WHERE IdCliente='$IdCliente'";
      return ejecutarConsulta($sql);
	}

    public function activar ($IdCliente)
    {
        $sql= "UPDATE cliente SET Condicion='1' WHERE IdCliente='$IdCliente'";
        return ejecutarConsulta($sql);
    }

     public function desactivar ($IdCliente)
    {
        $sql= "UPDATE cliente SET Condicion='0' WHERE IdCliente='$IdCliente'";
        return ejecutarConsulta($sql);
    }

    public function mostrar ($IdCliente)
    {
        $sql= "SELECT * FROM cliente WHERE IdCliente = $IdCliente";
        return ejecutarConsultaSimpleFila($sql);
    }

     public function listar ()
    {
        $sql= "SELECT * FROM cliente";
        return ejecutarConsulta($sql);
    }
}




 ?>