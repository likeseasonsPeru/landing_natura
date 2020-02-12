<?php

require_once '../models/user.php';
require_once '../models/turn.php';

// para test
$nombre = ''
$cod = '71327644';
//$dni = $_POST['dni'];

if($cod != null && $cod != ''){

  // Se recupera el user mediante dni
 // $user = new User();
 // $userfounded = $user->getByOrBy('usuario_dni', 'usuario_cod_cn',$cod);

  // Se obtienen los turno con sus datos
  $turn = new Turn();
 // $query = "SELECT * FROM `turno` ORDER BY ID ASC";
 // $turns = $turn->ejecutarSql(query);
  $turns = $turn->getAll();

  // el Primero obtenido es el turno por defecto ("turno0 que indica sin turno")

  $turn1 = $turns[0][1];
  $turn2 = $turns[0][2];
  $turn3 = $turns[0][3];

  $btnTurno1 = '';
  $btnTurno2 = '';
  $btnTurno3 = '';

  // Se asigna un valor a al boton de cada

  if ($turn1['usuario_full'] == 0){
    $btnTurno1 = 'Elegir Turno';
  }else {
    $btnTurno1 = 'Ocupado';
  }

  if ($turn2['usuario_full'] == 0){
    $btnTurno2 = 'Elegir Turno';
  }else {
    $btnTurno2 = 'Ocupado';
  }

  if ($turn3['usuario_full'] == 0){
    $btnTurno3 = 'Elegir Turno';
  }else {
    $btnTurno3 = 'Ocupado';
  }

  //  enviar el

  // id del turno
  // cod
  // nombre 

}

?>

<!--  Send the turn selected and the user    -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="container">
  <div class="">
    <span>hola </span> <br>
    Bienvenido <br>
  </div>

  <!--------------------------------------------------------------------------->
  
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Turno1</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">    
        </ul>
        <button type="button" id="turno1" class="btn btn-lg btn-block btn-outline-primary"><?= $btnTurno1; ?></button>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Pro</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
        </ul>
        <button type="button" id="turno2" class="btn btn-lg btn-block btn-primary"><?= $btnTurno2; ?></button>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Enterprise</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
        </ul>
        <button type="button" id="turno3" class="btn btn-lg btn-block btn-primary"><?= $btnTurno3; ?></button>
      </div>
    </div>
  </div>


  <!--------------------------------------------------------------------------->

</div>

