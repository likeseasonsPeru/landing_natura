<?php

require_once '../models/user.php';
require_once '../models/turn.php';


$cod = '71327644';
$email = 'alexo@gmail.com';
$turn = 'turno1';
$name = 'nombre';
//$dni = $_POST['dni']
//$email = $_POST['email'];

if($cod != null && $cod != '' && $email!= null && $email = ''){

    $user = new User();
    $userfounded = $user->getByOrBy('usuario_dni', 'usuario_cod_cn',$cod);
    $turnfounded = $turn->getBy('ID', $IDturn);


    if ($userfounded != null && $turnfounded != null){
        $user->updateOne('usuario_email', $email, "usuario_dni", $cod);  // cambiar 

        // Se actualiza el turno para el usuario y se disminuye los cupones en 1

        $user->updateOne('usuario_turnoID', $turnfounded[0]['ID'], "usuario_dni", $cod);
        $turn->updateOne('Cupones', $turnfounded[0]['Cupones']-1, "ID", $IDturn);
        
        // Verificamos si ya no hay cupones 
        if ($turnfounded[0]['Cupones'] == 1){
            $turn->updateOne('Full', 1, "ID", $IDturn);
        }
    }

    // guardar email
}

?>