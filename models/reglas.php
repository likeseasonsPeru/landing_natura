
<?php

require_once '../classModels/user.php';

$dni= '';
$name= '';
$cod = $_POST['dni'];
$name = $_POST['name'];

?>

<div class="fondoForms col-12 np">
  <div class="col-12 text-center topTitle np">
    <h1>
      Bienvenido (a) <?php echo $name;?>, ten en cuenta los siguientes puntos antes de continuar
    </h1>
    <div class="col-12 col-md-8 offset-md-2 np">
      <p class="textoRegistro">
        Solo puedes registrarte en un turno.<br>No podrás hacer cambios una vez que confirmes tu registro.<br>El evento tendrá un total de 3 turnos.
      </p>
    </div>
    <!--div class="lineHeader">
    </div-->
  </div>
  <div class="col-12 col-sm-12 col-md-12 offset-md-0 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 posFormIngreso">
      <div class="row">
        <div class="col-12 col-md-6 spaceBtns ">
          <button id="empezarBtn" class="btnFormulario" type="button" name="button" value="1">
            EMPEZAR
          </button>
        </div>
        <div class="col-12 col-md-6 spaceBtns">
          <button id="cancelarBtn" class="btnFormulario" type="button" name="button" value="1">
            CANCELAR
          </button>
        </div>
      </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $('#empezarBtn').click(function(){
    $('.contenedor-datos').css('opacity','0');
    var btn = $('#empezarBtn').val();
    var cod = '<?php echo $cod;?>'
    var name = '<?php echo $name;?>'

    $(".contenedor-datos").fadeOut(500,function(){
      $.ajax({
        url:'models/selectHorario.php',
        type:'POST',
        data:{btn,cod,name},
        datatype:'html',
        success:function(datahtml){
          $('body').css("background-image","url('app/images/background_madrenatura3.png')");
          $('body').css('background-size','cover');
          //document.getElementById("backgroundImage").style.backgroundImage = "url(app/images/background_madrenatura2.png)";
          /*document.getElementById("backgroundImage").style.backgroundRepeat = "no-repeat";
          document.getElementById("backgroundImage").style.backgroundSize= "cover";
          document.getElementById("backgroundImage").style.backgroundPosition= "center";*/
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
    $( ".contenedor-datos" ).fadeIn(1500, function() {
      $('.contenedor-datos').css('opacity','1');
    });
  });

  $('#cancelarBtn').click(function (){
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
