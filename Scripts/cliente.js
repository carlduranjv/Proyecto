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
	$("#IdCliente").val("");
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
          	url: '../Ajax/cliente.php?Operacion=listar',
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
          url: "../Ajax/cliente.php?Operacion=guardaryeditar",
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

function mostrar(IdCliente)
{
	$.post("../Ajax/cliente.php?Operacion=mostrar", {IdCliente : IdCliente}, function (data, status)
{
     data = JSON.parse(data);
     mostrarform(true);
     $("#IdCliente").val(data.IdCliente);
     $("#Rif").val(data.Rif);
     $("#RazonSocial").val(data.RazonSocial);
     $("#Direccion").val(data.Direccion);
     $("#Telefono").val(data.Telefono);
}
);
}	

function activar (IdCliente)
{
	bootbox.confirm("¿Estas Seguro de activar el Cliente?", function(result){
		if(result)
		{
			$.post("../Ajax/cliente.php?Operacion=activar", {IdCliente : IdCliente}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

function desactivar (IdCliente)
{
	bootbox.confirm("¿Estas Seguro de Desactivar el Cliente?", function(result){
		if(result)
		{
			$.post("../Ajax/cliente.php?Operacion=desactivar", {IdCliente : IdCliente}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

init();
