<?php
    
    $usu = @$_SESSION['usuario'];
    require('Model/conexion.php');
    $dato = mysql_fetch_array(mysql_query("SELECT usu_nombre, usu_mail, usu_fono, usu_pass FROM usuario WHERE usu_mail = '$usu'"));
?>
<article id="texto">
        <h3 class="h1">Modifica tus datos</h3>
        
        <div class="form">
            <label for="name"><span>Nombre</span>
                <input type="text" class="inputs" id="mod_name" value="<?php echo $dato['usu_nombre'];?>" />
            </label>
            
            <label for="email"><span>Teléfono</span>
                <input type="text" class="inputs" id="mod_phone" value="<?php echo $dato['usu_fono'];?>" />
            </label>

            <label for="phone"><span>Password</span>
                <input type="password" class="inputs" id="mod_pass" value="<?php echo $dato['usu_pass'];?>"/>
            </label>

            

            <label><span>&nbsp;</span>
                <button onclick="modifica_datos()" class="btn" id="con_submit">Modificar</button>
            </label>
        
            </article><?php if(!isset($_SESSION['usuario'])){echo '<script>location.href="inicio-sesion.php"</script>';}?>