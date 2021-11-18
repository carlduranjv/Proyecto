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
	$("#IdUnidad").val("");
	$("#CodUnidad").val("");
	$("#NombreUnidad").val("");
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
          	url: '../Ajax/unidadmedida.php?Operacion=listar',
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
          url: "../Ajax/unidadmedida.php?Operacion=guardaryeditar",
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

function mostrar(IdUnidad)
{
	$.post("../Ajax/unidadmedida.php?Operacion=mostrar", {IdUnidad : IdUnidad}, function (data, status)
{
     data = JSON.parse(data);
     mostrarform(true);
     $("#IdUnidad").val(data.IdUnidad);
     $("#CodUnidad").val(data.CodUnidad);
     $("#NombreUnidad").val(data.NombreUnidad);
  
}
);
}	

function activar (IdUnidad)
{
	bootbox.confirm("¿Estas Seguro de activar la Unidad de Medida?", function(result){
		if(result)
		{
			$.post("../Ajax/unidadmedida.php?Operacion=activar", {IdUnidad : IdUnidad}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

function desactivar (IdUnidad)
{
	bootbox.confirm("¿Estas Seguro de Desactivar la Unidad de Medida?", function(result){
		if(result)
		{
			$.post("../Ajax/unidadmedida.php?Operacion=desactivar", {IdUnidad : IdUnidad}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

init();
