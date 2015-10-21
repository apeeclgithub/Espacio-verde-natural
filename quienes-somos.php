<?php session_start(); ?> 
<!DOCTYPE html>

<html lang="es">

<head>



    <title>Quiénes Somos - Espacio Verde Natural</title>



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

    

    <section id="texto">

        

        <h3 class="h1">Quiénes Somos</h3>

        

        <p>Espacio Verde Natural, es una empresa de jóvenes profesionales que gusta de la vida sana y natural, que está ubicada en Santiago de Chile. Surge luego de un intenso año de trabajo con el propósito de dar a conocer sobre la utilización de las conocidas semillas de cáñamo y sus derivados.</p>

        

        <p>Además, no olvidemos las aplicaciones terapéuticas y cosméticas de estas semillas y que cada vez están siendo más utilizadas, principalmente en las áreas de salud, algunas de estas variedades se encuentran en nuestro catálogo.</p>

        

        <p>Somos un equipo con una gran empatía y con valores bien definidos, donde nuestra principal prioridad es la satisfacción de nuestros clientes. Creemos en lo que hacemos por eso entendemos los negocios como una relación basada en la confianza con nuestros clientes, donde la satisfacción y la calidad sean los principales pilares.</p>

        

        <p>Los productos que encontrarán en esta web son de marcas de referencia en el ámbito del cultivo y la cosmética, y tienen todas las garantías para satisfacer tus expectativas. Enviamos nuestros productos a cualquier parte del país. Te invitamos a vivir esta experiencia con nosotros.</p>

        

        <p>Staff Espacio Verde Natural</p>

    

    </section>

    

    <?php require('footer.php');?>



</body>

</html>