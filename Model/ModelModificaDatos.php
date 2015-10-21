<?php

function modificaDatos($nombre, $phone, $pass, $mail){
    include ('conexion.php');
    
    mysql_query("UPDATE usuario 
SET USU_NOMBRE='$nombre',
USU_FONO='$phone',
USU_PASS='$pass' 
WHERE USU_MAIL = '$mail'");
    
        $msg = array(
            "success" => true,
            "msg" => 'Datos actualizados.'
        );
                    
    return json_encode($msg);

}
?>