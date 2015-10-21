<?php session_start(); ?> 
<link href="View/css/style.css" rel="stylesheet" type="text/css" />
<meta charset="utf-8">
<div class="datos">
<?php //session_start(); 
if(@$_SESSION['usuario']){
    require('Model/conexion.php');
    $datos = mysql_fetch_array(mysql_query("SELECT * FROM usuario WHERE usu_mail = '".$_SESSION['usuario']."'"));?>
    
    <h3 class="h1">Bienvenido: <?php echo $datos[1]?><span id="cierra"><button onclick="location.href='Model/salir.php'" class="btn btn-danger">Cerrar sesión</button></span></h3>
    <br><button class="modi" onclick="location.href='modifica.php'">Modifica tus datos</button>
    <h3>Tus datos personales:</h3>
    <div class="cont_dato">
        <div class="cel_dato">Email:</div>
        <div class="cel_dato"><?php echo $datos[3]?></div>
        <div class="cel_dato">Teléfono:</div>
        <div class="cel_dato"><?php echo $datos[2]?></div>
        <div class="cel_dato">Fecha nacimiento:</div>
        <div class="cel_dato"><?php echo $datos[4]?></div>
        
    </div>
    
    
    <h3>Datos de entrega:</h3>
    
    <?php
        $dire = mysql_num_rows(mysql_query("SELECT * FROM direccion WHERE usu_id = $datos[0]"));
        $resu = mysql_fetch_array(mysql_query("SELECT * FROM direccion WHERE usu_id = $datos[0]"));
        if($dire > 0){?>
            <div class="cont_dato">
                <div class="cel_dato">Dirección:</div>
                <div class="cel_dato"><?php echo $resu[2]?></div>
                <div class="cel_dato">Comuna:</div>
                <div class="cel_dato"><?php echo $resu[3]?></div>
                
            </div>
    <h3 class="msh btn btn-danger succ" onclick="location.href='comprar.php'">COMPRAR</h3>
        <?php }else{?>
    
            <h3 onclick="location.href='modifica.php'" class="msh btn btn-danger">Debes ingresar una dirección para realizar la entrega.</h3>
            
        <?php }?>
    
    
<?php }else{?>
    
    <div class="error">
        <h3 class="h1">Para continuar...</h3>
        <button onclick="location.href='registro.php'">Registro</button>
        <button onclick="location.href='inicio-sesion.php'">Iniciar sesión</button>
    </div>
    
<?php }?>
</div>