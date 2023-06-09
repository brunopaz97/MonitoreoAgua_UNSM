<?php
include '../conexion.php';

// Conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if (!$conn) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Consulta los datos de temperatura y humedad de la tabla "Estacion Prosperidad"
$sql = "SELECT `oxig_dis`, `fecha_registro` FROM `prueba_parametros` ORDER BY fecha_registro DESC LIMIT 50";
$result = $conn->query($sql);

// Crea un arreglo JSON con los datos de temperatura y humedad
$data = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data[] = array(
      'oxig_dis' => $row['oxig_dis'],
      'fecha' => $row['fecha_registro']
    );
  }
}
echo json_encode($data);

// Cierra la conexión a la base de datos MySQL
$conn->close();

?>