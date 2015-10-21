<?php
    
    $json['success'] = false;
    $registra = true;

    @$reg_name   = filter_var($_POST["reg_name"], FILTER_SANITIZE_STRING);
    @$reg_email  = filter_var($_POST["reg_email"], FILTER_SANITIZE_EMAIL);
    @$reg_pass   = filter_var($_POST["reg_pass"], FILTER_SANITIZE_STRING);
    @$reg_day    = filter_var($_POST["reg_day"], FILTER_SANITIZE_STRING);
    @$reg_month  = filter_var($_POST["reg_month"], FILTER_SANITIZE_STRING);
    @$reg_year   = filter_var($_POST["reg_year"], FILTER_SANITIZE_STRING);

    $reg_fecha = $reg_year.'-'.$reg_month.'-'.$reg_day;

    if(strlen($reg_name)<3){ 
        $json['msg'] = 'Nombre corto o vacío'; $registra = false;
    }else if(!filter_var($reg_email, FILTER_VALIDATE_EMAIL)){
        $json['msg'] = 'Ingrese un Email válido'; $registra = false;
    }else if(strlen($reg_pass)<5){
        $json['msg'] = 'Password corto o vacío'; $registra = false;
    }else if(!is_numeric($reg_day)){
        $json['msg'] = 'Ingrese día de nacimiento'; $registra = false;
    }else if(!is_numeric($reg_month)){
        $json['msg'] = 'Ingrese mes de nacimiento'; $registra = false;
    }else if(!is_numeric($reg_year)){
        $json['msg'] = 'Ingrese año de nacimiento'; $registra = false;
    }

    if($registra){
        include ('../Model/ModelRegistro.php');
        $res = registro($reg_name, $reg_email, $reg_pass, $reg_fecha);
        $obj = json_decode($res);
        $json['success'] = $obj->{'success'};
        $json['msg'] = $obj->{'msg'};
    }
    echo json_encode($json);
?>