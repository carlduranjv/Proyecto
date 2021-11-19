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
	$("#IdCategoria").val("");
	$("#CodCategoria").val("");
	$("#NombreCategoria").val("");
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
          	url: '../Ajax/categoria.php?Operacion=listar',
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
          url: "../Ajax/categoria.php?Operacion=guardaryeditar",
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

function mostrar(IdCategoria)
{
	$.post("../Ajax/categoria.php?Operacion=mostrar", {IdCategoria : IdCategoria}, function (data, status)
{
     data = JSON.parse(data);
     mostrarform(true);
     $("#IdCategoria").val(data.IdCategoria);
     $("#CodCategoria").val(data.CodCategoria);
     $("#NombreCategoria").val(data.NombreCategoria);
  
}
);
}	

function activar (IdCategoria)
{
	bootbox.confirm("¿Estas Seguro de activar la Categoria?", function(result){
		if(result)
		{
			$.post("../Ajax/categoria.php?Operacion=activar", {IdCategoria : IdCategoria}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

function desactivar (IdCategoria)
{
	bootbox.confirm("¿Estas Seguro de Desactivar la Categoria?", function(result){
		if(result)
		{
			$.post("../Ajax/categoria.php?Operacion=desactivar", {IdCategoria : IdCategoria}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

init();
