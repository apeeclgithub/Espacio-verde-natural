<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Espacio Verde Natural</title>
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
 <!--Facebook Tags-->
    <meta property="og:title" content="Espacio verde natural"/>
    <meta property="og:locale" content="es_ES" />
    <meta property="og:image" content="www.espacioverdenatural.cl/View/img/logo-250.png"/>
    <meta property="og:site_name" content="Espacio verde natural"/>
    <meta property="og:description" content="Espacio verde natural, el gusto por lo natural."/>
    <meta property="og:url" content="http://www.espacioverdenatural.cl/" />  
    <!--Twitter Cards Tags-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@PONER TWITTER">
    <meta name="twitter:title" content="Espacio verde natural">
    <meta name="twitter:description" content="Espacio verde natural, el gusto por lo natural.">
    <meta name="twitter:creator" content="@PONER TWITTER">
    <meta name="twitter:image:src" content="www.espacioverdenatural.cl/View/img/logo-250.png">
    <meta name="twitter:domain" content="Espacio verde natural"/>

    <meta name="description" content="Espacio verde natural, el gusto por lo natural.">
    <meta name="author" content="Espacio verde natural">
    <meta name="keywords" content="venta cremas, venta semillas, semillas, cremas, ropa, vestuario, venta vestuario,  venta ropa, venta fertilizante, fertilizante, cosmetica, semillas feminizadas, feminizadas, semillas automaticas, automaticas, accesorios, vestuario y accesorios, marihuana, cannabis">

</head>
<body> 

    <header>

        <?php require('header.php');?>
        
        <div id="carro">
            <?php require('detalle-carro.php');?>
        </div>
    </header>
    
    <section>
        
        <article id="slides">
            <div class="slides">
                <img src="View/img/1.jpg" title="Espacio Verde Natural" alt="Espacio Verde Natural"/>
                <img src="View/img/2.jpg" title="Espacio Verde Natural" alt="Espacio Verde Natural"/>
                <img src="View/img/3.jpg" title="Espacio Verde Natural" alt="Espacio Verde Natural"/>
            </div>
            
        </article>
        
        <article id="productos">
            <div class="ulti">
                <h3>Últimos productos</h3>
            </div>
            <div class="productos">
            
            <?php
            	require ('Model/conexion.php');
            	$query = mysql_query("SELECT pro_id, pro_nombre, pro_descripcion, pro_img, pro_valor, pro_url FROM producto order by 1 desc limit 8");
            	
            	$dato = mysql_fetch_array($query);
            	
            	do{
            	?>
            	<div class="contenedor">
                    <h3>
                    <?php echo $dato['pro_nombre']; ?></h3>
                    <img onclick="vermas('individual.php?producto=<?php echo $dato['pro_url'];?>')" src="View/img/producto/<?php echo $dato['pro_img']; ?>">
                    <div class="lorem">
                        <p><span>$</span><?php echo number_format($dato['pro_valor'],0,',','.'); ?></p>
                        <button onclick="agregar(<?php echo $dato['pro_id']; ?>, 1, <?php echo $dato['pro_valor'];?>, '<?php echo $dato['pro_nombre'];?>')">Agregar</button>
                    </div>
                </div> 
            	<?php
            	}while($dato = mysql_fetch_array($query));
            	
            ?>


        </article>
    
    </section>
    
    <?php require('footer.php');?>

</body>
</html>