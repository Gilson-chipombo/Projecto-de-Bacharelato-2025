<?php
 require_once "../Model/connectionBD.php";
session_start();

if (isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);
    $result = mysqli_query($connection, "SELECT * FROM usuarios WHERE username='$username' AND password ='$password'");
    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION['logado'] = true;
        header('Location: ../Views/dashboard.php');
    }else {
        echo "$username $password";
        header('Location: ../');
    }
}

