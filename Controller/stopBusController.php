<?php
require_once "../Model/connectionBD.php";
session_start();

if (isset($_POST["btn_cadastrar"])) {
    $stop_name = $_POST['stop_name'];
    $distrit   = $_POST['distrit'];
    $latitude  = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Validação simples
    if (empty($stop_name) || empty($distrit) || empty($latitude) || empty($longitude)) {
        $_SESSION['register_error'] = "Preencha todos os campos obrigatórios.";
        header('Location: ../Views/bus_stops.php');
        exit;
    }

    // Verifica duplicado
    $result = mysqli_query($connection, "SELECT latitude, longitude FROM mini_bus_stop WHERE latitude ='$latitude' AND longitude='$longitude'");
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['register_error'] = "Paragem '$stop_name' já existe.";
    } else {
        $query = "INSERT INTO mini_bus_stop (stop_name, distrit, latitude, longitude) 
                  VALUES ('$stop_name','$distrit','$latitude','$longitude')";
        if (mysqli_query($connection, $query)) {
            $_SESSION['register_success'] = "Paragem cadastrada com sucesso.";
        } else {
            $_SESSION['register_error'] = "Erro ao cadastrar: " . mysqli_error($connection);
        }
    }

    header('Location: ../Views/bus_stops.php');
    exit;
}
?>
