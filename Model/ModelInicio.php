<?php
session_start();
function inicio($email, $pass){
    include ('conexion.php');
    
    $dato = mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE usu_mail = '$email' AND usu_pass = '$pass'"));
    
    if($dato == 0){
        $msg = array(
            "success" => false,
            "msg" => 'Email o pass incorrectos.',
            "pag" => 'cuenta.php'
        );
    }else{
        $_SESSION['usuario'] = $email;
        $msg = array(
            "success" => true,
            "msg" => 'Logeo correcto.',
            "pag" => 'cuenta.php'
        );
    
    }
          
    if($email == 'franco@espacioverdenatural.cl' && $pass == 'EVN.franco-2015'){
        $_SESSION['usuario'] = 'Administrador';
        $msg = array(
            "success" => true,
            "msg" => '',
            "pag" => 'admin.php'
        );
    }
    
    return json_encode($msg);
    
    
}
?>