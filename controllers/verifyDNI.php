<?php

require_once '../models/user.php';

$dni = '';
$dni = $_POST['dni'];

if($dni != null && $dni != ''){

  // Se recupera el user mediante dni
    $user = new User();
    $userfounded = $user->getBy('DNI', $dni);

    if ($userfounded != null){
        echo 'Hay un usuario';
    /*  user->setDNI($userfounded[0]['DNI']);
        user->setName($userfounded[0]['Nombre']);
        user->setEmail($userfounded[0]['Email']);
        user->setTurno($userfounded[0]['Turno_ID']);  */
        //user->setRegistered(1);

        // Se actualiza (registra al usuario);

        $user->updateOne('Registered', 1, "DNI", $dni);
        echo 'Se registro correctamente al usuario invitado';
    }else {
        echo 'No se encuentra en la lista';
    }
}

?>

<!--  Segunda vista -->

<div class="">
  <div class="">
    <span> <?= $user->getName(); ?></span> 
    <br> Bienvenido <br>

    <input type="submit" class="logbtn" id="Continuar" value="Continuar" style="display: block;
              width: 100%;
              height: 50px;
              border: none;
              background: linear-gradient(120deg,#3498db,#8e44ad,#3498db);
              background-size: 200%;
              color: #fff;
              outline: none;
              cursor: pointer;
              transition: .5s;">
    <input id="dni" type="hidden" name="dni" value="<?= $dni; ?>">
  </div>
</div>



<script type="text/javascript">
    let btncontinuar = document.getElementById('Continuar');
    btncontinuar.addEventListener('click', continuar);

    function continuar(event) {
      event.preventDefault();
      let dni =  document.getElementById('dni').value;
      console.log(dni);
      let formdata = new FormData()
      formdata.append('dni', dni);

      fetch('../controllers/getTurns.php', {
          method: "POST",
          body: formdata,
      })
        .then(function (res) {
          alert("Se envio")
        })
        .catch(function (res) {
          alert('no se envio')
        })
    }

  </script>

<!-- Enviar los datos del usuario  "$user"  -->