<?php
    
    $json['success'] = false;
    $json['pag'] = "cuenta.php";
    $inicia = true;

    @$ini_mail  = filter_var($_POST["ini_mail"], FILTER_SANITIZE_EMAIL);
    @$ini_pass   = filter_var($_POST["ini_pass"], FILTER_SANITIZE_STRING);
    

    if(!filter_var($ini_mail, FILTER_VALIDATE_EMAIL)){
        $json['msg'] = 'Email no valido o vacío'; $inicia = false;
    }else if(strlen($ini_pass)<5){
        $json['msg'] = 'Password corto o vacío'; $inicia = false;
    }


    if($inicia){
        include ('../Model/ModelInicio.php');
        $res = inicio($ini_mail, $ini_pass);
        $obj = json_decode($res);
        $json['success'] = $obj->{'success'};
        $json['msg'] = $obj->{'msg'};
        $json['pag'] = $obj->{'pag'};
    }
    echo json_encode($json);
?>