<?php include_once "includes/header.php"; ?>
<div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h2 class="m-0">Paragens do mini autocarro</h2>
            </div>
          </div>
          <br>
        
          <div class="col-md-12">
           <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Cadastrar Paragem</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="card-body collapse">
                <form action="../Controller/stopBusController.php" method="post">
                <div class="form-group">
                  <label>Nome da paragem</label>
                  <input type="text" id="inputEstimatedBudget" name ="stop_name" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputSpentBudget">Município</label>
                  <select class="form-control selectMunicipio" name="distrit" data-dropdown-css-class="select2-dark" style="width: 100%;">
                      <option selected="selected">Luanda</option>
                      <option>Icolo-e-Bengo</option>
                      <option>Quiçama</option>
                      <option>Cacuaco</option>
                      <option>Cazenga</option>
                      <option>Viana</option>
                      <option>Belas</option>
                      <option>Kilamba Kiaxi</option>
                      <option>Talatona</option>
                    </select>
                </div>
                <div class="form-group col-md-7 form-row">
                  <div class="col">
                    <label for="inputEstimatedDuration">Latitude</label>
                    <input type="text" id="inputEstimatedDuration" name="latitude" class="form-control">
                  </div>
                  <div class="col">
                    <label for="inputEstimatedDuration">Longitude</label>
                    <input type="text" id="inputEstimatedDuration" name="longitude" class="form-control">
                  </div>
                </div>
                
                <div class="form-group col-md-3 ">
                    <button type="submit" name="btn_cadastrar" class="btn btn-primary btn-dark">
                      Cadastrar
                      <i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>
                    </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <table id="cadetes" class="table table-bordered table-striped ">
              <thead>
              <tr>
                  <th>Nome da paragem</th>
                  <th>Município</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              <tr>

              </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>Nome da paragem</th>
                  <th>Município</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th></th>
                </tr>
              </tfoot>
          </table>












        </div>
      </div>
    </div>
  </div>
<?php include_once "includes/footer.php"; ?>