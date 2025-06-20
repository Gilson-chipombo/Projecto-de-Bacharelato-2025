<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script src="../dist/js/sweetalert.min.js"></script>
</head>
<body class="hold-transition register-page">
<style>
      body{
        background-image: url('../dist/img/financas.jpg');
      }  
</style>
<?php
session_start();
if (!empty( $_SESSION['register_error'])) { ?>
  <script>
      sweetAlert("Insira outro email.","<?php echo $_SESSION['register_error']; ?> já existe no sistema.","error");
  </script>
<?php } $_SESSION['register_error']= ""; ?>


<div class="register-box">

  <div class="card">
    <div class="card-body register-card-body">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>S. Ánalise Financeira</b></a>
    </div>
      <p class="login-box-msg"><strong>Cadastrar um usuário</strong></p>

      <form action="../../Controller/UserController.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Nome de usuário" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Senha" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      
        <div class="row">
          
          <!-- /.col -->
          <div class="col-6">
            
            <a href="../index3.php" class="btn btn-default btn-block"> Cancelar</a>
          </div>

          <div class="col-6">
            <button type="submit" name="btn-cadastrar" class="btn btn-primary btn-block">Cadastrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
