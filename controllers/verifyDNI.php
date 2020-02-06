<?php

require_once '../models/user.php';

$dni = '';
$dni = $_POST['dni'];

// para test
$bandera = 'No hay usuario';


if($dni != null && $dni != ''){
    $user = new User();
    $userfounded = $user->getBy('DNI', $dni);

    // verify if there is a user in the bd

    if ($userfounded != null){
        echo 'Hay un usuario';
        user->setDNI($userfounded[0]['DNI']);
        user->setName($userfounded[0]['Nombre']);
        user->setEmail($userfounded[0]['Email']);
        user->setTurno($userfounded[0]['Turno_ID']);
        user->setRegistered(1);

        user.updateOne('Registered', 1, "DNI", user.getDNI());
        echo 'Se registro correctamente al usuario invitado';
    }

    // else {
    }
}

?>

<!--  Segunda vista -->

<div class="">
  <div class="">
    <span>hola </span> <br>
    Bienvenido <br>
  </div>
</div>

<!-- Enviar los datos del usuario  "$user"  -->