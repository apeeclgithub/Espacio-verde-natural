<?php session_start(); ?> 
<!DOCTYPE html>

<html lang="es">

<head>



    <title>Contacto - Espacio Verde Natural</title>



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

    

    <section class="type_form" id="contact_form">

        

        <div class="form">

            <h3 class="h1">Contacto</h3>

            <label for="name"><span>Nombre</span>

                <input type="text" class="inputs" id="con_name" />

            </label>



            <label for="email"><span>E-mail</span>

                <input type="email" class="inputs" id="con_email" />

            </label>



            <label for="phone"><span>Tel&eacute;fono</span>

                <input type="text" class="inputs" id="con_phone"/>

            </label>



            <label for="message"><span>Mensaje</span>

                <textarea class="inputs" id="con_message" ></textarea>

            </label>



            <label><span>&nbsp;</span>

                <button onclick="contacto()" class="btn" id="con_submit">Enviar</button>

            </label>

        </div> 

        

    

    </section>

    

    <?php require('footer.php');?>



</body>

</html>