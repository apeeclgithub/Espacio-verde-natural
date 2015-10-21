<?php
    require ('../Model/conexion.php');
    $crud = $_GET['crud'];

    if($crud == 1){
        $nombre = $_POST['agr_nombre'];
        $valor = $_POST['agr_valor'];
        $categoria = $_POST['agr_categoria'];
        $descripcion = $_POST['agr_descripcion'];
        $img = $_FILES['agr_imagen']['name'];
        $search = array('á','é','í','ó','ú','ñ',',','.',' ');
        $replace = array('a','e','i','o','u','n','','','-');
        $url = str_replace($search,$replace,$nombre);
        
        mysql_query("INSERT INTO producto (pro_nombre, pro_descripcion, pro_img, pro_valor, pro_url, cat_id) VALUES ('".$nombre."', '".$descripcion."', '".$url.".jpg', ".$valor.", '".$url."', ".$categoria.")");
        
        
        
        move_uploaded_file($_FILES['agr_imagen']['tmp_name'], "../View/img/producto/".$url.'.jpg');
        
        echo '<script>location.href="../admin.php?err=1"</script>';
    }else if($crud == 2){
        $id = $_POST['agr_id'];
        $nombre = $_POST['agr_nombre'];
        $valor = $_POST['agr_valor'];
        $categoria = $_POST['agr_categoria'];
        $descripcion = $_POST['agr_descripcion'];
        $img = $_FILES['agr_imagen']['name'];
        $search = array('á','é','í','ó','ú','ñ',',','.',' ');
        $replace = array('a','e','i','o','u','n','','','-');
        $url = str_replace($search,$replace,$nombre);
        
        mysql_query("UPDATE producto SET pro_nombre = '".$nombre."', pro_valor = ".$valor.", pro_descripcion = '".$descripcion."', pro_img = '".$url.".jpg', pro_url = '".$url."', cat_id = ".$categoria." WHERE pro_id = ".$id);
        
        move_uploaded_file($_FILES['agr_imagen']['tmp_name'], "../View/img/producto/".$url.'.jpg');
         echo '<script>location.href="../admin.php?err=2"</script>';
    }else if($crud == 3){
        $id = $_GET['id'];
        mysql_query("DELETE FROM producto WHERE pro_id = ".$id);
        echo '<script>location.href="../admin.php?err=3"</script>';
    }

?> 