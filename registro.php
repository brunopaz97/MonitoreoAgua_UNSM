<?php
 
    $servername = "localhost";
    $dbname = "hostembe_MonitoreoAgua";
    $username = "hostembe_userRoya";
    $password = "SistemaRoya2022";
            
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verificando conexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "Todo mal...";
    }
    if (isset($_POST['action'])) {
        switch($_POST['action']){
            case 'piscigranja':
                $leer_piscigranja = $conn->query("SELECT * FROM Piscigranja");
                $data = array();
                while($key = $leer_piscigranja->fetch_array()){
                    $data[] = $key;
                }
                echo json_encode($data);
            break;

            case 'tilapia':
                $id = addslashes(trim($_POST['id']));
                $leer_tilapia = $conn->query("SELECT * FROM Piscigranja WHERE id = '$id'");
                $data = array();
                while($key = $leer_tilapia->fetch_array()){
                    $data[] = $key;
                }
                echo json_encode($data);
            break;

            case 'cultivo':
                $id = addslashes(trim($_POST['id']));
                $leer_cultivo = $conn->query("SELECT * FROM Piscigranja WHERE id = '$id'");
                $data = array();
                while($key = $leer_cultivo->fetch_array()){
                    $data[] = $key;
                }
                echo json_encode($data);
            break;
        }

        $conn->close();
    }
?>

