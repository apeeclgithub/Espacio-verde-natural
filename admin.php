<?php
session_start();
if($_SESSION['usuario'] != 'Administrador'){
    echo '<script>location.href="index.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <title>Administrador - Espacio Verde Natural</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="View/img/favicon.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="View/css/component.css" />
    <link href="View/css/style.css" rel="stylesheet" type="text/css" /> 
    <link href="View/css/alertify.core.css" rel="stylesheet" type="text/css" />
    <link href="View/css/alertify.bootstrap.css" rel="stylesheet" type="text/css" />
    

    <script src="View/js/jquery_1.9.1.js"></script>
    <script src="View/js/script.js"></script>
    <script src="View/js/jquery.slides.min.js"></script>
    <script src="View/js/alertify.min.js"></script>

</head> 
<body> 

    <header>

        <?php require('header.php');?>

    </header>
    
    <section>
        
        <article id="texto">
        
            <h3 class="h1">Administrador WEB</h3>
            
            
            <div class="historial">
            
            <div>Pedidos pendientes</div>
            <div>
                <?php
                    require ('Model/conexion.php');
                    $query = mysql_query("SELECT ped_id, usu_nombre, ped_valor, ped_fecha FROM pedido INNER JOIN usuario ON pedido.usu_id = usuario.usu_id WHERE ped_estado = 'pendiente'");
                    $dato = mysql_fetch_array($query);
                  
                    if(empty($dato)){
                        ?><div class="tabla_histo">No hay pedidos aún.</div><?php
                    }else{
                        do{
                            ?><div class="tabla_histo"><?php echo "<sup>Pedido n°:".$dato['ped_id']."</sup> <span class='h1'>$".number_format($dato['ped_valor'],0,',','.')."</span> <sub>Usuario: ".$dato['usu_nombre']."</sub><button class='md-trigger' data-modal='modal-".$dato['ped_id']."' class='ver_det'>Ver Detalle</button>"; ?></div><?php
                            
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
                                    <div class="resp">
                                    <button onclick="location.href='Controller/aprobar.php?id=<?php echo $dato['ped_id'];?>'" class="acp">Aprobar</button>
                                    <button onclick="location.href='Controller/rechazar.php?id=<?php echo $dato['ped_id'];?>'" class="acp btn-danger">Rechazar</button>
                                    </div>
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
            
        <div class="historial">
            <div>Manejador de productos</div>
            <div class="tabla_histo">Crear nuevo producto. <button onclick="location.href='crud.php?crud=1'">Nuevo producto</button></div>
            <div class="tabla_histo">
                
                Modificar un producto.
                <button onclick="ModiProd()">Modificar producto</button>
                <select id="ModiProd" class="inputs">
                
                    <option value="0">Seleccione un producto</option>
                    
                    <?php
                        $sql = mysql_query("SELECT pro_id, pro_nombre FROM producto");
                        $cat = mysql_fetch_array($sql);
                        do{
                        echo "<option value=".$cat['pro_id'].">".$cat['pro_nombre']."</option>";
                        }while($cat = mysql_fetch_array($sql));
                        ?>
                
                </select>
            
            </div>
            <div class="tabla_histo">
                
                Eliminar un producto.
                <button onclick="ElimProd()">Eliminar producto</button>
                <select id="ElimProd" class="inputs">
                
                    <option value="0">Seleccione un producto</option>
                    
                    <?php
                        $sql = mysql_query("SELECT pro_id, pro_nombre FROM producto");
                        $cat = mysql_fetch_array($sql);
                        do{
                        echo "<option value=".$cat['pro_id'].">".$cat['pro_nombre']."</option>";
                        }while($cat = mysql_fetch_array($sql));
                        ?>
                
                </select>
            
            </div>
            
        </div><br>
            
            
        <button onclick="location.href='Model/salir.php'" class="volver btn-danger">Cerrar sesíon</button>
            
        </article>
    
    </section>
    <?php if(@$_GET['err'] == 1){echo '<script>alertify.success("producto agregado exitosamente")</script>';}else if(@$_GET['err'] == 2){echo '<script>alertify.success("producto modificado exitosamente")</script>';}else if(@$_GET['err'] == 3){echo '<script>alertify.success("producto eliminado exitosamente")</script>';}?>
    <?php require('footer.php');?>
<script src="View/js/classie.js"></script>
<script src="View/js/modalEffects.js"></script>
</body>
</html>