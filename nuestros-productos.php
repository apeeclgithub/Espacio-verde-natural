<?php //session_start(); 
?> 
<!DOCTYPE html>
<html lang="es">
<head>

    <title>Nuestros productos - Espacio Verde Natural</title>

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

    <header>

        <?php require('header.php');?>
        
        <div id="carro">
            <?php require('detalle-carro.php');?>
        </div>
    </header>
    
    <section>
        
        <article id="productos">
            <div class="ulti">
                <h3>Destacados</h3>
            </div>
            <div>
                <div id="categorias" class="contenedor nones1">
                    <h3>Categorías</h3>
                    <ul class="menu">
                        <li id="menu_fem"><a href="categoria.php?cat=semillas%20feminizadas" >&#187; Semillas feminizadas</a></li>
                        <li><a href="categoria.php?cat=semillas%20automaticas">&#187; Semillas automáticas</a></li>
                        <li><a href="categoria.php?cat=Fertilizantes">&#187; Fertilizantes</a></li>
                        <li><a href="categoria.php?cat=Vestuario%20y%20accesorios">&#187; Vestuario y accesorios</a></li>
                        <li><a href="categoria.php?cat=Parafernalia">&#187; Parafernalia</a></li>
                        <li><a href="categoria.php?cat=Cosmética">&#187; Cosmética</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="productos">
            
            <div>
                <div id="categorias" class="contenedor nones2">
                    <h3>Categorías</h3>
                    <ul class="menu">
                        <li id="menu_fem"><a href="categoria.php?cat=semillas%20feminizadas" >&#187; Semillas feminizadas</a></li>
                        <li><a href="categoria.php?cat=semillas%20automaticas">&#187; Semillas automáticas</a></li>
                        <li><a href="categoria.php?cat=Fertilizantes">&#187; Fertilizantes</a></li>
                        <li><a href="categoria.php?cat=Vestuario%20y%20accesorios">&#187; Vestuario y accesorios</a></li>
                        <li><a href="categoria.php?cat=Parafernalia">&#187; Parafernalia</a></li>
                        <li><a href="categoria.php?cat=Cosmética">&#187; Cosmética</a></li>
                    </ul>
                </div>
            </div>
            
<?php
            	@require ('Model/conexion.php');
            	$query = mysql_query("SELECT pro_id, pro_nombre, pro_descripcion, pro_img, pro_valor, pro_url FROM producto order by rand() limit 7");
            	
            	$dato = mysql_fetch_array($query);
            	
            	do{
            	?>
            	<div class="contenedor">
                    <h3><?php echo $dato['pro_nombre']; ?></h3>
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