

<?php

require_once '../classModels/user.php';
require_once '../classModels/turn.php';

$name = '';
$cod = '';
$turnid = '';
$btn = $_POST['btn'];

if($btn != null && $btn != ''){
  $cod = $_POST['cod'];
  $name = $_POST['name'];
  $turnid = $_POST['turnid'];
}

?>


<div class="fondoForms col-12 np">
  <div class="col-12 text-center topTitle">
    <div class="col-12 col-md-8 offset-md-2">
      <p class="textoRegistro">
        Tu turno se registró con éxito.<br>Déjanos tu correo electrónico para enviarte los detalles del evento.
      </p>
    </div>
    <!--div class="lineHeader">
    </div-->
  </div>
  <div class="col-12 col-sm-12 col-md-12 offset-md-0 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 posFormIngreso">
    <form class="formDNI" method="post">
      <input id="email" class="inputForm" type="email" name="email" required>
      <p id="errorEmail" class="errorStyle">
        Debe ingresar su correo electrónico
      </p>
      <div class="col-12 espaceBtnForm np text-center">
        <button id="btnSendEmail" class="btnFormulario" type="button" name="button" value="1">
          ENVIAR
        </button>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">

</script>
<script type="text/javascript">
$(document).ready(function() {
  $('#btnSendEmail').click(function(){
    var email = $('#email').val();
    if(email){
      var cod = '<?php echo $cod;?>'
      var name = '<?php echo $name;?>'
      var turnid = '<?php echo $turnid;?>';
      $('.contenedor-datos').css('opacity','0');
      $('#errorEmail').css('opacity','0');
      $(".contenedor-datos").fadeOut(500,function(){
        $.ajax({
          url:'models/gracias.php',
          type:'POST',
          data:{cod,name,turnid,email},
          datatype:'html',
          success:function(datahtml){
            $('body').css("background-image","url('app/images/background_madrenatura5.png')");
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
      $( ".contenedor-datos" ).fadeIn(2500, function() {
        $('.contenedor-datos').css('opacity','1');
      });
    }else{
      $('#errorEmail').css('opacity','1');
    }

  });
});
</script>
