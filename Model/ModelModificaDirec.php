<?php

function modificaDirec($direccion, $comuna, $id){
    include ('conexion.php');
    
    $dato = mysql_num_rows(mysql_query("SELECT * FROM direccion WHERE usu_id = $id"));
    
    if($dato>0){
        mysql_query("UPDATE direccion SET dir_direccion='$direccion', dir_comuna='$comuna' WHERE USU_id = $id");
    
        $msg = array(
            "success" => true,
            "msg" => 'Dirección actualizada.'
        );    
    }else{
        mysql_query("INSERT INTO direccion (usu_id, dir_direccion, dir_comuna) VALUES ($id, '$direccion', '$comuna')");
        $msg = array(
            "success" => true,
            "msg" => 'Dirección creada.'
        );
    }
    
    
                    
    return json_encode($msg);

}
?>