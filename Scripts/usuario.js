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
	$("#IdUsuario").val("");
	$("#Nombre").val("");
	$("#Apellido").val("");
	$("#Correo").val("");
	$("#Cargo").val("");
	$("#Telefono").val("");
	$("#Login").val("");
	$("#Password").val("");
	$("#Imagen").val("");
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
          	url: '../Ajax/usuario.php?Operacion=listar',
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
          url: "../Ajax/usuario.php?Operacion=guardaryeditar",
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

function mostrar(IdUsuario)
{
	$.post("../Ajax/usuario.php?Operacion=mostrar", {IdUsuario : IdUsuario}, function (data, status)
{
     data = JSON.parse(data);
     mostrarform(true);
     $("#IdUsuario").val(data.IdUsuario);
     $("#Nombre").val(data.Nombre);
     $("#Apellido").val(data.Apellido);
     $("#Correo").val(data.Correo);
     $("#Cargo").val(data.Cargo);
     $("#Telefono").val(data.Telefono);
     $("#Login").val(data.Login);
     $("#Password").val(data.Password);
     $("#Imagen").val(data.Imagen);
}
);
}	

function activar (IdUsuario)
{
	bootbox.confirm("??Estas Seguro de activar el usuario?", function(result){
		if(result)
		{
			$.post("../Ajax/usuario.php?Operacion=activar", {IdUsuario : IdUsuario}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

function desactivar (IdUsuario)
{
	bootbox.confirm("??Estas Seguro de Desactivar el Usuario?", function(result){
		if(result)
		{
			$.post("../Ajax/usuario.php?Operacion=desactivar", {IdUsuario : IdUsuario}, function (e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});

		}
	})
}

init();
