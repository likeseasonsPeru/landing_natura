
<section class="paddingPage">
  <div class="row posElements">
    <div class="espaceMovil col-12 order-2 col-md-6  col-lg-6 col-xl-2 order-md-2 order-lg-2 order-xl-1 col-xl-2">
      <img class="img-responsive posLogo" width="180px" src="app/images/logo_natura.png" alt="">
    </div>
    <div class="espaceMovil col-12 order-3 col-md-6 col-lg-6 col-xl-2 order-md-3 order-lg-3 order-xl-2">
      <div class="textSlogan">El lugar es<br>mas bonito<br>contigo</div>
    </div>
    <div class="contenedor-datos col-12 order-1 order-md-1 col-lg-12 offset-lg-0 order-lg-1 order-xl-3 col-xl-7 offset-xl-1">
      <div class="fondoForms col-12 np">
        <div class="col-12 text-center topTitle">
          <h1>
            MARCAR ASSISTENCIA
          </h1>
          <div class="col-12 col-md-8 offset-md-2">
            <p class="textoRegistro">
              Ingresa tu número de DNI o CODIGO DE CONSULTORA
            </p>
          </div>
          <!--div class="lineHeader">
          </div-->
        </div>
        <div class="col-12 col-sm-12 col-md-12 offset-md-0 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 posFormIngreso">
          <form class="formDNI" method="post">
            <input id="dni" class="inputForm" type="text" name="dni" maxlength="8">
            <p id="errorDNI" class="errorStyle">
              Debe ingresar su DNI o su Código de consultora
            </p>
            <div class="col-12 espaceBtnForm np text-center">
              <button class="btnFormulario" type="button" name="button" value="1">
                VERIFICAR
              </button>
            </div>
          </form>
        </div>
      </div>

            
      <!-- Modal -->
      <div class="modal fade" id="modalAssistance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="Assistance-title">Nuevo turno</h5>
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

    </div>
  </div>


    
<script type="text/javascript">
$(document).ready(function () {
  //NÚMERO DE DOCUMENTO
  var flag = true;
  $("#dni").keydown(function (e) {
    // Permite: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
      // Permite: Ctrl+A
      (e.keyCode == 65 && e.ctrlKey === true) ||
      // Permite: home, end, left, right
      (e.keyCode >= 35 && e.keyCode <= 39)) {
      // solo permitir lo que no este dentro de estas condiciones es un return false
      return;
    }
    // Aseguramos que son numeros
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
    }
  });

  $('.btnFormulario').click(function () {

    var dni = $('#dni').val();
    if (dni.length < 1) {
      $('#errorDNI').css('opacity', '1');
    } else {
        $.ajax({
          url: 'assistance/verifyAssistance.php',
          type: 'POST',
          data: {dni: dni},
          success: function (response) {
            if (response.trim() == 'NoEncontrado') {
              // PINTAR UN MODAL
              $('#Assistance-title').text('El DNI o codigo que ingreso no se encuentra en la lista');
              $('#modalAssistance').modal('show');
              console.log('usuario fallido');
            }else if (response.trim() == 'NoRegistrado'){
              // pintar otro modal
              $('#Assistance-title').text('El usuario con este DNI o codigo no se registro para el evento');
              $('#modalAssistance').modal('show');
              console.log(response.trim());
            }else if (response.trim() == 'YaRegistrado'){
              $('#Assistance-title').text('Su asistencia ya ha sido marcada');
              $('#modalAssistance').modal('show');
              console.log(response.trim());
            }else {
              $('.contenedor-datos').css('opacity', '0');
              $('#errorDNI').css('opacity', '0');
              $(".contenedor-datos").fadeOut(500, function () {
                var name = response.trim()
                $.ajax({
                  url: 'assistance/assistance.php',
                  type: 'POST',
                  data: {dni, name},
                  datatype: 'html',
                  success: function (datahtml) {
                    $('body').css("background-image", "url('app/images/background_madrenatura2.png')");
                    $('body').css('background-size', 'cover');
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
                  }, error: function () {
                    $('.contenedor-datos').html('<p>error al cargar desde Ajax</p>');
                  }
                })
              });
              $(".contenedor-datos").fadeIn(500, function () {
                $('.contenedor-datos').css('opacity', '1');
              });
            }
          }, error: function () {
            $('.contenedor-datos').html('<p>error al cargar desde Ajax</p>');
          }
        });
    }

  });
});

</script>
