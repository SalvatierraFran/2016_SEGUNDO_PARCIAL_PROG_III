<?php
//IMPLEMENTAR...
?>
<div id="divFrm" class="animated bounceInLeft" style="height:330px;overflow:auto;margin-top:0px;border-style:solid">
    <input type="hidden" id="hdnIdUsuario" value="<?php //IMPLEMENTAR... ?>" />
    <input type="text" placeholder="Nombre" id="txtNombre" value="<?php //IMPLEMENTAR... ?>" />
    <input type="text" placeholder="E-mail" id="txtEmail" value="<?php //IMPLEMENTAR... ?>" />
    <input type="password" placeholder="Password" id="txtPassword" value="" />

    <span>Perfil</span>
    <select id="cboPerfiles" >
        <?php 
		//IMPLEMENTAR...        
		?>	
    </select>
    <br/><br/>

    <input type="file" id="archivo" onchange="SubirFoto()" /> 

    <input type="button" class="MiBotonUTN" onclick="<?php //IMPLEMENTAR... ?>" value="<?php //IMPLEMENTAR... ?>"  />
    <input type="hidden" id="hdnQueHago" value="agregar" />
</div>
<div id="divFoto"  class="animated bounceInLeft" style="border-style:none" >
    <div style="width:25%;float:left"></div>
    <div style="width:75%;float:right">

        <img id="fotoTmp" src="./fotos/<?php //IMPLEMENTAR... ?>" style="float:left" class="fotoform" />

        <input type="hidden" id="hdnFotoSubir" value="<?php //IMPLEMENTAR... ?>" />

    </div>
</div>