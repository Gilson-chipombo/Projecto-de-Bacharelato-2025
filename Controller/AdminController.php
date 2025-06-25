<?php
require_once "../Model/connectionBD.php";
session_start();

if (isset($_POST["btn_cadastrar"])) {
    $full_name   = $_POST['full_name'];
    $username    = $_POST['username'];
    $email       = $_POST['email'];
    $phone       = $_POST['phone'];
    $password    = $_POST['password'];
    $confirmPass = $_POST['confirmPass'];


    // Verificar se as senhas coincidem
    if ($password !== $confirmPass) {
        $_SESSION['register_error'] = "As senhas não coincidem.";
        header('Location: ../Views/admin.php');
        exit();
    }

    // Verifica duplicado
    $hash = md5($password);
    $result = mysqli_query($connection, "SELECT * FROM administrators WHERE email ='$email'");
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['register_error'] = "Email '$email' já existe.";
    } else {
        $query = "INSERT INTO administrators (full_name, username, email, passwrd) 
                  VALUES ('$full_name','$username','$email','$hash')";
        if (mysqli_query($connection, $query)) {
            $_SESSION['register_success'] = "Admin cadastrado com sucesso.";
        } else {
            $_SESSION['register_error'] = "Erro ao cadastrar: " . mysqli_error($connection);
        }
    }
    header('Location: ../Views/admin.php');
    exit();
}
?>