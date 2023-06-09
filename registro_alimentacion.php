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
        $cant_kg = $_POST["cant_kg"];
        $cant_peces = $_POST["cant_peces"];
        $veces_dia = $_POST["veces_dia"];
        $har_pesc = $_POST["har_pesc"];
        $maiz = $_POST['maiz'];
        $salv_trigo = $_POST["salv_trigo"];
        $fosf_dical = $_POST["fosf_dical"];
        $ace_pesc = $_POST["ace_pesc"];
        $mandi = $_POST["mandi"];
        $har_soya = $_POST['har_soya'];
        $prem_vitm = $_POST["prem_vitm"];
        $prem_miner = $_POST["prem_miner"];
        $salv_arr = $_POST["salv_arr"];
        $pied_caliz = $_POST["pied_caliz"];
        $prot_crud = $_POST["prot_crud"];
        $fib_crud = $_POST["fib_crud"];
        $lip_crud = $_POST["lip_crud"];
        $cost_tot = $_POST["cost_tot"];
        $id_piscigranja = $_POST["selec-pisci"];

        //INSERTAR BD
        $insertar_ingred = "INSERT INTO Composicion_ingrediente (fecha_ingreso, harina_pescado, maiz, salvado_arroz, salvado_trigo, aceite_pescado, mandioca, harina_soya, piedra_caliza, fosfato_dicalcio, premezcla_miner, premezcla_vitam, id_piscigranja)
                        VALUES ('$fecha_ingreso','$har_pesc', '$maiz', '$salv_arr', '$salv_trigo', '$ace_pesc', '$mandi', '$har_soya', '$pied_caliz', '$fosf_dical', '$prem_miner', '$prem_vitm', '$id_piscigranja')";

        if ($conn->query($insertar_ingred) === TRUE) {
            $insertar_freq = "INSERT INTO Frecuencia_alimentacion (fecha_ingreso, nro_peces_kg, nro_kg, veces_dia, id_piscigranja) 
                        VALUES ('$fecha_ingreso','$cant_peces', '$cant_kg', '$veces_dia', '$id_piscigranja')";
            if ($conn->query($insertar_freq) === TRUE) {
                $insertar_prox = "INSERT INTO Composicion_proximal (fecha_ingreso, lipido_crudo, proteina_cruda, fibra_cruda, costo, id_piscigranja) 
                        VALUES ('$fecha_ingreso', '$lip_crud','$prot_crud','$fib_crud','$cost_tot', '$id_piscigranja')";
                if ($conn->query($insertar_prox) === TRUE) {
                    echo "";
                } else {
                    echo "Error: " . $insertar_prox . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $insertar_freq . "<br>" . $conn->error;
            }

        } else {
            echo "Error: " . $insertar_ingred . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>