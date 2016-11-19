function Login() {

		//IMPLEMENTAR...
		var user = $("#email").val();
		var pass = $("#password").val();
		var Pagina = "./adminLogin.php";

		if((user.length == 0 || pass.length == 0))
    {
      alert("Campos incompletos");
    } else {
      $.ajax({
        type: 'POST',
        url: Pagina,
        dataType: 'text',
        data: {"correo" : user,
              "pass" : pass},
        async: true
        })
        .done(function (respuesta) {
          alert(respuesta);
          //return;
           if(respuesta != "1"){
              alert("No existe usuario");
           }
           else
           {
              window.location.href = "principal.php";
           }
       
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
        });
    }

		
}