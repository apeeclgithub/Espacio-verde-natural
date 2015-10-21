<?php session_start(); ?> 
<!DOCTYPE html>

<html lang="es">

<head>



    <title>Preguntas frecuentes - Espacio Verde Natural</title>



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

        

        <h3 class="h1">Preguntas frecuentes</h3>

        

        <p id="pregunta">¿Por qué ESPACIO VERDE NATURAL?</p>

        

        <p>Porque somos una empresa emergente y la calidad es nuestra principal prioridad, si quieres algo excelente debes comprar en espacio verde natural. </p>

        

        <p id="pregunta">¿Cómo puedo comprar en Espacio Verde Natural?</p>

        

        <p>Hay múltiples opciones, puedes agregarnos a facebook, twitter o whatsapp y contactarte allí con un vendedor, también puedes acceder a nuestra página, donde tendrás el sistema de “carrito virtual”, podrás agregar cuantos productos quieras a tu carrito virtual, una ves terminado pinchas en pagar y tendrás la opción de pagar con tarjeta, deposito bancario o dirigirte a una de nuestras tiendas.</p>

        

        

        <p>Staff Espacio Verde Natural</p>

    

    </section>

    

    <?php require('footer.php');?>



</body>

</html>