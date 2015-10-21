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
    <meta property="og:image" content="View/img/logo-250.png"/>
    <meta property="og:site_name" content="Espacio verde natural"/>
    <meta property="og:description" content="Espacio verde natural, el gusto por lo natural."/>
    <meta property="og:url" content="http://www.espacioverdenatural.cl/" />  
    <!--Twitter Cards Tags-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@PONER TWITTER">
    <meta name="twitter:title" content="Espacio verde natural">
    <meta name="twitter:description" content="Espacio verde natural, el gusto por lo natural.">
    <meta name="twitter:creator" content="@PONER TWITTER">
    <meta name="twitter:image:src" content="View/img/logo-250.png">
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
        
        <?php
            require ('Model/conexion.php');
            $query = mysql_query("SELECT pro_id, pro_nombre, pro_descripcion, pro_img, pro_valor FROM producto WHERE pro_url = '".$_GET['producto']."'");	
            $dato = mysql_fetch_array($query);
        ?>
        
        <article id="indif">
            <div class="ulti">
                <h3><?php echo $dato['pro_nombre']; ?></h3>
            </div>
            <!--<div id="categorias">
                    <h3>Categorías</h3>
                    <ul class="menu">
                        <li><a href="categoria.php?cat=semillas%20feminizadas">Semillas feminizadas</a></li>
                        <li><a href="categoria.php?cat=semillas%20automaticas">Semillas automáticas</a></li>
                        <li><a href="categoria.php?cat=Fertilizantes">Fertilizantes</a></li>
                        <li><a href="categoria.php?cat=Vestuario%20y%20accesorios">Vestuario y accesorios</a></li>
                        <li><a href="categoria.php?cat=Parafernalia">Parafernalia</a></li>
                        <li><a href="categoria.php?cat=Cosmética">Cosmética</a></li>
                    </ul>
                </div>-->
            
            <div class="individual">
                <div class="img_ind"><img class="imag_ind" src="View/img/producto/<?php echo $dato['pro_img']?>" /></div>
                <div class="des_ind"><h3>Valor:</h3><br /><h1>$<?php echo number_format($dato['pro_valor'],0,',','.')?></h1><br /></div>
                <div class="des_ind"><h3>Descripción:</h3><br /><?php echo $dato['pro_descripcion']?></div>
                <button onclick="agregar(<?php echo $dato['pro_id']; ?>, 1, <?php echo $dato['pro_valor'];?>, '<?php echo $dato['pro_nombre'];?>')">Comprar</button>
                <br class="clear" />
            </div>
        
        </article>
    
    </section>
    
    <?php require('footer.php');?>

</body>
</html>