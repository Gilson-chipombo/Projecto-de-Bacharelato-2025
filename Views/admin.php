<?php include_once "includes/header.php"; ?>
<div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h2 class="m-0">Administradores do sistema</h2>
            </div>
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a type="submit" href="admin_register.php" class="btn btn-primary btn-dark">Cadastrar Admin.</a>
          </div>

          <br>
          <?php
            require_once "../Model/connectionBD.php";
            session_start();

            // Buscar todas as paragens cadastradas
            $query = "SELECT * FROM administrators ORDER BY id DESC";
            $result = mysqli_query($connection, $query);
          ?>
          <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Tabela de Administradores</h3>
              </div>
              <div class="card-body">
                
                <table id="cadetes" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Nome completo</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th></th>
                  </tr>
                  </thead>
                   <tbody>
                      <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                          <td><?= htmlspecialchars($row['full_name']) ?></td>
                          <td><?= htmlspecialchars($row['username']) ?></td>
                          <td><?= htmlspecialchars($row['email']) ?></td>
                          <td>
                              <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                  </tbody>
                  <tfoot>
                   <tr>
                      <th>Nome completo</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
<?php include_once "includes/footer.php"; ?>