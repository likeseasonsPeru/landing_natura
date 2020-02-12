

<div class="fondoForms col-12 np">
  <div class="col-12 text-center topTitle np">
    <h1>
      REGÍSTRATE
    </h1>
    <div class="col-12 col-md-8 offset-md-2 np">
      <p class="textoRegistro">
        Para empezar, ingresa tu número de DNI o CODIGO DE CONSULTORA
      </p>
    </div>
    <!--div class="lineHeader">
    </div-->
  </div>
  <div class="col-12 col-sm-12 col-md-12 offset-md-0 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 posFormIngreso">
    <form class="formDNI" method="post">
      <input class="inputForm" placeholder="Ingrese su DNI o Código de Consult." type="text" name="dni" maxlength="8">
      <div class="col-12 espaceBtnForm np text-center">
        <button class="btnFormulario" type="button" name="button" value="1">
          INGRESAR
        </button>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $('.btnFormulario').click(function(){
    $('.contenedor-datos').css('opacity','0');
    var btn = $('.btnFormulario').val();
    var dni = $('.inputForm').val();

    $(".contenedor-datos").fadeOut(500,function(){
      $.ajax({
        url:'models/reglas.php',
        type:'POST',
        data: {dni:dni},
        datatype:'html',
        success:function(datahtml){
          $('body').css("background-image","url('app/images/background_madrenatura2.png')");
          $('body').css('background-size','cover');
          //document.getElementById("backgroundImage").style.backgroundImage = "url(app/images/background_madrenatura2.png)";
          /*document.getElementById("backgroundImage").style.backgroundRepeat = "no-repeat";
          document.getElementById("backgroundImage").style.backgroundSize= "cover";
          document.getElementById("backgroundImage").style.backgroundPosition= "center";*/
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
