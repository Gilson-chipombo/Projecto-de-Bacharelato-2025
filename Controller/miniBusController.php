<?php
    require_once "../Model/connectionBD.php";
    session_start();
    
    if (isset($_POST["btn_cadastrar"])){
       $brand = $_POST['brand'];
       $model = $_POST['model'];
       $color = $_POST['color'];
       $driver_id        = $_POST['driver_id'];
       $car_registration = $_POST['car_registration'];
       
       $result = mysqli_query($connection, "SELECT car_registration FROM mini_bus WHERE car_registration ='$car_registration'");
       if (mysqli_num_rows($result) > 0){
           $_SESSION['register_error'] = "$car_registration";
           header('Location: ../Views/mini_bus.php');
        }else {
            mysqli_query($connection, "INSERT INTO mini_bus
            (car_registration, color, brand, driver_id, model) VALUES ('$car_registration','$color','$brand', $driver_id, '$model')");
            $_SESSION['register_success'] = "Cadastrado com sucesso.";
            header('Location: ../Views/mini_bus.php');  
        }
    } 
?>