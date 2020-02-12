
<?php

require_once '../classModels/user.php';
require_once '../classModels/turn.php';

// para test
$btn = '';
$name = '';
$cod = '';
$btn = $_POST['btn'];
if($btn != null && $btn != ''){
  $cod = $_POST['cod'];
  $name = $_POST['name'];
  if($cod != null && $cod != '' && $name != null && $name != ''){

    $turn = new Turn();
    $turns = $turn->getAll();

    // el Primero obtenido es el turno por defecto ("turno0 que indica sin turno")

    $turn1 = $turns[0][1];
    $turn2 = $turns[0][2];
    $turn3 = $turns[0][3];
    $idturno1 = $turn1['turno_id'];
    $idturno2 = $turn2['turno_id'];
    $idturno3 = $turn3['turno_id'];

    $btnTurno1 = '';
    $btnTurno2 = '';
    $btnTurno3 = '';
    // Se asigna un valor a al boton de cada

    if ($turn1['turno_full'] == 0){
      $btnTurno1 = 'Elegir Turno';
    }else {
      $btnTurno1 = 'Ocupado';
    }

    if ($turn2['turno_full'] == 0){
      $btnTurno2 = 'Elegir Turno';
    }else {
      $btnTurno2 = 'Ocupado';
    }

    if ($turn3['turno_full'] == 0){
      $btnTurno3 = 'Elegir Turno';
    }else {
      $btnTurno3 = 'Ocupado';
    }

    //  enviar el
    // id del turno
    // cod
    // nombre
    }
}

?>


<div class="fondoForms col-12 np">
  <div class="col-12 text-center topTitle np">
    <h1>
      Bienvenido (a) <?php echo $name;?>
    </h1>
    <div class="col-12 col-md-8 offset-md-2 np">
      <p class="textoRegistro">
        Selecciona el horario al cual quieres asistir
      </p>
    </div>
    <!--div class="lineHeader">
    </div-->
  </div>
  <div class="col-12 col-sm-12 col-md-12 offset-md-0 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 posFormIngreso">
      <div class="row">
        <div class="col-12 col-md-6  spaceBtns">
          <button id="continuarSelect" class="btnFormulario" type="button" name="button" value="1">
            CONTINUAR
          </button>
        </div>
        <div class="col-12 col-md-6 spaceBtns">
          <button id="cancelarSelect" class="btnFormulario" type="button" name="button" value="1">
            CANCELAR
          </button>
        </div>
      </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $('#continuarSelect').click(function(){
    $('.contenedor-datos').css('opacity','0');
    var btn = $('#continuarSelect').val();
    var cod = '<?php echo $cod;?>'
    var name = '<?php echo $name;?>'
    
    // var turnid = ''
    $(".contenedor-datos").fadeOut(500,function(){
      $.ajax({
        url:'models/sendEmail.php',
        type:'POST',
        data:{btn, cod, name, turnid},
        datatype:'html',
        success:function(datahtml){
          $('body').css("background-image","url('app/images/background_madrenatura4.png')");
          $('body').css('background-size','cover');
          document.getElementById("tituloHeader").style.opacity = "0";
          setTimeout(() => {
            document.getElementById("tituloHeader").style.opacity = "1";
            document.getElementById("tituloHeader").style.textAlign = "right";
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
