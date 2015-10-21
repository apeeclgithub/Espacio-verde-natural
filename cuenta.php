<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="es">
<head>

    <title>Mi Cuenta - Espacio Verde Natural</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="View/img/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="View/css/style.css" rel="stylesheet" type="text/css" /> 
    <link href="View/css/alertify.core.css" rel="stylesheet" type="text/css" />
    <link href="View/css/alertify.bootstrap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="View/css/component.css" />

    <script src="View/js/jquery_1.9.1.js"></script>
    <script src="View/js/script.js"></script>
    <script src="View/js/jquery.slides.min.js"></script>
    <script src="View/js/alertify.min.js"></script>

</head>
<body>

    <header>

        <?php require('header.php');?>
        
        <div id="carro">
            <?php require('detalle-carro.php');?>
        </div>
    </header>
    
    <?php 
    if(@$_SESSION['usuario']){?>
    
    <section class="cuenta">
        
        <h3 class="h1">Mi cuenta</h3>
        
        <div class="micuenta">
            <?php 
            require('Model/conexion.php');
            $datos = mysql_fetch_array(mysql_query("SELECT * FROM usuario WHERE usu_mail = '".$_SESSION['usuario']."'"));?>
        
            <h3>Bienvenido <?php echo $datos[1]?></h3>
            
            <?php
            $pend = mysql_num_rows(mysql_query("SELECT * FROM pedido WHERE usu_id = $datos[0] AND ped_estado = 'pendiente'"));?>
            
            <p>Actualmente tienes <?php echo $pend?> compras pendientes por aprobar.</p>
            
        </div>
        
        <div class="historial">
            
            <div>Tu historial de compras</div>
            <div>
                <?php
                    $query = mysql_query("SELECT ped_id, ped_valor, ped_estado FROM pedido INNER JOIN usuario ON pedido.usu_id = usuario.usu_id WHERE usuario.usu_mail = '".$_SESSION["usuario"]."'");
                    $dato = mysql_fetch_array($query);
                    if(empty($dato)){
                        ?><div class="tabla_histo">No tiene historial de compras.</div><?php
                    }else{
                        do{
                            ?><div class="tabla_histo"><?php echo "<sup>Pedido n°:".$dato['ped_id']."</sup> <span class='h1'>$".number_format($dato['ped_valor'],0,',','.')."</span> <sub>Estado: ".$dato['ped_estado']."</sub><button class='md-trigger' data-modal='modal-".$dato['ped_id']."' class='ver_det'>Ver Detalle</button>"; ?></div><?php
                            
                        $sql2 = "SELECT pro_nombre, det_cantidad, pro_valor FROM detalle INNER JOIN producto ON detalle.pro_id = producto.pro_id WHERE ped_id = ".$dato['ped_id'];
                        $con2 = mysql_query($sql2);
                        $dato2 = mysql_fetch_array($con2);
                        ?>
                        
                        <div class="md-modal md-effect-1" id="modal-<?php echo $dato['ped_id']; ?>">
                            <div class="md-content">
                                <h3><?php echo 'Detalle Pedido N°'.$dato['ped_id']; ?></h3>
                                <div><?php
                                do {
                                    
echo "<p>".$dato2['det_cantidad']."x <span class='h1'>".$dato2['pro_nombre']."</span><span class='fiin'>$".number_format($dato2['pro_valor'],0,',','.')."</span></p>";
                        
                                } while ($dato2 = mysql_fetch_array($con2));
                                ?>
                                    <button class="md-close">Cerrar</button>
                                </div>
                            </div>
                        </div>
                
                            <?php
                            
                        }while($dato = mysql_fetch_array($query));
                        
                    }
                
                ?>
            </div>
            
            
            
        </div>
        <div class="controls">
            <button onclick="location.href='Model/salir.php'">Cerrar sesión</button>
            <button onclick="location.href='modifica.php'">Modifica tus datos</button>
        </div>
        </section>
        
    <?php }else{ ?>
        
        <script>location.href='inicio-sesion.php'</script>
    
    <?php } ?>
    
    
    <?php require('footer.php');?>
    <?php if(!isset($_SESSION['usuario'])){echo '<script>location.href="inicio-sesion.php"</script>';}?>
<script src="View/js/classie.js"></script>
<script src="View/js/modalEffects.js"></script>
</body>
</html>