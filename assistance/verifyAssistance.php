

<?php

require_once '../classModels/user.php';

$name = '';
$cod = $_POST['dni'];
if($cod != null && $cod != ''){
    $user = new User();
    $userfounded = $user->getByOrBy('usuario_dni', 'usuario_cod_cn',$cod);
    if ($userfounded[0]){
        $name = $userfounded[0]['usuario_nombre'];
        if ($userfounded[0]['usuario_registered'] == 1){
          $user->updateBy('usuario_registered', 2, "usuario_dni", $userfounded[0]['usuario_dni']);  
          echo $name;
        }else if ($userfounded[0]['usuario_registered'] == 2){
          echo 'YaRegistrado';
        }else {
          echo 'NoRegistrado';
        }
    }else {
      echo 'NoEncontrado';
    }
}
?>
