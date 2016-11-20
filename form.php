<?php
require_once 'clases/Usuario.php';
//IMPLEMENTAR...
    if(!isset($_POST["registrar"])){
        require_once 'verificar_sesion.php';
        $usuarioLogueado = json_decode($_SESSION["Usuario"]);
    }
    if(isset($_POST["id"])){
        if($_POST["id"] != 0){
            $unUser = new Usuario($_POST["id"]);
        } else{
            $todosLosUsuarios = Usuario::TraerTodosLosUsuarios();
            $unUser = new Usuario();
            $unUser->id = $todosLosUsuarios[count($todosLosUsuarios) - 1]->id + 1;
            $unUser->nombre = '';
            $unUser->email = '';
            $unUser->perfil = (isset($_POST["registrar"]))? 'invitado' : 'usuario';
            $unUser->password = '';
            $unUser->foto = 'pordefecto.jpg';
        }
    } else {
        header("location:principal.php");
    }
?>
<div id="divFrm" class="animated bounceInLeft" style="height:330px;overflow:auto;margin-top:0px;border-style:solid">
    
    <input type="hidden" id="hdnIdUsuario" value="<?php /*IMPLEMENTAR...*/ echo $unUser->id; ?>" />
    
    <input type="text" placeholder="Nombre" id="txtNombre" value="<?php /*IMPLEMENTAR...*/ echo $unUser->nombre; ?>" 
        <?php
            if($_POST["queHago"] == 'Eliminar') echo 'readonly';
        ?> />
   
    <input type="text" placeholder="E-mail" id="txtEmail" value="<?php echo $unUser->email;  /*IMPLEMENTAR...*/ ?>" 
    <?php
        if($_POST["queHago"] == 'Eliminar') echo 'readonly'; 
    ?>/>
   
    <input type="password" placeholder="Password" id="txtPassword" value="" 
    <?php
        if($_POST["queHago"] != 'Agregar') echo 'readonly';
    ?>/>

    <span>Perfil</span>
    <select id="cboPerfiles"
        <?php 
		//IMPLEMENTAR...   
        if(isset($_POST["registrar"]) || ($_POST["queHago"] == "Eliminar" || $usuarioLogueado->perfil != "administrador")){
            echo "disabled";
        }
        ?>>     
        <?php
        $perfiles = Usuario::TraerTodosLosPerfiles();
        foreach ($perfiles as $value) {
            # code...
            echo "<option value = '" . $value . "'";
            if ($unUser->perfil === $value) {
                # code...
                echo " selected";
            }
            echo ">" . $value . "</option>";
        }
		?>


    </select>
    <br/><br/>

    <input type="file" id="archivo" onchange="SubirFoto()" 
    <?php
        if($_POST["queHago"] == 'Eliminar') echo 'disabled';
    ?>/> 

    <input type="button" class="MiBotonUTN" onclick="<?php echo ($_POST["queHago"] != 'Editar') ? ($_POST["queHago"] . 'Usuario()') : 'ModificarUsuario()'; //IMPLEMENTAR... ?>" value="<?php if(isset($_POST["registrar"])) echo "Registrarse"; else if($_POST["queHago"] == 'Agregar') echo "Guardar"; else echo $_POST["queHago"]; //IMPLEMENTAR... ?>"  />
    <input type="hidden" id="hdnQueHago" value="agregar" />
</div>
<div id="divFoto"  class="animated bounceInLeft" style="border-style:none" >
    <div style="width:25%;float:left"></div>
    <div style="width:75%;float:right">

        <img id="fotoTmp" src="./fotos/<?php echo $unUser->foto; //IMPLEMENTAR... ?>" style="float:left" class="fotoform" />

        <input type="hidden" id="hdnFotoSubir" value="<?php echo $unUser->foto; //IMPLEMENTAR... ?>" />

    </div>
</div>