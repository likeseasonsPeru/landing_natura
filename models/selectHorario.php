<div class="fondoForms col-12 np">
  <div class="col-12 text-center topTitle np">
    <h1>
      Bienvenido (a) {{NOMBRE}}
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
              <button class="selectButton" type="button" name="button">
                ELEGIR TURNO
              </button>
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
              <button class="selectButton" type="button" name="button">
                ELEGIR TURNO
              </button>
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
              <button class="selectButton" type="button" name="button">
                ELEGIR TURNO
              </button>
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
<script type="text/javascript">
$(document).ready(function() {
  $('#continuarSelect').click(function(){
    $('.contenedor-datos').css('opacity','0');
    var btn = $('#continuarSelect').val();

    $(".contenedor-datos").fadeOut(500,function(){
      $.ajax({
        url:'models/sendEmail.php',
        type:'POST',
        data:{btn:btn},
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
