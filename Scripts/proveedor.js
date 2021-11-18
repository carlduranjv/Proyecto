var tabla;

function init()
{
mostrarform(false);
listar();
$("#formulario").on("submit", function(e)
{
	guardaryeditar(e);
})
}

function mayus(m) {
    m.value = m.value.toUpperCase();
}

function limpiar ()
{
	$("#IdProveedor").val("");
	$("#Rif").val("");
	$("#RazonSocial").val("");
	$("#Direccion").val("");
	$("#Telefono").val("");
}

function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
	} 
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
	}
}

function cancelarform()
{
	limpiar();
	mostrarform(false);
}

function listar()
{

	tabla=$('#tblistado').dataTable(
	{

"aProcessing" : true,
"aServerSide" : true,
dom:'Bfrtip',
buttons: [
           'copyHtml5',
           'excelHtml5',
           'csvHtml5',
           'pdf'
          ],
          "ajax":
          {
          	url: '../Ajax/proveedor.php?Operacion=listar',
          	type: "get",
          	dataType: "json",
          	error: function(e)
          	{
              console.log(e.responseText);
          	}
          },
          "bDestroy":true,
          "iDisplayLength":5,
          "order": [[0, "asc"]]

	}).DataTable();
}

function guardaryeditar(e)
{
	e.preventDefault();
	$("#btnGuardar").prop("disabled", true);
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
          url: "../Ajax/proveedor.php?Operacion=guardaryeditar",
          type:"POST",
          data: formData,
          contentType: false,
          processData: false,

          success: function (datos)
          {
          	bootbox.alert(datos);
          	mostrarform(false);
          	tabla.ajax.reload();
          }
		});
	limpiar();
}

function mostrar(IdProveedor)
{
	$.post("../Ajax/proveedor.php?Operacion=mostrar", {IdProveedor : IdProveedor}, function (data, status)
{
     data = JSON.parse(data);
     mostrarform(true);
     $("#IdProveedor").val(data.IdProveedor);
     $("#Rif").val(data.Rif);
     $("#RazonSocial").val(data.RazonSocial);
     $("#Direccion").val(data.Direccion);
     $("#Telefono").val(data.Telefono);
}
);
}	

function activar (IdProveedor)
{
	bootbox.confirm("¿Estas Seguro de activar el proveedor?", function(result){
		if(result)
		{
			$.post("../Ajax/proveedor.php?Operacion=activar", {IdProveedor : IdProveedor}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

function desactivar (IdProveedor)
{
	bootbox.confirm("¿Estas Seguro de Desactivar el proveedor?", function(result){
		if(result)
		{
			$.post("../Ajax/proveedor.php?Operacion=desactivar", {IdProveedor : IdProveedor}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

init();
