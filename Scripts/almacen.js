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
	$("#IdAlmacen").val("");
	$("#CodAlmacen").val("");
	$("#NombreAlmacen").val("");
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
          	url: '../Ajax/almacen.php?Operacion=listar',
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
          url: "../Ajax/almacen.php?Operacion=guardaryeditar",
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

function mostrar(IdAlmacen)
{
	$.post("../Ajax/almacen.php?Operacion=mostrar", {IdAlmacen : IdAlmacen}, function (data, status)
{
     data = JSON.parse(data);
     mostrarform(true);
     $("#IdAlmacen").val(data.IdAlmacen);
     $("#CodAlmacen").val(data.CodAlmacen);
     $("#NombreAlmacen").val(data.NombreAlmacen);
  
}
);
}	

function activar (IdAlmacen)
{
	bootbox.confirm("¿Estas Seguro de activar el Almacen?", function(result){
		if(result)
		{
			$.post("../Ajax/almacen.php?Operacion=activar", {IdAlmacen : IdAlmacen}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

function desactivar (IdAlmacen)
{
	bootbox.confirm("¿Estas Seguro de Desactivar el Almacen?", function(result){
		if(result)
		{
			$.post("../Ajax/almacen.php?Operacion=desactivar", {IdAlmacen : IdAlmacen}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

init();
