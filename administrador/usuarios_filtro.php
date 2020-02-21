
<?php

require('includes/config.php');
include 'includes/head.php';
$host=DB_HOST; $base=DB_NAME; $user=DB_USER; $pass=DB_PASS;

$turno = $_POST['turno'];
$estado = $_POST['estado'];

if ($estado == null){
    $estado = '1';
}

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
 
 $total_pages_sql = "SELECT COUNT(*) FROM usuarios";
 $resultTotal = mysqli_query($conn,$total_pages_sql);
 $total_rows = mysqli_fetch_array($resultTotal)[0];
 $total_pages = ceil($total_rows / $numPorPagina);
 
 //Datos
 $conn = new mysqli($host, $user, $pass, $base);
 
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 
 
 
    
 $result = $conn->query("SELECT * FROM usuarios WHERE usuario_turnoID = '$turno' AND usuario_registered = '$estado' ORDER BY usuario_dni DESC LIMIT $offset,$numPorPagina ");   

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
                <li class="<?php if ($page <= 1) {
                                echo 'disabled';
                            } ?>" style="padding-left:5px;">
                    <a href="<?php if ($page <= 1) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($page - 1);
                                } ?>">
                        << Anterior</a> </li> <li class="<?php if ($page >= $total_pages) {
                                                                echo 'disabled';
                                                            } ?>" style="padding-left:5px;">
                            <a href="<?php if ($page >= $total_pages) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($page + 1);
                                        } ?>">Siguiente >></a>
                </li>
                <li style="padding-left:5px;">
                    <a href="?pageno=<?php echo $total_pages; ?>">Ultimo</a>
                </li>
            </ul>
        </nav>
    </div>
</div>