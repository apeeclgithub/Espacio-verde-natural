<?php session_start(); ?> 
<?php
include('Controller/carrito.php');
require('Model/conexion.php'); 
$pedido = (mysql_num_rows(mysql_query('SELECT * FROM pedido')))+1;
$id = $_SESSION['usuario'];

	$sql1 = 'INSERT INTO pedido (usu_id, ped_valor, ped_estado, ped_fecha) VALUES ('.$id.', '.$carrito->precio_total().', \'pendiente\', \''.date("y-m-d").'\')';
	mysql_query($sql1);

	$carro = $carrito->get_content();
		if($carro){
			foreach($carro as $producto){	
				$sql = 'INSERT INTO detalle (pro_id, ped_id, det_cantidad) VALUES ('.$producto['id'].', '.$pedido.', '.$producto['cantidad'].')';
				$con = mysql_query($sql);
			}
	}?>
<!DOCTYPE html>
<html lang="es">
<head>

    <title>COMPRA - Espacio Verde Natural</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="View/img/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="View/css/style.css" rel="stylesheet" type="text/css" /> 
    <link href="View/css/alertify.core.css" rel="stylesheet" type="text/css" />
    <link href="View/css/alertify.bootstrap.css" rel="stylesheet" type="text/css" />

    <script src="View/js/jquery_1.9.1.js"></script>
    <script src="View/js/script.js"></script>
    <script src="View/js/jquery.slides.min.js"></script>
    <script src="View/js/alertify.min.js"></script>

</head>
<body>

    
    <section class="boleta">
        
        <div class="logoB"><img src="View/img/footer.png" /></div>
        <h3 class="texto">Gracias por comprar en Espacio Verde Natural.</h3>
        <p class="texto">
	<?php echo 'Su numero de pedido: evn000'.$pedido;?></p>
        <div class="texto">Detalle de compra</div>
        <?php 
    
?>
        <?php
            $carro = $carrito->get_content();
            if($carro){
            require ('Model/conexion.php');
	    	  foreach($carro as $producto){
	    	?>
	        <div class="linea">
                <div><?php echo $producto["cantidad"];?> x </div>
	        	<div class="nombre"><?php echo $producto["nombre"];?></div>
	            <div>$<?php echo number_format($producto["precio"],0,',','.');?></div>
                <div class="fondo">$<?php echo number_format($producto["precio"] * $producto["cantidad"],0,',','.');?></div>
	            
	        </div><br>
        
            <?php }
                echo '<hr><div class="tooo">'.number_format($carrito->precio_total(),0,',','.').'</div>';
          }?>
        
        <?php if(@$_SESSION['usuario']){
    require('Model/conexion.php');
    $datos = mysql_fetch_array(mysql_query("SELECT * FROM usuario WHERE usu_mail = '".$_SESSION['usuario']."'"));?>
    
    <br>
    <div class="texto">Tus datos personales:</div>
    <div class="texto justo">
        <div>Email: <?php echo $datos[3]?></div>
        <div>Teléfono: <?php echo $datos[2]?></div>
        <div>Fecha nacimiento: <?php echo $datos[4]?></div>
        
    </div>
    
    
    <div class="texto">Datos de entrega:</div>
    
    <?php
        $dire = mysql_num_rows(mysql_query("SELECT * FROM direccion WHERE usu_id = $datos[0]"));
        $resu = mysql_fetch_array(mysql_query("SELECT * FROM direccion WHERE usu_id = $datos[0]"));
        if($dire > 0){?>
            <div class="texto">
                <div>Dirección: <?php echo $resu[2]?></div>
                <div>Comuna: <?php echo $resu[3]?></div>
                
            </div>
   
        <?php }
        
            }?>
    
    <div class="texto">Para finalizar la compra por favor deposita el valor total de esta en la cuenta:  del banco:  y notificanos a nuestro correo con el número de compra:  </div>
    
        <h3 style="text-align:center">Espacio Verde Natural</h3><br>
    </section>
</body>
</html>