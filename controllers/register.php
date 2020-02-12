<?php

require_once '../models/user.php';
require_once '../models/turn.php';


$cod = '71327644';
$email = 'alexo@gmail.com';
$turnid = 'turno1';
$name = 'nombre';
//$dni = $_POST['dni']
//$email = $_POST['email'];


if($cod != null && $cod != '' && $email!= null && $email != ''){
    $user = new User();
    $turn = new Turn();
    $userfounded = $user->getByOrBy('usuario_dni', 'usuario_cod_cn',$cod);
    $turnfounded = $turn->getBy('turno_id', $turnid);

    if ($userfounded != null && $turnfounded != null){

        // update user fields ()
        $user->updateBy('usuario_registered', 1, "usuario_dni", $userfounded[0]['usuario_dni']);  // cambiar 
        $user->updateBy('usuario_email', $email, "usuario_dni", $userfounded[0]['usuario_dni']);  // cambiar
        $user->updateBy('usuario_turnoID', $turnfounded[0]['turno_id'], "usuario_dni", $userfounded[0]['usuario_dni']);

        // update turn fields
        $turn->updateBy('turno_cupones', $turnfounded[0]['turno_cupones']-1, "turno_id", $turnid);
        // Verificamos si ya no hay cupones
        if ($turnfounded[0]['turno_cupones'] == 1){
            $turn->updateBy('turno_full', 1, "turno_id", $turnid);
        }

         // enviar el email

    }
   

}

?>