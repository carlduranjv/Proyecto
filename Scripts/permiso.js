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
	$("#IdPermiso").val("");
	$("#NombrePermiso").val("");

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
          	url: '../Ajax/permiso.php?Operacion=listar',
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
          url: "../Ajax/permiso.php?Operacion=guardaryeditar",
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

function mostrar(IdPermiso)
{
	$.post("../Ajax/permiso.php?Operacion=mostrar", {IdPermiso : IdPermiso}, function (data, status)
{
     data = JSON.parse(data);
     mostrarform(true);
     $("#IdPermiso").val(data.IdPermiso);
     $("#NombrePermiso").val(data.NombrePermiso);
   
  
}
);
}	

function activar (IdPermiso)
{
	bootbox.confirm("¿Estas Seguro de activar el Permiso?", function(result){
		if(result)
		{
			$.post("../Ajax/permiso.php?Operacion=activar", {IdPermiso : IdPermiso}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

function desactivar (IdPermiso)
{
	bootbox.confirm("¿Estas Seguro de Desactivar el Permiso?", function(result){
		if(result)
		{
			$.post("../Ajax/permiso.php?Operacion=desactivar", {IdPermiso : IdPermiso}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

init();
