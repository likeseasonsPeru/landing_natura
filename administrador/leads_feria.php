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

$total_pages_sql = "SELECT COUNT(*) FROM tabla_leadsferia";
$resultTotal = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($resultTotal)[0];
$total_pages = ceil($total_rows / $numPorPagina);

//Datos
$conn = new mysqli($host, $user, $pass, $base);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($conn2->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM tabla_leadsferia ORDER BY email_id DESC LIMIT $offset,$numPorPagina");
$conn->set_charset("utf8");
$charset = $conn->character_set_name();



//printf ("El juego de caracteres en uso es %s\n", $charset);
if ($result->num_rows > 0) {
// output data of each row
$contador = $offset;
while($row = $result->fetch_assoc()){
  $contador++;
  $id =  $row['email_id'];
  $proyecto = utf8_encode($row['proyecto']);
  $nombres = utf8_encode($row['nombres']);
  $apellidos = utf8_encode($row['apellidos']);
  $celular = (string)$row['celular'];
  $correo = utf8_encode($row['correo']);
  $distrito= utf8_encode($row['distrito']);
  $fecha_lead= (string)$row['fecha_solicitud'];

  $datosTabla .= "<tr>";
  $datosTabla .= "<td>".$contador."</td>";
  $datosTabla .= "<td>".$proyecto."</td>";
  $datosTabla .= "<td>".$nombres."</td>";
  $datosTabla .= "<td>".$apellidos."</td>";
  $datosTabla .= "<td>".$celular."</td>";
  $datosTabla .= "<td>".$correo."</td>";
  $datosTabla .= "<td>".$distrito."</td>";
  $datosTabla .= "<td>".$fecha_lead."</td>";
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
       <div class="col-6">
          <a class="btn btn-warning" href="leads.php">Leads Web</a>
          <a class="btn btn-warning" href="leads_feria.php">Leads de Feria</a>
       </div>
       <div class="col-6 text-center">
          <a class="btn btn-success" href="exportar.php">Exportar Leads!</a>
       </div>
     </div>
     <div class="row">
         <div class="col-md-12">
             <h2 class="p-2">Número total de Leads: <?= $total_rows; ?></h2>

 					<div id="muestraDatos">
             <table class="table table-bordered table-hover" id='tabla'>
 							<div class="col-xs-12 text-center">
 								<h1>
 									LEADS DE FERIA EXPOURBANIA
 								</h1>
 							</div>
                 <thead>
                     <tr>
 											  <th scope="col">#</th>
                         <th scope="col">Proyecto</th>
                         <th scope="col">Nombres</th>
                         <th scope="col">Apellidos</th>
 												<th scope="col">Celular</th>
                         <th scope="col">Correo</th>
                         <th scope="col">Distrito</th>
                          <th scope="col">Fecha del Lead</th>
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
     var id_modelo = 0;
     var precio_dolares = 0;
     var precio_anio = 2017;

     $('#btnLogOut').click( function(){
             window.location.href = "index.php";
     });


 </script>
 </body>
 </html>
