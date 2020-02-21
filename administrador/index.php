<?php
include 'includes/head.php';

 ?>
 <body>
 <div class="container py-5">
     <div class="row">
         <div class="col-md-12">
             <h2 class="text-center mb-4">Gestor de Leads</h2>
             <div class="row">
                 <div class="col-md-6 mx-auto">
                     <!-- form card login -->
                     <div class="card rounded-0">
                         <div class="card-header text-center">
                             <h3 class="mb-0">Login</h3>
                         </div>
                         <div class="card-body">
                             <form  class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                 <div class="form-group">
                                     <label for="correo">Usuario</label>
                                     <input type="text" class="form-control form-control-lg rounded-0" name="correo" id="correo" required="">
                                     <div class="invalid-feedback">Ingrese un usuario válido.</div>
                                 </div>
                                 <div class="form-group">
                                     <label>Contraseña</label>
                                     <input type="password" class="form-control form-control-lg rounded-0" name="psw" id="psw" required="" autocomplete="new-password">
                                     <div class="invalid-feedback">Ingrese su contraseña.</div>
                                 </div>
                                 <button type="button" class="btn btn-success btn-block" id="btnLogin">Ingresar</button>
                                 <div class="form-group text-center">
                                  <p class="errorDatos">Credenciales no válidas</p>
                                 </div>
                             </form>
                         </div>
                         <!--/card-block-->
                     </div>
                     <!-- /form card login -->
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script>
     $("#btnLogin").click(function(event) {

         //Fetch form to apply custom Bootstrap validation
         var form = $("#formLogin");
         var usuario = $("#correo").val();
         var pass = $("#psw").val();

         if (form[0].checkValidity() === false) {
             event.preventDefault();
             event.stopPropagation();
         }else{
           if(usuario =='admin_natura' && pass == 'natura_2020%'){
             $('.errorDatos').css('opacity',0);
             window.location.href = "usuarios.php";
           }else{
             $('.errorDatos').css('opacity',1);
           }
         }

         form.addClass('was-validated');
     });
 </script>
 </body>
 </html>
