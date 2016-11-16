function Login() {

		//IMPLEMENTAR...
		var user = $("#email").val();
		var pass = $("#password").val();
		var Pagina = "./adminLogin.php";

		var campos = {"correo" : user, "pass" : pass};

		$.ajax({
        type: 'POST',
        url: Pagina,
        dataType: "json",
        data: {"userpass" : campos},
        async: true
        })
        .done(function (respuesta) {

           if (respuesta.Logueado) {

           		window.location.href="principal.php?userlog=" + respuesta.idUser;
           }
           else
           {
           		alert("Error! Email y/o Contraseña incorrectos");
           }
       
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
}