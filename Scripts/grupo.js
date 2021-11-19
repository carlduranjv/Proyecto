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
	$("#IdGrupo").val("");
	$("#CodGrupo").val("");
	$("#NombreGrupo").val("");
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
          	url: '../Ajax/grupo.php?Operacion=listar',
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
          url: "../Ajax/grupo.php?Operacion=guardaryeditar",
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

function mostrar(IdGrupo)
{
	$.post("../Ajax/grupo.php?Operacion=mostrar", {IdGrupo : IdGrupo}, function (data, status)
{
     data = JSON.parse(data);
     mostrarform(true);
     $("#IdGrupo").val(data.IdGrupo);
     $("#CodGrupo").val(data.CodGrupo);
     $("#NombreGrupo").val(data.NombreGrupo);
  
}
);
}	

function activar (IdGrupo)
{
	bootbox.confirm("¿Estas Seguro de activar el Grupo?", function(result){
		if(result)
		{
			$.post("../Ajax/grupo.php?Operacion=activar", {IdGrupo : IdGrupo}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

function desactivar (IdGrupo)
{
	bootbox.confirm("¿Estas Seguro de Desactivar el Grupo?", function(result){
		if(result)
		{
			$.post("../Ajax/grupo.php?Operacion=desactivar", {IdGrupo : IdGrupo}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

init();
