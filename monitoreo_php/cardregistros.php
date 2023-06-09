<?php
  include '../conexion.php';

  // Create connection
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  $conn->set_charset('utf8mb4');

  $sql = "SELECT `id`, `fecha_registro`  FROM `prueba_parametros` ORDER BY fecha_registro DESC LIMIT 1";
  if ($resultado = $conn->query($sql)) {  //Se realiza una consulta
	
	if($data=mysqli_fetch_array($resultado)){

        $insertar["id"]=$data['id'];
		$insertar["fecha_registro"]=$data['fecha_registro'];
		$json=$insertar;
    
		}
    else{
        $insertar["id"]='0';
    	$insertar["fecha_registro"]='0';
        $json=$insertar;
	}
}

$resultado -> free();
mysqli_close($conn);
echo json_encode($json);
?>