<?php
header("Content-Type: text/html;charset=utf-8");
require('includes/config.php');
include 'includes/head.php';
$host=DB_HOST; $base=DB_NAME; $user=DB_USER; $pass=DB_PASS;
$fechaprimera = '';
$fechasegunda = '';
$tipoformulario = '';
  $disabled = 'disabled';
  $conn=mysqli_connect($host,$user,$pass,$base);
  // Check connection
  if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      die();
  }

if(isset($_POST['exportarexcel'])){
  $fechapri = $_POST['fechaprimera'];
  $fechaseg = $_POST['fechasegunda'];
  $fechaprimera = $fechapri.' 00:00:00';
  $fechasegunda = $fechaseg.' 24:59:59';
  $tipoformulario = $_POST['exportar'];



if($tipoformulario == 'todos'){
  $disabled = ' ';
  $tituloReporte = 'Reporte de Formularios de Contacto';
  //Datos
  $conn = new mysqli($host, $user, $pass, $base);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  if ($conn2->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $result = $conn->query("SELECT * from tabla_emails WHERE fecha_solicitud>'$fechaprimera' AND fecha_solicitud<'$fechasegunda'");
  $conn->set_charset("utf8");
  $charset = $conn->character_set_name();


  //printf ("El juego de caracteres en uso es %s\n", $charset);
  if ($result->num_rows > 0) {
  // output data of each row
  $contador = 1;
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
}else if($tipoformulario == 'feria'){
  $disabled = ' ';
  $tituloReporte = 'Reporte de Formularios de Feria';
  //Datos
  $conn = new mysqli($host, $user, $pass, $base);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  if ($conn2->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $result = $conn->query("SELECT * from tabla_leadsferia WHERE fecha_solicitud>'$fechaprimera' AND fecha_solicitud<'$fechasegunda'");
  $conn->set_charset("utf8");
  $charset = $conn->character_set_name();


  //printf ("El juego de caracteres en uso es %s\n", $charset);
  if ($result->num_rows > 0) {
  // output data of each row
  $contador = 1;
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
}
}


 ?>

<body class="bg-light">
<header>
    <?php include 'includes/topmenu.php'; ?>
</header>

<div class="container mt-4 p-4 bg-white">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-md-10">
        <a class="btn btn-primary" style="margin-top:20px; margin-bottom:20px;" href="usuarios.php"> <- Regresar </a>
        <form  method="post">
          <div class="espaciadoexportar col-xs-12 col-sm-12 col-md-12 text-left" style="margin-top:30px;">
            <label for="">Seleccione Tipo de Reporte:</label>
            <select id="opcion" class="exportar" name="exportar" required>
              <option value="todos">Formularios Contacto Web</option>
              <option value="feria">Formulario de Feria</option>
            </select>
          </div>
          <div class="espaciadoexportar col-xs-12 col-sm-12 col-md-12 text-left" style="margin-top:30px;" >
            <label for="">Ingrese fecha de inicio del Reporte:</label>
            <input id="fechaprimera"  type="date" name="fechaprimera" required>
          </div>
          <div class="espaciadoexportar col-xs-12 col-sm-12 col-md-12 text-left" style="margin-top:30px;" >
            <label for="">Ingrese fecha de fin del Reporte:</label>
            <input id="fechasegunda" type="date"   name="fechasegunda" required>
          </div>
          <div class="espaciadoexportar col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="botonExportar" style="margin-top:30px;">
              <button id="botontraer" class="btn btn-warning" type="submit" name="exportarexcel">Generar Reporte</button>
            </div>
          </div>
          <div class="aparecerexportar col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <button id="habilitarexportar" class="btn btn-success" style="margin-top:20px;" onclick="tableToExcel('tabla', 'leads')" <?= $disabled; ?>>Exportar .XLS</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <h1>
            <?= $tituloReporte; ?>
          </h1>
          <table class="table table-bordered" id='tabla'>
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
        </div>
    </div>
</div>


<?php
include 'includes/footer.php';
?>
<script>
    var id_modelo = 0;
    var precio_dolares = 0;
    var precio_anio = 2017;

    $('#btnLogOut').click( function(){
        $.post( "functions/logout.php", function( data ) {
            window.location.href = "index.php";
        });
    });


var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()



</script>
</body>
