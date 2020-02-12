<?php
require_once '../common/config.php';
require_once '../common/lib/phpmailer/class.phpmailer.php';
include '../models/sendmail.class.php';

//datos de form - tipo array
$sendmail = new Sendmailweb();
$proyecto = '';
$nombres='';
$apellidos='';
$celular='';
$correo='';
$distrito='';
$comentario='';
if($_POST)
{



  $proyecto = $_POST['proyecto'];
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $celular = $_POST['celular'];
  $correo = $_POST['correo'];
  $distrito = $_POST['distrito'];
  $comentario = $_POST['comentario'];

    $datosmensaje = array(
    $proyecto
    ,$nombres
    ,$apellidos
  	,$celular
  	,$correo
    ,$distrito
    ,$comentario
  );

  //print_r($datosmensaje);

  # Mails receptores
  $argMailRecep = array(
  	'AddAddress'=>array('renzo.munoz@likeseasons.com','CORREO2')//CORREO NORMAL
  	,'AddBCC'=>array('armando@likeseasons.com','CORREO2')//COPIA OCULTA
  );
  $subjet = 'DATOS PAGINA WEB';
  $htmlMail = $sendmail->htmlMailContacto($datosmensaje);
  //echo $htmlMail;
  #Datos dinamicos para Mailing
  $argMail = array(
  	"xxxxxx" =>$xxxxxxx
  );

  $send = $sendmail->sendMail($htmlMail,$argMailRecep,$subjet);
  //echo 'Envio->'.$send;
  if($send==''){
    $output = json_encode(array('type'=>'No Enviado'));
  }else if($send==1){
    $output = json_encode(array('type'=>'Enviado'));
  }
  die($output);
}


?>
