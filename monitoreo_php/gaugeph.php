<?php
  include '../conexion.php';

  // Create connection
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  $conn->set_charset('utf8mb4');

  $sql = "SELECT ph FROM `prueba_parametros` ORDER BY fecha_registro DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);

  // create data array
  $data = [];
  $data[] = ["", "Valor"];

  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      $data[] = ["pH", (float)$row["ph"]];
  }

  mysqli_close($conn);

  // write data array to page
  echo json_encode($data);
?>