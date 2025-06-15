<?php
    require_once "../Model/connectionBD.php";
    session_start();
    
    if (isset($_POST["btn-cadastrar"])){
       $username = $_POST['username'];
       $email    = $_POST['email'];
       $password = $_POST['password'];
       
       $result = mysqli_query($connection, "SELECT email FROM usuarios WHERE email ='$email'");
       if (mysqli_num_rows($result) > 0){
           $_SESSION['register_error'] = "$email";
           header('Location: ../Views/pages/register.php');
        }else {
            $cryptoPassword = md5($password);
            mysqli_query($connection, "INSERT INTO usuarios (username, email, password) VALUES ('$username','$email','$cryptoPassword')");
            $_SESSION['register_success'] = "Cadastrado com sucesso.";
            header('Location: ../Views/index3.php');
            
        }
    }  
?>