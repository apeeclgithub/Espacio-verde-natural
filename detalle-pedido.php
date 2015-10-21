<?php session_start(); ?> 
<?php 
    include('Controller/carrito.php');
?>
<div id="detalle-pedido">
    <h3 class="h1">Lista de productos</h3>
    <table class="table">
	    <thead>
	        <tr>
                <th></th>
	            <th>Nombre</th>
	            <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody> 
	    	<?php
            $carro = $carrito->get_content();
            if($carro){
            require ('Model/conexion.php');
	    	  foreach($carro as $producto){
	    	  $dato = mysql_fetch_array(mysql_query("SELECT pro_img FROM producto WHERE pro_id = ".$producto['id']));
	    	?>
	        <tr>
                <td><img class="item-pedido" src="View/img/producto/<?php echo $dato["pro_img"];?>"/></td>
	        	<td><?php echo $producto["nombre"];?></td>
	            <td><?php echo number_format($producto["precio"],0,',','.');?></td>
                <td><?php echo $producto["cantidad"];?><br>
                    <button onclick="agregar(<?php echo $producto["id"];?>, 1, <?php echo $producto["precio"];?>, '<?php echo $producto["nombre"];?>')" class="btn">+</button><?php if($producto["cantidad"]>1){?>
                    <button onclick="agregar(<?php echo $producto["id"];?>, -1, -<?php echo $producto["precio"];?>, '<?php echo $producto["nombre"];?>')" class="btn">-</button><?php }?></td>
                <td><?php echo number_format($producto["precio"] * $producto["cantidad"],0,',','.');?></td>
	            <td><button onclick="borrar('<?php echo $producto["unique_id"];?>')" type="button" class="btn btn-danger">X</button></td>
	        </tr>
            <?php }
          }else{ ?>
                <tr>
                    <td class="row-vacia" colspan="6">No hay productos agregados.</td>
                </tr>
            <?php };?>
            
	    </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Total:</th>
                <th><?php  echo number_format($carrito->precio_total(),0,',','.');?></th>
                <th></th>
            </tr>
        </tfoot>
	</table>
    
</div>