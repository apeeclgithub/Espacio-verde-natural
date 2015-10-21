<?php

    session_start();
    $json['success'] = false;
    $modifica = true;

    @$mod_name   = filter_var($_POST["mod_name"], FILTER_SANITIZE_STRING);
    @$mod_phone   = filter_var($_POST["mod_phone"], FILTER_SANITIZE_STRING);
    @$mod_pass   = filter_var($_POST["mod_pass"], FILTER_SANITIZE_STRING);

    if(strlen($mod_name)<3){ 
        $json['msg'] = 'Nombre corto o vacío'; $modifica = false;
    }else if(!is_numeric($mod_phone)){
        $json['msg'] = 'Ingrese un Teléfono válido'; $modifica = false;
    }else if(strlen($mod_pass)<5){
        $json['msg'] = 'Password corto o vacío'; $modifica = false;
    }else if(strlen($mod_phone)<8){
         $json['msg'] = 'Ingrese un Teléfono de 8 dígitos'; $modifica = false;
    }

    if($modifica){
        include ('../Model/ModelModificaDatos.php');
        $res = modificaDatos($mod_name, $mod_phone, $mod_pass, $_SESSION['usuario']);
        $obj = json_decode($res);
        $json['success'] = $obj->{'success'};
        $json['msg'] = $obj->{'msg'};
    }
    echo json_encode($json);

    
    
?>