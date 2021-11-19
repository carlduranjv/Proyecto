<?php 
require "../Config/Conexion.php";

class Proveedor
{
	
	public function __construct()
	{
		
	}
	
	public function insertar ($Rif,$RazonSocial,$Direccion,$Telefono)
	{
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
		$sql="INSERT INTO proveedor (Rif, RazonSocial, Direccion, Telefono, Condicion, FechaRegistro, FechaModificacion) VALUES ('$Rif','$RazonSocial', '$Direccion','$Telefono', '1', '$FechaRegistro', '$FechaRegistro')";
		return ejecutarConsulta($sql);
	}

	public function editar ($IdProveedor,$Rif,$RazonSocial,$Direccion,$Telefono){
         date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
        $sql= "UPDATE proveedor SET Rif='$Rif', 
                            RazonSocial= '$RazonSocial',
                            Direccion= '$Direccion',
                            Telefono= '$Telefono',
                            FechaModificacion= '$FechaRegistro' WHERE IdProveedor='$IdProveedor'";
      return ejecutarConsulta($sql);
	}

    public function activar ($IdProveedor)
    {
        $sql= "UPDATE proveedor SET Condicion='1' WHERE IdProveedor='$IdProveedor'";
        return ejecutarConsulta($sql);
    }

     public function desactivar ($IdProveedor)
    {
        $sql= "UPDATE proveedor SET Condicion='0' WHERE IdProveedor='$IdProveedor'";
        return ejecutarConsulta($sql);
    }

    public function mostrar ($IdProveedor)
    {
        $sql= "SELECT * FROM proveedor WHERE IdProveedor = $IdProveedor";
        return ejecutarConsultaSimpleFila($sql);
    }

     public function listar ()
    {
        $sql= "SELECT * FROM proveedor";
        return ejecutarConsulta($sql);
    }
}




 ?>