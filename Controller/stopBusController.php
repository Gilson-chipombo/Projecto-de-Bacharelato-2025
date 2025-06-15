<?php
    require_once "../Model/connectionBD.php";
    session_start();
    
    if (isset($_POST["btn_cadastrar"])){
       $stop_name = $_POST['stop_name'];
       $destrit   = $_POST['distrit'];
       $latitude  = $_POST['latitude'];
       $longitude = $_POST['longitude'];
       
       $result = mysqli_query($connection, "SELECT stop_name FROM mini_bus_stop WHERE stop_name ='$stop_name'");
       if (mysqli_num_rows($result) > 0){
           $_SESSION['register_error'] = "$email";
           header('Location: ../Views/bus_stops.php');
        }else {
            mysqli_query($connection, "INSERT INTO mini_bus_stop
             (stop_name, distrit, latitude, longitude) VALUES ('$stop_name','$distrit','$latitude', '$longitude')");
            $_SESSION['register_success'] = "Cadastrado com sucesso.";
            header('Location: ../Views/bus_stops.php');  
        }
        
        echo "$stop_name $destrit $latitude $longitude";
    }  
?>