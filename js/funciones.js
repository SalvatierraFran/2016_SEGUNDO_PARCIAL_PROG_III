function Logout() {//#2

		//IMPLEMENTAR...

		var Pagina = './administracion.php';

		$.ajax({
			url : Pagina,
			type : 'POST',
			dataType : 'text',
			data : {queMuestro : "2"},
			async : true,
		})
		.done(function (resultado){

			if (resultado == "1") {
				location.href = './login.php';
			}

		})
		.fail(function (resultado){
			alert("Error");
		})

}
function MostrarGrilla() {//#3
		//IMPLEMENTAR...
}
function Home() {//#3-sin case
		//IMPLEMENTAR...
}
function CargarFormUsuario() {//#4
		//IMPLEMENTAR...
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