<?php
require_once '../classModels/user.php';
$name = '';
$cod = $_POST['dni'];
if($cod != null && $cod != ''){
    $user = new User();
    $userfounded = $user->getByOrBy('usuario_dni', 'usuario_cod_cn',$cod);
    if ($userfounded[0]){
        $name = $userfounded[0]['usuario_nombre'];
        echo 'encontrado';
    }else {
      echo ' ';
    }
}
?>
