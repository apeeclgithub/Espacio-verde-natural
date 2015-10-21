<article id="texto">
    <?php
    
    $usuario = @$_SESSION['usuario'];
    require('Model/conexion.php');
    $datos = mysql_fetch_array(mysql_query("SELECT dir_direccion, dir_comuna FROM direccion INNER JOIN usuario ON direccion.usu_id = usuario.usu_id WHERE usuario.usu_mail = '$usuario'"));
?>
        
        <h3 class="h1">Modifica tu dirección</h3>
        
        <div class="form">
            <label for="name"><span>Dirección</span>
                <input type="text" class="inputs" id="mod_direccion" value="<?php echo $datos['dir_direccion'];?>" />
            </label>

            
            <label for="email"><span>Comuna</span>
                
                <input type="text" class="inputs" id="mod_comuna" value="<?php echo $datos['dir_comuna'];?>" />
            </label>

            

            <label><span>&nbsp;</span>
                <button onclick="modifica_direc()" class="btn" id="con_submit">Modificar</button>
            </label>
        </div> 
                
</article>
<?php if(!isset($_SESSION['usuario'])){echo '<script>location.href="inicio-sesion.php"</script>';}?>