<?php

require_once '../models/user.php';
require_once '../models/turn.php';


$dni = '';
$IDturn = '';
$nombre = '';
$dni = '71327644';
$IDturn = 'turno2';
//$dni = $_POST['dni'];
//$IDturn = $_POST['turn'];         // el ID del turno 


if($dni != null && $dni != '' && $IDturn!= null && $IDturn != ''){

    // Recuperando el usuario y el turno para las modificaciones 
    $user = new User();
    $turn = new Turn();
    $userfounded = $user->getBy('DNI', $dni);
    $turnfounded = $turn->getBy('ID', $IDturn);

    if ($userfounded != null && $turnfounded != null){
        // Se actualiza el turno para el usuario y se disminuye los cupones en 1
        $user->updateOne('Turno_ID', $turnfounded[0]['ID'], "DNI", $dni);
        $turn->updateOne('Cupones', $turnfounded[0]['Cupones']-1, "ID", $IDturn);
        
        // Verificamos si ya no hay cupones 
        if ($turnfounded[0]['Cupones'] == 1){
            $turn->updateOne('Full', 1, "ID", $IDturn);
        }
    }

    // variables con las que interactuara

}

?>

<div class="container">
  <div class="">
    <span>hola </span> <br>
    Bienvenido <br>
  </div>

  <!--------------------------------------------------------------------------->



  <!--------------------------------------------------------------------------->

  <script type="text/javascript">
    let btningresar = document.getElementById('btningresar');
    btningresar.addEventListener('click', ingresar);

    function ingresar(event) {
      event.preventDefault();

      let dni =  document.getElementById('dni').value;
      console.log(dni);

      let formdata = new FormData()
      formdata.append('dni', dni);

      fetch('../actions/verifyDNI.php', {
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


</div>


