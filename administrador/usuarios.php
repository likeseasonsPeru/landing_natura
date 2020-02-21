<?php
header("Content-Type: text/html;charset=utf-8");
require('includes/config.php');
include 'includes/head.php';
$host=DB_HOST; $base=DB_NAME; $user=DB_USER; $pass=DB_PASS;

if (isset($_GET['pageno'])) {
   $page = $_GET['pageno'];
} else {
  $page = 1;
}

$numPorPagina = 50;
$offset = ($page-1) * $numPorPagina;

$conn=mysqli_connect($host,$user,$pass,$base);
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

$total_pages_sql = "SELECT COUNT(*) FROM usuarios WHERE usuario_registered != '0'";
$resultTotal = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($resultTotal)[0];
$total_pages = ceil($total_rows / $numPorPagina);

//Datos
$conn = new mysqli($host, $user, $pass, $base);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM usuarios, turnos WHERE usuario_turnoID = turno_id AND usuario_registered = 1 ORDER BY usuario_dni DESC LIMIT $offset,$numPorPagina ");
$conn->set_charset("utf8");
$charset = $conn->character_set_name();
$datosTabla = '';
//printf ("El juego de caracteres en uso es %s\n", $charset);
if ($result->num_rows > 0) {
// output data of each row
$contador = $offset;
while($row = $result->fetch_assoc()){
  $contador++;
  $dni = $row['usuario_dni'];
  $nombres = $row['usuario_nombre'];
  $gerencia = $row['usuario_gerencia'];
  $sector = $row['usuario_sector'];
  $nivel = $row['usuario_nivel'];
  $codigo_cn = $row['usuario_cod_cn'];

  $datosTabla .= "<tr>";
  $datosTabla .= "<td>".$dni."</td>";
  $datosTabla .= "<td>".$nombres."</td>";
  $datosTabla .= "<td>".$gerencia."</td>";
  $datosTabla .= "<td>".$sector."</td>";
  $datosTabla .= "<td>".$codigo_cn."</td>";
  $datosTabla .= "<td>".$nivel."</td>";
  $datosTabla .= "</tr>";
  }
}else {
    echo "0 results";
}
 ?>
 <body class="bg-light">
 <header>

 </header>

 <div class="container mt-4 p-4 bg-white">
     <div class="row">
       <div class="text-right col-12">
         <a class="btn btn-danger" href="index.php">Cerrar Sesión</a>
       </div>
     </div>

     <div class="row text-center">

     <label for="forasistencia" class="col-1 col-form-label">Estado</label>
      <select class='col-2 form-control' id="estado" name="estadolist"">
        <option value="1">Registrados</option>
        <option value="2">Asistentes</option>
      </select>

      <label for="forturno" class="col-1 col-form-label">Turno </label>
      <select class='col-2 form-control' id="turno" name="turnolist"">
        <option value="turno1">Turno 1</option>
        <option value="turno2">Turno 2</option>
        <option value="turno3">Turno 3</option>
      </select>

        <div class="col-2 ">
           <btn id= 'filtrar' class="btn btn-primary" href="usuarios.php">Filtrar</btn>
        </div>

        <div class="col-3 mb-3">
           <a class="btn btn-success" href="usuarios.php">Total</a>
        </div>
      

         <div class="col-md-12">
             <h2 class="p-2">Número total de usuarios: <?= $total_rows; ?></h2>

 					<div id="muestraDatos">
             <table class="table table-bordered table-hover" id='tabla'>
 							<div class="col-xs-12 text-center">

 							</div>
                 <thead>
                     <tr>
                         <th scope="col">DNI</th>
                         <th scope="col">Nombres</th>
                         <th scope="col">Gerencia</th>
 												 <th scope="col">Sector</th>
                         <th scope="col">Codigo_cn</th>
                         <th scope="col">Nivel</th>
                     </tr>
                 </thead>
 								<tbody>
 										<?= $datosTabla; ?>
 								</tbody>
 						</table>

 								  <div class="col-xs-12 text-center">
 										<nav style="width:100%;">
                      <ul class="pagination">
                      <li style="padding-left:5px;">
                        <a href="?pageno=1">Primero</a>
                      </li>
                      <li class="<?php if($page <= 1){ echo 'disabled'; } ?>" style="padding-left:5px;">
                          <a href="<?php if($page <= 1){ echo '#'; } else { echo "?pageno=".($page - 1); } ?>"><< Anterior</a>
                      </li>
                      <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>" style="padding-left:5px;">
                          <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?pageno=".($page + 1); } ?>">Siguiente >></a>
                      </li>
                      <li style="padding-left:5px;">
                        <a href="?pageno=<?php echo $total_pages; ?>">Ultimo</a>
                      </li>
                  </ul>
 									 </nav>
 									</div>
               </div>
           <!--  <button class="btn btn-warning" style="margin-top:20px;" onclick="exportTableToExcel('tabla', 'registros')">Exportar .XLS</button> -->
         </div>
     </div>
 </div>

 <script>
  $(document).ready(function() {
    var estado = '1', turno= 'turno1';
    $('select#estado').on('change',function(){
       estado = $(this).val();
    });

    $('select#turno').on('change',function(){
        turno = $(this).val();
    });

    $('#filtrar').click(function(){
        $.ajax({
          url:'usuarios_filtro.php',
          type:'POST',
          data:{estado, turno},
          datatype:'html',
          success:function(datahtml){
            $('#muestraDatos').html(datahtml);
          },error: function(){
            $('#muestraDatos').html('<p>error al cargar desde Ajax</p>');
          }
        });
      $( "#muestraDatos" ).fadeIn(500, function() {
        $('#muestraDatos').css('opacity','1');
      });
    });
  });

 </script>
 </body>
 </html>
