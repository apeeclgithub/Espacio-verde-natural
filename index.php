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
<div class="modal">
    <div class="ventana">
        <!-- contenido -->
        <section id="texto">
        <div class="modal_title">Aviso Legal</div>
        <p class="p_modal">Para poder visitar y comprar en nuestra página web se requiere ser mayor de edad, es decir, tener más de 18 años. Quienes compren o visiten desde el extranjero deben tener mayoría de edad legal en su país de origen.</p>
        <p class="p_modal">Espacio Verde Natural es un sitio dedicado a la venta de productos cosméticos de cannabis libres de THC, semillas de colección, productos de jardinería y variedades de artículos y accesorios derivados del cáñamo.</p>
        <p class="p_modal">La legislación vigente en Chile No sanciona la posesión, venta y transporte de semillas de cannabis.Espacio Verde Natural se NEGARÁ a la venta de semillas de esta variedad a quienes nos den razones para creer que las germinarán y cultivarán, por tanto exigimos que conozca la regulación legal vigente.</p>
        <div class="p_modal">La Convención Única de 1961 de las Naciones Unidas sobre Estupefacientes, ratificada en Chile por el Decreto N° 35, publicado en el Diario Oficial de Chile el 16 enero 1968, excluye a las semillas de cáñamo o cannabis de su regulación y señala como concepto de cannabis en el Art. 1 n° 1 letra b) lo siguiente: “Por “cannabis” se entiende las sumidades, floridas o con fruto, de la planta de la cannabis (a excepción de las semillas y las hojas no unidas a las sumidades) de las cuales no se ha extraído la resina, cualquiera que sea el nombre con que se las designe.”</div>
        <br><div class="p_modal">Dicha Convención, en su Art.28, establece que:
        “La presente Convención no se aplicará al cultivo de la planta de cannabis destinado exclusivamente a fines industriales (fibra y semillas) u hortícolas”.</div>
        <br><p class="p_modal">Espacio Verde Natural no desea inducir a nadie a actuar en contra de la ley 20.000 y bajo ninguna circunstancia promoverá o incitará el cultivo de Cannabis y tampoco nos haremos responsables por el mal uso que se les dé a las semillas.Todas las personas que adquieran semillas en este sitio, son responsables de sus acciones. Espacio Verde Natural no se hace responsable por el uso que el cliente le dé a los productos comprados en este sitio web.</p>
        <p class="p_modal">No podemos dar garantía sobre la germinación o sexo de las semillas de cáñamo, debido a que son objetos únicamente de colección genética y su cultivo está regulado y en determinados casos sancionado por la ley.
        Toda la información contenida en esta página y cualquier material proporcionado por este sitio son para fines únicamente educativos y de conservación, y no para promover o incitar el uso o cultivo de sustancias ilegales.
        Asimismo las imágenes expuestas en nuestra página web son de uso exclusivo de Espacio Verde Natural con el fin de publicitar y dar información sobre un determinado producto. </p>
        <p class="p_modal">Espacio Verde Natural solo hace envíos al extranjero en países donde sea legal la colección de semillas de cannabis y los productos provenientes del cáñamo. De no cumplir con lo anterior, Espacio Verde Natural, no realizará él envió de los productos requeridos.</p>
        <p class="p_modal">Por lo tanto y de acuerdo a todo lo anterior expuesto, se sugiere a nuestra distinguida clientela informarse sobre la legislación vigente antes de comprar en nuestro sitio.</p>
        <div class="modal_title">Staff Espacio Verde Natural</div>
    </section>
    <span class="cerrar">x</span>
    </div>
</div>
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