
<?php

$name = $_POST['name'];
$dni = $_POST['dni'];
$name = explode(" ", $name);
?>

<div class="fondoForms col-12 np">
  <div class="col-12 text-center topTitle">
    <h1>
      Muchas gracias <?php echo $name[2];?> </br>
      Su asistencia fue marcada con exito  </br>
    </h1>
    <div class="col-12 col-md-8 offset-md-2 text-center">
      <h1 class="textoRegistro">
        Disfrute el evento  
      </h1>
    </div>
    <!--div class="lineHeader">
    </div-->
  </div>
  <div class="col-12 col-sm-12 col-md-12 offset-md-0 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 posFormIngreso">
      <div class="row">
        <div class="col-12 text-center">
          <button id="finBtn" class="btnFormulario" type="button" name="button" value="1">
            VOLVER
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
        url:'assistance/checkAssistance.php',
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