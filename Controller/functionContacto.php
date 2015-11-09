<?php
    $name = filter_var($_POST["con_name"], FILTER_SANITIZE_STRING);
    $email =filter_var($_POST["con_email"], FILTER_SANITIZE_EMAIL);
    $phone =filter_var($_POST["con_phone"], FILTER_SANITIZE_STRING);
    $message =filter_var($_POST["con_message"], FILTER_SANITIZE_STRING);

    $json['success'] = false;
    $send = true;

    if(strlen($name)<3){ 
        $json['msg'] = 'Nombre corto o vacío'; $send = false;
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $json['msg'] = 'Ingrese un Email válido'; $send = false;
    }else if(strlen($message)<5){
        $json['msg'] = 'Mensaje corto o vacío'; $send = false;
    }
    
    if($send){
        $to_Email   	= "ventas@espacioverdenatural.cl";
        $subject        = 'Tienes un Email de contacto desde Espacio Verde Natural';
        
        //proceed with PHP email.
        $headers = 'From: '.$email.'' . "\r\n" .
        'Reply-To: '.$email.'' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        $sentMail = @mail($to_Email, $subject,'Nombre: '.$name."\n"."\n".'Fono: '.$phone."\n"."\n".'Mail: '.$email."\n"."\n".'Mensaje: ' .$message, $headers);

        if(!$sentMail){
            $json['msg'] = 'No se pudo enviar el mensaje';
        }else{
            $json['success'] = true;
            $json['msg'] = 'Mensaje enviado exitosamente.';
        }
    }

    echo json_encode($json);

?>