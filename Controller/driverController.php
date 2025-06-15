<?php
    require_once "../Model/connectionBD.php";
    session_start();
    
    if (isset($_POST["btn_cadastrar"])){
        $photo = "";
        $full_name = $_POST['full_name'];
        $username   = $_POST['username'];
        $distrit  = $_POST['distrit'];
        $city = $_POST['city'];
        $birthday = $_POST['birthday'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $licence_number = $_POST['licence_number'];
        $category = $_POST['category'];
        $licence_validate = $_POST['licence_validate'];
        $experience_time = $_POST['experience_time'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
       
      $result = mysqli_query($connection, "SELECT phone FROM drivers WHERE phone ='$phone'");
       if (mysqli_num_rows($result) > 0){
           $_SESSION['register_error'] = "$email";
           header('Location: ../Views/drivers.php');
        }else {
            $password =  md5($password);
            mysqli_query($connection, "INSERT INTO drivers
            (full_name, username, city, distrit, passwrd, photo, phone, birthday, validate, license_number, category, exp_time)
             VALUES ('$full_name','$username','$city', '$distrit','$password', '$photo', $phone, '$birthday','$licence_validate', $licence_number, '$category', $experience_time)");
            $_SESSION['register_success'] = "Cadastrado com sucesso.";
            header('Location: ../Views/drivers.php');  
        } 
    }  
?>