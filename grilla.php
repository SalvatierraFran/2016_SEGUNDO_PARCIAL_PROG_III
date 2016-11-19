<?php
require_once "verificar_sesion.php";
require_once "clases/AccesoDatos.php";
require_once "clases/Usuario.php";
?>
<div class="animated bounceInRight" style="height:460px;overflow:auto;border-style:solid" >
    <table class="table">
        <thead style="background:rgb(14, 26, 112);color:#fff;">
            <tr>
                <th> NOMBRE </th>
                <th> MAIL </th>
                <th> PERFIL </th>
                <th> FOTO </th>
                <th> ACCION </th>
            </tr> 
        </thead>   	
        <?php
		//IMPLEMENTAR...    
        $todosLosUsuarios = Usuario::TraerTodosLosUsuarios();
        $usuarioLogueado = json_decode($_SESSION["Usuario"]);

        foreach ($todosLosUsuarios as $users) {
                # code...
                echo "<tr>";
                echo "<td>" . $users->nombre . "</td>";
                echo "<td>" . $users->email . "</td>";
                echo "<td>" . $users->perfil . "</td>";
                echo "<td><img src = './fotos/" . $users->foto . "' width='80px' height='80px'/></td>";
                echo "<td>";

                if($usuarioLogueado->perfil == 'administrador' || $usuarioLogueado->perfil == 'usuario')
                {
                    echo "<input type = 'button' value = 'Modificar' id = 'btnModificar' onclick = 'CargarFormUsuario(1, " . $users->id . ")' style = 'color:black; width:100px'/>";
                }

                if($usuarioLogueado->perfil == 'administrador')
                {
                    echo "<br><input type = 'button value = 'Eliminar' id = 'btnEliminar' onclick = 'CargarFormUsuario(2, " . $users->id . ")' style = 'color:black; width:100px'/>";
                }
                echo "</td>";
                echo "</tr>";
            }    
		?>

    </table>
</div>	