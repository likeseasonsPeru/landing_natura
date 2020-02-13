
<?php

require_once '../classModels/user.php';
require_once '../classModels/turn.php';

$cod = '';
$email = '';
$turnid = '';
$name = '';
$horario = '';
$fecha = '';

$name = $_POST['name'];
$email = $_POST['email'];
$turnid = $_POST['turnid'];
$cod = $_POST['cod'];

if($cod != null && $cod != '' && $email!= null && $email != '' && $turnid != null && $turnid != '' && $name != null && $name != ''){
    $user = new User();
    $turn = new Turn();
    $userfounded = $user->getByOrBy('usuario_dni', 'usuario_cod_cn',$cod);
    $turnfounded = $turn->getBy('turno_id', $turnid);



    if ($userfounded != null && $turnfounded != null){

        $horario = explode('-',$turnfounded[0]['turno_horario']);
        $fecha = $turnfounded[0]['turno_fecha'];
        // update user fields ()
        $user->updateBy('usuario_registered', 1, "usuario_dni", $userfounded[0]['usuario_dni']);  // cambiar 
        $user->updateBy('usuario_email', $email, "usuario_dni", $userfounded[0]['usuario_dni']);  // cambiar
        $user->updateBy('usuario_turnoID', $turnfounded[0]['turno_id'], "usuario_dni", $userfounded[0]['usuario_dni']);

        // update turn fields
        $turn->updateBy('turno_cupones', $turnfounded[0]['turno_cupones']-1, "turno_id", $turnid);
        // Verificamos si ya no hay cupones
        if ($turnfounded[0]['turno_cupones'] == 1){
            $turn->updateBy('turno_full', 1, "turno_id", $turnid);
        }
         // enviar el email
    }
}

?>


<div class="fondoForms col-12 np">
  <div class="col-12 text-center topTitle">
    <h1>
      Muchas gracias <?php echo $name;?>,
    </h1>
    <div class="col-12 col-md-8 offset-md-2 text-center">
      <p class="textoRegistro">
        El correo con los detalles del evento fué enviado con éxito.Te esperamos el  <?php echo $fecha?> a las <?php echo $horario[0]?> en
  “dirección del evento”.
      </p>
    </div>
    <!--div class="lineHeader">
    </div-->
  </div>
  <div class="col-12 col-sm-12 col-md-12 offset-md-0 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 posFormIngreso">
      <div class="row">
        <div class="col-12 text-center">
          <button id="finBtn" class="btnFormulario" type="button" name="button" value="1">
            INICIO
          </button>
        </div>
      </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#finBtn').click(function(){
    $('.contenedor-datos').css('opacity','0');
    var btn = $('#finBtn').val();

    $(".contenedor-datos").fadeOut(500,function(){
      $.ajax({
        url:'models/inicio.php',
        type:'POST',
        data:{btn:btn},
        datatype:'html',
        success:function(datahtml){
          $('body').css("background-image","url('app/images/background_madrenatura1.png')");
          $('body').css('background-size','cover');
          document.getElementById("tituloHeader").style.opacity = "0";
          setTimeout(() => {
            document.getElementById("tituloHeader").style.opacity = "1";
            document.getElementById("tituloHeader").style.textAlign = "left";
            $('.contenedor-datos').html(datahtml);
          }, 500)


        },error: function(){
          $('.contenedor-datos').html('<p>error al cargar desde Ajax</p>');
        }
      });
    });
    $( ".contenedor-datos" ).fadeIn(500, function() {
      $('.contenedor-datos').css('opacity','1');
    });
  });
});
</script>
