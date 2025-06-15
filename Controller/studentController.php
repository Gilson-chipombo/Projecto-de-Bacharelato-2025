<?php
    require_once "../Model/connectionBD.php";
    session_start();
    
    if (isset($_POST["btn_cadastrar"])){
        $full_name = $_POST['full_name'];
        $username  = $_POST['username'];
        $email     = $_POST['email'];
        $city      = $_POST['city'];
        $phone  = $_POST['phone'];
        $stop_id  = $_POST['stop_id'];
        $distrit = $_POST['distrit'];
        $password = $_POST['password'];
        $confirmPass = $_POST['confirmPass'];
       
        $result = mysqli_query($connection, "SELECT email FROM cadetes WHERE email ='$email'");
        if (mysqli_num_rows($result) > 0){
           $_SESSION['register_error'] = "$email";
           header('Location: ../Views/students.php');
        }else {
            $password = md5($password);
            mysqli_query($connection, "INSERT INTO cadetes (full_name, username, email, city, distrit, passwrd, phone,stop_id)
            VALUES ('$full_name','$username','$email','$city','$distrit','$password','$phone','$stop_id')");
            $_SESSION['register_success'] = "Cadastrado com sucesso.";
            header('Location: ../Views/students.php');    
        }
    }  
?>