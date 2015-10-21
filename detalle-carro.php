<?php session_start(); ?> 
<?php
    include('Controller/carrito.php');
?>
<div class="carro">
    <ul class="barra">
        <li><a href="registro.php">Registro</a></li>
        <?php
        if(isset($_SESSION['usuario'])){
            echo '<li><a href="cuenta.php">Cuenta</a></li>';
        }else{
            echo '<li><a href="inicio-sesion.php">Inicia sesión</a></li>';
        }?>
        <li><img src="View/img/carro.png"/></li>
        <ul class="barra-carro">
            <li>Carro&nbsp;(<?php echo $carrito->articulos_total()?>)</li>
            <?php
                echo '<ul class="detalle-carro">';
                $carro = $carrito->get_content();
                if($carro){
                	require ('Model/conexion.php');
                    foreach($carro as $producto){
                    	$dato = mysql_fetch_array(mysql_query("SELECT pro_img FROM producto WHERE pro_id = ".$producto['id']));
                        echo '<li class="item-detalle">';
                        echo '<img src="View/img/producto/'.$dato["pro_img"].'" />';
                        echo '<p>'.$producto["nombre"].'</p>';
                        echo '<div class="flec"><p>CLP</p><p class="h1">'.number_format($producto["precio"],0,',','.').'</p> <p>x'.$producto["cantidad"].'</p> 
                        <button onclick="borrar(\''.$producto["unique_id"].'\')" class="btn btn-danger">X</button></div>';   
                        echo '</li>';
                    }
                    echo '<li class="control-carro">';
                    echo '<p><span class="dere">Total:</span>CLP<span class="h1">'.number_format($carrito->precio_total(),0,',','.').'</span></p>';
                    echo '<div class="control-button"><button class="btn" onclick="vaciar()">Vaciar Carro</button>';
                    echo '<a id="pedido" href="pedido.php"><button class="btn btn-danger">COMPRAR!</button></a></div>';
                    echo '</li>';
                }else{
                    echo '<li class="empty">Carrito vacio</li>';
                }
                echo '</ul>';
            ?>
        </ul>        
    </ul>              
</div>