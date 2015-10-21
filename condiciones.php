<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="es">
<head>

    <title>Condiciones de Compra - Espacio Verde Natural</title>

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
        
        <h3 class="h1">Condiciones de compra</h3>
        
        <p>Puedes depositar y avisar por mail o teléfono el detalle de tu compra. Para enviar tu pedido, sólo sigue los siguientes pasos:</p>
        
        <p>1. Identifícate con tu nombre completo, destino completo (calle con número, cuidad y región) y contacto como celular o mail. Escoge los productos agregándolos al carro de compras.</p>
        
        <p>2. Normalmente las encomiendas tienen un recargo por gastos de empaque y envío. Tu pedido será despachado por Turbus o Chilexpress. El precio y fecha de entrega de la encomienda dependerá de lo que hayas pedido y de la ciudad de destino, esto lo sabremos y te lo comunicaremos en cuanto hayamos despachado el paquete enviándote la orden respectiva.</p>
        
        <p>3. Para pagar su pedido debe hacer el depósito en nuestra cuenta corriente del Banco Estado <b style="font-size:18px;">0577006869-1</b> transfiriendo por internet, o directamente en una caja del banco.</p>
        
        <p>4. Confirma tu pedido. Envíanos copia del comprobante de pago a ventas@espacioverdenatural.cl</p>
        
        <p>5. El tiempo de entrega varía según lo que hayas llenado en los pasos anteriores, tu pedido comienza a correr en cuanto comprobemos tu depósito.</p>
        
        <p>6. En cuanto el paquete esté listo y sea despachado, te enviaremos un mensaje con los datos del transporte.</p>
        
        <p>Staff Espacio Verde Natural</p>
    
    </section>
    
    <?php require('footer.php');?>

</body>
</html>