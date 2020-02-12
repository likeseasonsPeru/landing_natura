<?php

require_once '../models/user.php';

$cod = '7132744';
//$cod = $_POST['cod'];

if($cod != null && $cod != ''){

  // Se recupera el user mediante dni
    $user = new User();
    $userfounded = $user->getByOrBy('usuario_dni', 'usuario_cod_cn',$cod);
    if ($userfounded[0]){
        //  send
        //  cod = ....
        // name = ........

        $name = $userfounded[0]['usuario_nombre'];
    }else {
      // send cod = null;
    }

    // show name 

    

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
    <input id="dni" type="hidden" name="dni" value="<?= $cod; ?>">
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