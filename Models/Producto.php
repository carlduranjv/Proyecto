<?php 
require "../Config/Conexion.php";

class Producto
{
	
	public function __construct()
	{
		
	}
	
	public function insertar ($IdCategoria,$IdSubCategoria,$IdGrupo,$IdUnidad,$IdCategoriaImpuesto,$CodProducto,$Descripcion,$CostoUnitario)
	{
        date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
		$sql="INSERT INTO producto (IdCategoria, IdSubCategoria, IdGrupo, IdUnidad, IdCategoriaImpuesto, CodProducto, Descripcion, CostoUnitario, Condicion, FechaRegistro, FechaModificacion)
        VALUES ('$IdCategoria', '$IdSubCategoria', '$IdGrupo', '$IdUnidad', '$IdCategoriaImpuesto', '$CodProducto', '$Descripcion', '$CostoUnitario', '$Condicion', '$FechaRegistro', '$FechaModificacion')";

		return ejecutarConsulta($sql);
	}

	public function editar ($IdProducto,$IdCategoria,$IdSubCategoria,$IdGrupo,$IdUnidad,$IdCategoriaImpuesto,$CodProducto,$Descripcion,$CostoUnitario){
         date_default_timezone_set('America/Caracas');
        $FechaRegistro = date('Y-m-d H:i:s');
        $sql= "UPDATE producto SET IdCategoria='$IdCategoria', 
                            IdSubCategoria= '$IdSubCategoria',
                            IdGrupo= '$IdGrupo',
                            IdUnidad='$IdUnidad', 
                            IdCategoriaImpuesto= '$IdCategoriaImpuesto',
                            CodProducto='$CodProducto', 
                            Descripcion= '$Descripcion',
                            CostoUnitario='$CostoUnitario' WHERE IdProducto='$IdProducto'";
      return ejecutarConsulta($sql);
	}

    public function activar ($IdProducto)
    {
        $sql= "UPDATE producto SET Condicion='1' WHERE IdProducto='$IdProducto'";
        return ejecutarConsulta($sql);
    }

     public function desactivar ($IdProducto)
    {
        $sql= "UPDATE producto SET Condicion='0' WHERE IdProducto='$IdProducto'";
        return ejecutarConsulta($sql);
    }

    public function mostrar ($IdProducto)
    {
        $sql= "SELECT * FROM producto WHERE IdProducto = '$IdProducto'";
        return ejecutarConsultaSimpleFila($sql);
    }

     public function listar ()
    {
        $sql= "SELECT p.IdProducto,p.IdCategoria,c.NombreCategoria,p.IdSubCategoria,sc.NombreSubCategoria,p.IdGrupo,g.CodGrupo,g.NombreGrupo, p.IdUnidad, u.CodUnidad,u.NombreUnidad,p.IdCategoriaImpuesto, ci.NombreCategoriaImpuesto, p.CodProducto,p.Descripcion,p.CostoUnitario, p.Condicion, p.FechaRegistro, p.FechaModificacion FROM producto p INNER JOIN categoria c ON p.IdCategoria= c.IdCategoria
INNER JOIN subcategoria sc ON p.IdSubCategoria=sc.IdSubCategoria
INNER JOIN grupo g ON p.IdGrupo=g.IdGrupo
INNER JOIN unidad u ON p.IdUnidad=u.IdUnidad
INNER JOIN categoriaimpuesto ci ON p.IdCategoriaImpuesto= ci.IdCategoriaImpuesto";
        return ejecutarConsulta($sql);
    }
}




 ?>