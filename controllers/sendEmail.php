<?php

require_once '../models/user.php';
require_once '../models/turn.php';

$dni = '';
$email = '';
$dni = '71327644';
$email = 'alexo@gmail.com';
$turn = 'turno1';
//$dni = $_POST['dni']
//$email = $_POST['email'];

if($dni != null && $dni != '' && $email!= null && $email = ''){

    $user = new User();
    $userfounded = $user->getBy('DNI', $dni);

    if ($userfounded != null && $turnfounded != null){
        $user->updateOne('email', $email, "DNI", $dni);
    }

    // guardar email
}

?>