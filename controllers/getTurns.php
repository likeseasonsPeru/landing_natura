<?php

require_once '../models/user.php';
require_once '../models/turn.php';

// para test
$user = '';

$user = $_POST['user'];
if($user != null && $user != ''){
  $turn = new Turn();

 // $query = "SELECT * FROM `turno` ORDER BY ID ASC";
 // $turns = $turn->ejecutarSql(query);
  $turns = $turn->getAll();

  // the first is for defect "without turn"

  $turn1 = $turns[1]:
  $turn2 = $turns[2]:
  $turn3 = $turns[3]:

  $btnTurno1 = '';
  $btnTurno2 = '';
  $btnTurno3 = '';

  if ($turn1->full)

  $turnSelected = user->getTurno();

  switch($turnSelected) {
    case 'turno1':
      $btnTurno1 = 'Seleccionado';
      break;
    case 'turno2':
      $btnTurno2 = 'Seleccionado';
      break;
    case 'turno3':
      $btnTurno3 = 'Seleccionado';
      break;
  }

}

?>

<div class="">
  <div class="">
    <span>hola </span> <br>
    Bienvenido <br>
  </div>
</div>