<?php
require_once "../Model/connectionBD.php";
session_start();

if (isset($_POST["btn_cadastrar"])) {
    $full_name   = $_POST['full_name'];
    $username    = $_POST['username'];
    $email       = $_POST['email'];
    $city        = $_POST['city'];
    $phone       = $_POST['phone'];
    $stop_id     = $_POST['stop_id'];
    $distrit     = $_POST['distrit'];
    $password    = $_POST['password'];
    $confirmPass = $_POST['confirmPass'];

    // Verificar se as senhas coincidem
    if ($password !== $confirmPass) {
        $_SESSION['register_error'] = "As senhas não coincidem.";
        header('Location: ../Views/students.php');
        exit();
    }

    // Verificar se o email já existe
    $result = mysqli_query($connection, "SELECT email FROM cadetes WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['register_error'] = "$email já está registrado.";
        header('Location: ../Views/students.php');
        exit();
    }

    // Criptografar a senha
    $hashedPassword = md5($password); // Você pode usar password_hash() se quiser algo mais moderno

    // Usar prepared statement para evitar SQL injection
    $stmt = $connection->prepare("INSERT INTO cadetes (full_name, username, email, city, distrit, passwrd, phone, stop_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssi", $full_name, $username, $email, $city, $distrit, $hashedPassword, $phone, $stop_id);

    if ($stmt->execute()) {
        $_SESSION['register_success'] = "Cadastrado com sucesso.";
    } else {
        $_SESSION['register_error'] = "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
    header('Location: ../Views/students.php');
    exit();
}
?>
