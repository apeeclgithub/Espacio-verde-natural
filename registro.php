<?php session_start(); ?> 
<!DOCTYPE html>

<html lang="es">

<head>



    <title>Registro - Espacio Verde Natural</title>



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

            <h3 class="h1">Registro</h3>

            <div class="form"><br>

            <label for="name1"><span>Nombre</span>

                <input class="inputs" type="text" id="reg_name"  />

            </label>

            

            <label for="email1"><span>E-mail</span>

                <input class="inputs" type="email" id="reg_email" />

            </label>

            

            <label for="pass1"><span>Contraseña</span>

                <input class="inputs" type="password" id="reg_pass"/>

            </label>

            

            <label for="date1"><span>Fecha de nacimiento</span><br>

                <select class="inputs" id="reg_day">

                    <option value="">Día&nbsp;</option> <?php  for($i=1;$i<=31;$i++) { echo "<option value='".$i."'>".$i."</option>"; } ?>

                </select>

                <select class="inputs" id="reg_month">

                      <option value="">Mes</option> <?php  for($i=1;$i<=12;$i++) { echo "<option value='".$i."'>".$i."</option>"; } ?>

                </select>

                <select class="inputs" id="reg_year">

                      <option value="">Año</option>

                      <?php  for($i=1950;$i<=1997;$i++) { echo "<option value='".$i."'>".$i."</option>"; } ?>

                </select>

            </label>



                <br>

            <label><span>&nbsp;</span>

                <input onclick="registro()" class="btn" id="submit" type="submit" value="Enviar">

            </label>

        </div>



    </section>

    

    <?php require('footer.php');?>



</body>

</html>