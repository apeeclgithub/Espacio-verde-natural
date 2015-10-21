<?php

function registro($nombre, $email, $pass, $fecha){
    include ('conexion.php');
    
    $dato = mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE usu_mail = '$email'"));
    
    if($dato > 0){
        $msg = array(
            "success" => false,
            "msg" => 'Email ya registrado.'
        );
    }else{
        
        mysql_query("INSERT INTO usuario (usu_nombre, usu_mail, usu_pass, usu_edad, usu_fecha) VALUES ('$nombre', '$email', '$pass', '$fecha', '".date("y-m-d")."')");
        $msg = array(
            "success" => true,
            "msg" => 'Usuario ingresado exitosamente.'
        );
    
    }
                    
    return json_encode($msg);
    
}
?>