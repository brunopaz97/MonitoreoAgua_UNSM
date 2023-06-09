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

    if (isset($_POST['guardar_form'])) {
        //DATOS
        $fecha_ingreso = $_POST['fec_reg'];
        $pes_ale = $_POST['pes_ale'];
        $area_estanque = $_POST['are_est'];
        $densidad = $_POST['densidad'];
        $recambio = $_POST['rec_agua'];
        $proteina = $_POST['proteina'];
        $racion = $_POST['rac_ali'];
        $id_piscigranja = $_POST['selec-pisci'];

        //INSERTAR BD
        $insertar_formula = "INSERT INTO Produccion (fecha_ingreso, peso_alevin, area_estanque, densidad, recambio, proteina, racion, id_piscigranja)
                        VALUES ('$fecha_ingreso','$pes_ale', '$area_estanque', '$densidad', '$recambio', '$proteina', '$racion', '$id_piscigranja')";

        if ($conn->query($insertar_formula) === TRUE) {
            echo "";
        } else {
            echo "Error: " . $insertar_formula . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>
