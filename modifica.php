<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="es">
<head>

    <title>Modifica tus datos - Espacio Verde Natural</title>

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
        <div id="mod-datos">
        <?php
            require('modifica-datos.php');
        ?>
        </div>
    
        <div id="mod-direc">
        <?php
            require('modifica-direc.php');
            ?>
        </div>
        <div class="vool">
        <button onclick="history.back()" class="volver">Volver</button>
        </div>
    </section>
    
    <?php require('footer.php');?>
<?php if(!isset($_SESSION['usuario'])){echo '<script>location.href="inicio-sesion.php"</script>';}?>
</body>
</html>