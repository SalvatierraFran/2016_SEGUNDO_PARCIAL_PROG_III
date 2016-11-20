function Logout() {//#2

		//IMPLEMENTAR...
		var Pagina = "administracion.php";

		$.ajax({
			url : Pagina,
			type : "POST",
			dataType : "text",
			data : {"queMuestro" : "2"},
			async : true,
		})
		.done(function (resultado){
			if (resultado == "Exito") {
				window.location.href = 'login.php';
			} else {
				alert(resultado);
			}
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
			alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
		});
}
function MostrarGrilla() {//#3
		//IMPLEMENTAR...
		var Pagina = 'administracion.php';

		$.ajax({
			type : 'POST',
			url : Pagina,
			dataType : 'text',
			data : {"queMuestro" : "3"},
			async : true
		})
		.done(function (resultado){
			$("#divGrilla").html(resultado);
		})
		.fail(function (jqXHR, textStatus, errorThrown){
			alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
		});
}
function Home() {//#3-sin case
		//IMPLEMENTAR...
		window.location.href = "principal.php";
}
function CargarFormUsuario(op = 0, id = 0) {//#4
		//IMPLEMENTAR...
		var Pagina = "administracion.php";

		switch(op)
		{
			case 1:
				op = "Modificar";
				break;
			case 2:
				op = "Eliminar";
				break;
			case 3:
				op = "Editar";
				break;
			case 4:
				op = "Agregar";
				break;
		}

		$.ajax({
			url : Pagina,
			type : "POST",
			dataType : "text",
			data : {"queMuestro" : "4",
					"queHago" : op,
					"id" : parseInt(id)},
			async : true
		})
		.done(function (resultado){
			$("#divAbm").html(resultado);
		})
		.fail(function (jqXHR, textStatus, errorThrown){
			alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
		});
}
function SubirFoto() {//#5
		//IMPLEMENTAR...
}
function AgregarUsuario() {//#6
		//IMPLEMENTAR...
		
}
function EditarUsuario(obj) {//#7 sin case
		//IMPLEMENTAR...
}
function EliminarUsuario() {//#7
		//IMPLEMENTAR...
}
function ModificarUsuario() {//#8
		//IMPLEMENTAR...
		var user = $("#txtNombre").val();
		var correo = $("#txtEmail").val();
		var Pagina = "administracion.php";

		if(user.length == 0 || correo.length == 0)
		{
			alert("Campos incompletos");
		}

		var obj = {"id" : $("#hdnIdUsuario").val(),
							  "nombre" : user,
							  "email" : correo,
							  "perfil" : $("#cboPerfiles").val(),
							  "foto" : $("#hdnFotoSubir").val()};

		$.ajax({
			url : Pagina,
			type : "POST",
			dataType : "JSON",
			data : {"modificacion" : JSON.stringify(obj),
					"queMuestro" : "8",
					"foto" : $("#fotoTmp").attr("src")},
			async : true
		})
		.done(function (resultado){
			alert(resultado.message);
			if(resultado.Success){
				if(resultado.usuarioMod){
					$("#spanDatos").children("h3").html(resultado.userNombreLog + " - " + resultado.usuarioEnSesionPerfil);
                	$("#spanFoto").children("img").attr("src", resultado.userLogFoto);
                	if(resultado.userLogPerfil != "administrador")
                	{
                		$('.btn.btn-info.animated.bounceInLeft').hide();
                		if(resultado.usuarioLogPerfil != "usuario"){
                			$(".btn.btn-primary.animated.bounceInLeft").hide();
                		}
                	}
                }
                if($("#divGrilla").html().length > 14){
                	MostrarGrilla();
                }
			}
		})
}
function ElegirTheme() {//#9
		//IMPLEMENTAR...
		var Pagina = "administracion.php";

		$.ajax({
			url : Pagina,
			type : "POST",
			dataType : "text",
			data : {"queMuestro" : "9"},
			async : true
		})
		.done(function (resultado){
			$("#divGrilla").html(resultado);
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
			alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
		});
}
function AplicarTheme(radio) {//sin case
		//IMPLEMENTAR...
		var colorElegido = $("#" + radio).val();
		$("#miBody").css("background-color", colorElegido);
}
function GuardarTheme() {//#10
		//IMPLEMENTAR...
		var colorElegido = $("#miBody").css("background-color");
		var Pagina = "administracion.php";

		$.ajax({
			url : Pagina,
			type : "POST",
			dataType : "JSON",
			data : {"queMuestro" : "10",
					"colorElegido" : colorElegido},
			async : true
		})
		.done(function (resultado){
			alert(resultado.message);

			if(resultado.Success){
				$("#divGrilla").html("");
			}
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
			alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
		});
}