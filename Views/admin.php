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
                    <th>Município</th>
                    <th>Phone</th>
                    <th>Paragem</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Gilson Bravo F. Chipombo</td>
                    <td>gbravo-f</td>
                    <td>Cacuaco</td>
                    <td>935626001</td>
                    <td>Vila de Cacuaco</td>
                    <td class="project-state">
                     <div class="btn-group btn-group-sm">
                          <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                          <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  
                  
        
  
                  </tbody>
                  <tfoot>
                   <tr>
                      <th>Nome completo</th>
                      <th>Username</th>
                      <th>Município</th>
                      <th>Phone</th>
                      <th>Paragem</th>
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