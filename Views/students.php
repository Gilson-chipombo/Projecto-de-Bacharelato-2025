<?php include_once "includes/header.php"; ?>
<div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h2 class="m-0">Cadetes <strong>42 Luanda</strong></h2>
            </div>
          </div>
          <br>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a type="submit" href="student_register.php" class="btn btn-primary btn-dark">Cadastrar cadete
                <i class="nav-icon fas fa-graduation-cap"></i>
              </a>
          </div>
          <br>
          <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Tabela de Cadetes</h3>
              </div>
              <div class="card-body">
                <table id="cadetes" class="table table-bordered table-striped ">
                    <thead>
                    <tr>
                      <th>Nome completo</th>
                      <th>Username</th>
                      <th>Município</th>
                      <th>Phone</th>
                      <th>Paragem</th>
                    </tr>
                    </thead>
                     <?php
                        require_once "../Model/connectionBD.php";
                        session_start();

                        // Buscar todas as paragens cadastradas
                        $query = "SELECT * FROM cadetes ORDER BY id DESC";
                        $result = mysqli_query($connection, $query);
                      ?>
                    <tbody>
                      <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                          <td><?= htmlspecialchars($row['full_name']) ?></td>
                          <td><?= htmlspecialchars($row['username']) ?></td>
                          <td><?= htmlspecialchars($row['city']) ?></td>
                          <td><?= htmlspecialchars($row['phone']) ?></td>
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
                        <th>Município</th>
                        <th>Phone</th>
                        <th>Paragem</th>
                     
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