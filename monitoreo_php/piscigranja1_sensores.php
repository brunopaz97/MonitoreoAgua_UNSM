<?php

include '../conexion.php';

// Creacion de una API Key para enlazar al Codigo de Arduino que se cargara al ESP32
$api_key_value = "MonitoreoAgua2023";

$api_key =  $temp = $ph = $oxig_dis = $tds = $turbidez = $nitro_amoniacal = $ion_nitrato = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {

        $temp = test_input($_POST["temp"]);
        $ph = test_input($_POST["ph"]);
        $oxig_dis = test_input($_POST["oxig_dis"]);
        $tds = test_input($_POST["tds"]);
        $turbidez = test_input($_POST["turbidez"]);
        $nitro_amoniacal = test_input($_POST["nitro_amoniacal"]);
        $ion_nitrato = test_input($_POST["ion_nitrato"]);
        
        // Creando Conexion
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Verificando conexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $insertar = "INSERT INTO prueba_parametros (temp, ph, oxig_dis, tds, turbidez, nitro_amoniacal, ion_nitrato, id_Piscigranja) VALUES ('" . $temp . "', '" . $ph . "', '" . $oxig_dis . "', '" . $tds . "', '" . $turbidez . "', '" . $nitro_amoniacal . "', '" . $ion_nitrato . "', '" . $id_Piscigranja . "')";
        
        if ($conn->query($insertar) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $insertar . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>