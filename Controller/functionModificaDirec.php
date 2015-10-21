<?php

    session_start();
    $json['success'] = false;
    $modifica = true;

    @$mod_direccion   = filter_var($_POST["mod_direccion"], FILTER_SANITIZE_STRING);
    @$mod_comuna   = filter_var($_POST["mod_comuna"], FILTER_SANITIZE_STRING);

    if(strlen($mod_direccion)<3){ 
        $json['msg'] = 'Dirección corta o vacía'; $modifica = false;
    }else if(strlen($mod_comuna)<3){
        $json['msg'] = 'Comuna corta o vacía'; $modifica = false;
    }
    
    require('../Model/conexion.php');
    $usu = $_SESSION["usuario"];
    $dato = mysql_fetch_array(mysql_query("SELECT usu_id FROM usuario WHERE usu_mail = '$usu'"));

    if($modifica){
        include ('../Model/ModelModificaDirec.php');
        $res = modificaDirec($mod_direccion, $mod_comuna, $dato['usu_id']);
        $obj = json_decode($res);
        $json['success'] = $obj->{'success'};
        $json['msg'] = $obj->{'msg'};
    }
    echo json_encode($json);

    
    
?>