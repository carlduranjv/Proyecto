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
	$("#IdTipoDocumento").val("");
	$("#NombreDocumento").val("");

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
          	url: '../Ajax/tipodocumento.php?Operacion=listar',
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
          url: "../Ajax/tipodocumento.php?Operacion=guardaryeditar",
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

function mostrar(IdTipoDocumento)
{
	$.post("../Ajax/tipodocumento.php?Operacion=mostrar", {IdTipoDocumento : IdTipoDocumento}, function (data, status)
{
     data = JSON.parse(data);
     mostrarform(true);
     $("#IdTipoDocumento").val(data.IdTipoDocumento);
     $("#NombreDocumento").val(data.NombreDocumento);
   
  
}
);
}	

function activar (IdTipoDocumento)
{
	bootbox.confirm("¿Estas Seguro de activar el Tipo de Documento?", function(result){
		if(result)
		{
			$.post("../Ajax/tipodocumento.php?Operacion=activar", {IdTipoDocumento : IdTipoDocumento}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

function desactivar (IdTipoDocumento)
{
	bootbox.confirm("¿Estas Seguro de Desactivar el Tipo de Documento?", function(result){
		if(result)
		{
			$.post("../Ajax/tipodocumento.php?Operacion=desactivar", {IdTipoDocumento : IdTipoDocumento}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

init();
