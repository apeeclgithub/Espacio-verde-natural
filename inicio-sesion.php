<?php session_start(); ?> 
<!DOCTYPE html>

<html lang="es">

<head>



    <title>Inicio Sesión - Espacio Verde Natural</title>



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

            <h3 class="h1">Iniciar sesión</h3>

            <div >

    		<div class="form" id="logincliente">

    			<label id="mail_label" for="mail"><span>E-mail</span>

                    <input id="ini_mail" class="inputs" type="text" />

                </label> 	 

    	      	<label id="pass_label" for="pass"><span>Contraseña</span>

                    <input id="ini_pass" class="inputs" type="password" />

                </label>

                <button id="submit" onclick="inicio_sesion()">Ingresar</button>

    		</div>

        

    </div>

    </section>

    

    <?php require('footer.php');?>



</body>

</html>