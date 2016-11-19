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
}
function Home() {//#3-sin case
		//IMPLEMENTAR...
		window.location.href = 'principal.php';
}
function CargarFormUsuario() {//#4
		//IMPLEMENTAR...
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