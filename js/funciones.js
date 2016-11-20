function Logout() {//#2

		//IMPLEMENTAR...

		var Pagina = 'administracion.php';

		$.ajax({
			url : Pagina,
			type : 'POST',
			dataType : 'text',
			data : {queMuestro : "2"},
			async : true,
		})
		.done(function (resultado){

			if (resultado == "chau") {
				location.href = 'login.php';
			} else {
				alert("resultado");
			}
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
			alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
		})

}
function MostrarGrilla() {//#3
		//IMPLEMENTAR...
		var Pagina = 'administracion.php';

		$.ajax({
			url : Pagina,
			type : 'POST',
			dataType : 'text',
			data : {queMuestro : "3"},
			async : 3,
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
		window.location.href = 'principal.php';
}
function CargarFormUsuario(opcion, id) {//#4
		//IMPLEMENTAR...
		var Pagina = 'administracion.php';

		switch(opcion){
			case 1: 
				queHago = 'Modificar';
				break;
			case 2:
				queHago = 'Eliminar';
				break;
			case 3:
				queHago = 'Editar';
				break;
			case 4:
				queHago = 'Agregar';
				break;
		}

		$.ajax({
			url : Pagina,
			type : 'POST',
			dataType : 'text',
			data : {queMuestro : "4",
					queHago : queHago,
					id : parseInt(id)},
			async : true,
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
		var nombre = $("#txtNombre").val();
		var email = $("#txtEmail").val();
		var pass = $("#txtPassword").val();
		var Pagina = 'administracion.php';
		var unaFoto = $("#fotoTmp").attr("src");

		if(!Validar(nombre, email, pass))
		{
			alert("Campos incompletos");
			return;
		}

		var newUsuario = {"id" : $("#hdnIdUsuario").val(),
						  "nombre" : nombre,
						  "email" : email,
						  "perfil" : $("#cboPerfiles").val(),
						  "password" : password,
						  "foto" : $("#hdnFotoSubir").val()};

		$.ajax({
			url : Pagina,
			type : 'POST',
			dataType : 'JSON',
			data : {'queMuestro' : '6',
					'newUsuario' : newUsuario,
					'foto' : unaFoto},
			processData : false,
			contentType : false,
			async : true,
		})
		.done(function (resultado){
			alert(resultado.mensaje);
			if(resultado.exito){
				$("#divAbm").html("");

				if($("#divGrilla").html().length > 14)
					MostrarGrilla();
			}
		})
		.fail(function (jqHXR, textStatus, errorThrown){
			alert(jqHXR.responseText + "\n" + textStatus + "\n" + errorThrown);
		})
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
			url : "administracion.php";
			type : 'POST',
			dataType : 'json',
			data : {"queMuestro" : "8",
					"modificacion" : JSON.stringify(obj),
					"foto" : $("#fotoTmp").attr("src")}
			async : true,
		})
		.done(function (resultado){
			
		})
}
function ElegirTheme() {//#9
		//IMPLEMENTAR...
}
function AplicarTheme(radio) {//sin case
		//IMPLEMENTAR...
}
function GuardarTheme() {//#10
		//IMPLEMENTAR...
}

function Validar(name, email, pass = 0)
{
	if(name.length == 0 || email.length == 0 || (pass !== 0 && pass.length < 6))
	{
		return false;
	}
	return true;
}