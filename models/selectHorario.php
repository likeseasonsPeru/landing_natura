
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
      $btnTurno1 = 'ELEGIR TURNO';
    }else {
      $btnTurno1 = 'OCUPADO';
    }

    if ($turn2['turno_full'] == 0){
      $btnTurno2 = 'ELEGIR TURNO';
    }else {
      $btnTurno2 = 'OCUPADO';
    }

    if ($turn3['turno_full'] == 0){
      $btnTurno3 = 'ELEGIR TURNO';
    }else {
      $btnTurno3 = 'OCUPADO';
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
    <div class="col-12">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4 col-xl-4 text-center">
          <div class="backgroundTurno1 col-12 np">
            <div class="col-12 np">
              <p>
                TURNO 1
              </p>
            </div>
            <div class="col-12 np">
              <p>
                FECHA: Miércoles 26 de Febrero
              </p>
            </div>
            <div class="col-12 np">
              <p>
                HORARIO: 10:00 am - 12:00pm
              </p>
            </div>
            <div class="col-12 np text-center">
              <input id="button1" class="selectButton" type="button" name="button" value='<?php echo $btnTurno1;?>'>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-4 text-center">
          <div class="backgroundTurno2 col-12 np">
            <div class="col-12 np">
              <p>
                TURNO 2
              </p>
            </div>
            <div class="col-12 np">
              <p>
                FECHA: Miércoles 26 de Febrero
              </p>
            </div>
            <div class="col-12 np">
              <p>
                HORARIO: 3:00 pm - 5:00pm
              </p>
            </div>
            <div class="col-12 np text-center">
              <input id="button2" class="selectButton" type="button" name="button" value='<?php echo $btnTurno2;?>'>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 col-xl-4 text-center">
          <div class="backgroundTurno3 col-12 np">
            <div class="col-12 np">
              <p>
                TURNO 3
              </p>
            </div>
            <div class="col-12 np">
              <p>
                FECHA: Miércoles 26 de Febrero
              </p>
            </div>
            <div class="col-12 np">
              <p>
                HORARIO: 6:00 pm - 8:00pm
              </p>
            </div>
            <div class="col-12 np text-center">
              <input id="button3" class="selectButton" type="button" name="button" value ='<?php echo $btnTurno3;?>'>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--div class="lineHeader">
    </div-->
  </div>
  <div class="col-12 col-sm-12 col-md-12 offset-md-0 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2 posFormIngreso">
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

   <!-- Modal -->
   <div class="modal fade" id="turno-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="turno-modaltitle">No ha seleccionado un turno</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
      </div>
    </div>


<script type="text/javascript">
$(document).ready(function() {

  var turnid = '';

  $('#button1').click(function(){
    var btnturno1 = $('#button1').val();
    if (btnturno1 != 'OCUPADO'){
      turnid = 'turno1';
      document.getElementById('button1').setAttribute("value", "SELECCIONADO");
      var btnturno2 = $('#button2').val();
      var btnturno3 = $('#button3').val();
      if (btnturno2 == 'SELECCIONADO'){
        document.getElementById('button2').setAttribute("value", "ELEGIR TURNO");
      }
      if (btnturno3 == 'SELECCIONADO'){
        document.getElementById('button3').setAttribute("value", "ELEGIR TURNO");
      }
    }
  });

  $('#button2').click(function(){
    var btnturno2 = $('#button2').val();
    if (btnturno2 != 'OCUPADO'){
      turnid = 'turno2';
      document.getElementById('button2').setAttribute("value", "SELECCIONADO");
      var btnturno1 = $('#button1').val();
      var btnturno3 = $('#button3').val();
      if (btnturno1 == 'SELECCIONADO'){
        document.getElementById('button1').setAttribute("value", "ELEGIR TURNO");
      }
      if (btnturno3 == 'SELECCIONADO'){
        document.getElementById('button3').setAttribute("value", "ELEGIR TURNO");
      }
    }
  });

  $('#button3').click(function(){
    var btnturno3 = $('#button3').val();
    if (btnturno3 != 'OCUPADO'){
      turnid = 'turno3';
      document.getElementById('button3').setAttribute("value", "SELECCIONADO");
      var btnturno1 = $('#button1').val();
      var btnturno2 = $('#button2').val();
      if (btnturno1 == 'SELECCIONADO'){
        document.getElementById('button1').setAttribute("value", "ELEGIR TURNO");
      }
      if (btnturno2 == 'SELECCIONADO'){
        document.getElementById('button2').setAttribute("value", "ELEGIR TURNO");
      }
    }
  });


  $('#continuarSelect').click(function(){
    if (turnid != ''){
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
      $( ".contenedor-datos" ).fadeIn(1500, function() {
        $('.contenedor-datos').css('opacity','1');
      });
    }else {
      $('#turno-modaltitle').text('No ha seleccionado un turno, por favor seleccione un turno');
      $('#turno-modal').modal('show')
    }
  });

  $('#cancelarSelect').click(function (){
        $.ajax({
        url:'models/inicio.php',
        type:'POST',
        data:{name:name},
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
});
</script>
