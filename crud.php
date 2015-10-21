<?php session_start(); ?> 
<?php
session_start();
if($_SESSION['usuario'] != 'Administrador'){
    echo '<script>location.href="index.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <title>Manejador de productos - Espacio Verde Natural</title>

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
<?php
    require ('Model/conexion.php');
    
    
    if($_GET['crud'] == 1){
    
    ?>
    <section class="type_form" id="contact_form">
        <form enctype="multipart/form-data" action="Controller/subir-producto.php?crud=1" method="post">
        <div class="form">
            
            <h3 class="h1">Agregar un producto</h3>
            <label for="name"><span>Nombre</span>
                <input type="text" class="inputs" name="agr_nombre" required/>
            </label>

            <label for="Valor"><span>Valor <small>(sin  puntos)</small></span>
                <input type="number" class="inputs" name="agr_valor" required/>
            </label>
            <label for="categoria"><span>Categoria</span>
            <select name="agr_categoria" class="inputs">
                
                    <option>Seleccione una categoria</option>
                    <?php
                        $sql = mysql_query("SELECT cat_id, cat_nombre FROM categoria");
                        $cat = mysql_fetch_array($sql);
                        do{
                        echo "<option value=".$cat['cat_id'].">".$cat['cat_nombre']."</option>";
                        }while($cat = mysql_fetch_array($sql));
                        ?> 
                
                </select><br>

            <label for="Descripción"><span>Descripción <small>(semillas automaticas pegar código de la tabla aquí despues de la descripción)</small></span>
                <textarea class="inputs" name="agr_descripcion" required></textarea>
            </label><br>
                <label>Agregue una imagen</label>
                <input name="agr_imagen" class="inputs" type="file" required/>

            <label><span>&nbsp;</span>
                <input type="submit" value="Guardar" id="con_submit">
                
            </label>
                
                
        </div> 
        </form>
    <button style="margin-left:10px" onclick="location.href='admin.php'" class="btn" id="con_submit">Volver</button>
    </section>
        
        <?php 
    }else if($_GET['crud'] == 2){
        $dato = mysql_fetch_array(mysql_query("SELECT pro_nombre, pro_valor, pro_descripcion, producto.cat_id, cat_nombre FROM producto INNER JOIN categoria ON producto.cat_id = categoria.cat_id WHERE producto.pro_id = ".$_GET['id']));
        ?>
    <section class="type_form" id="contact_form">
        <form enctype="multipart/form-data" action="Controller/subir-producto.php?crud=2" method="post">
        <div class="form">
            
            <h3 class="h1">Modificar un producto</h3>
            <input type="hidden" value="<?php echo $_GET['id']?>" name="agr_id">
            <label for="name"><span>Nombre</span>
                <input type="text" class="inputs" name="agr_nombre" value="<?php echo $dato['pro_nombre']?>" required/>
            </label>

            <label for="Valor"><span>Valor <small>(sin  puntos)</small></span>
                <input type="number" class="inputs" name="agr_valor" value="<?php echo $dato['pro_valor']?>" required/>
            </label>
            <label for="categoria"><span>Categoria</span>
            <select name="agr_categoria" class="inputs">
                
                    <option value="<?php echo $dato['cat_id']?>"><?php echo $dato['cat_nombre']?></option>
                    <?php
                        $sql = mysql_query("SELECT cat_id, cat_nombre FROM categoria");
                        $cat = mysql_fetch_array($sql);
                        do{
                        echo "<option value=".$cat['cat_id'].">".$cat['cat_nombre']."</option>";
                        }while($cat = mysql_fetch_array($sql));
                        ?> 
                
                </select><br>

            <label for="Descripción"><span>Descripción <small>(semillas automaticas pegar código de la tabla aquí despues de la descripción)</small></span>
                <textarea class="inputs" name="agr_descripcion" required><?php echo $dato['pro_descripcion']?></textarea>
            </label><br>
                <label>Agregue una imagen</label>
                <input name="agr_imagen" class="inputs" type="file" required/>

            <label><span>&nbsp;</span>
                <input type="submit" value="Guardar Cambios" id="con_submit">
                
            </label>
                
                
        </div> 
        </form>
    <button style="margin-left:10px" onclick="location.href='admin.php'" class="btn" id="con_submit">Volver</button>
    </section>
        
        <?php 
    
    }
        ?>


</body>
</html>