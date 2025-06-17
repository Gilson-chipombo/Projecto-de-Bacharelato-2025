<?php include_once "includes/header.php"; ?>
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0">Paragens do mini autocarro</h2>
        </div>
      </div>
      <br>

      <!-- Mensagens de sucesso ou erro -->

      <?php if (isset($_SESSION['register_error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['register_error']; unset($_SESSION['register_error']); ?></div>
      <?php endif; ?>

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
                <input type="text" name="stop_name" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Município</label>
                <select class="form-control selectMunicipio" name="distrit" required>
                  <option value="">Selecionar município</option>
                  <option>Luanda</option>
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
                  <label>Latitude</label>
                  <input type="text" id="latitude" name="latitude" class="form-control" readonly required>
                </div>
                <div class="col">
                  <label>Longitude</label>
                  <input type="text" id="longitude" name="longitude" class="form-control" readonly required>
                </div>
              </div>

              <div class="form-group">
                <button type="button" class="btn btn-info" onclick="openMap()">Selecionar no mapa</button>
              </div>

              <div id="mapModal" style="width: 100%; height: 400px; display: none; border: 1px solid #ccc; border-radius: 8px; margin-bottom: 20px;"></div>

              <div class="form-group col-md-3">
                <button type="submit" name="btn_cadastrar" class="btn btn-primary btn-dark">
                  Cadastrar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <?php
        require_once "../Model/connectionBD.php";
        session_start();

        // Buscar todas as paragens cadastradas
        $query = "SELECT * FROM mini_bus_stop ORDER BY id DESC";
        $result = mysqli_query($connection, $query);
      ?>

      <table class="table table-bordered table-striped">
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
             <?php while ($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?= htmlspecialchars($row['stop_name']) ?></td>
                <td><?= htmlspecialchars($row['distrit']) ?></td>
                <td><?= htmlspecialchars($row['latitude']) ?></td>
                <td><?= htmlspecialchars($row['longitude']) ?></td>
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
      </table>
    </div>
  </div>
</div>

<!-- Leaflet JS e Geocoder -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>
  let mapInitialized = false;
  let map;
  let marker;

  function openMap() {
    const mapDiv = document.getElementById('mapModal');
    mapDiv.style.display = 'block';

    if (!mapInitialized) {
      map = L.map('mapModal').setView([-8.8383, 13.2344], 12); // Luanda como centro

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
      }).addTo(map);

      // Criar o marcador arrastável
     const redMarkerIcon = L.divIcon({
      className: 'custom-marker',
      html: `
        <svg width="30" height="40" viewBox="0 0 30 40" xmlns="http://www.w3.org/2000/svg">
          <path d="M15 0C7 0 0 7 0 15c0 11.25 15 25 15 25s15-13.75 15-25C30 7 23 0 15 0z" fill="red"/>
          <circle cx="15" cy="15" r="6" fill="white"/>
        </svg>
      `,
      iconSize: [30, 40],
      iconAnchor: [15, 40]
    });

marker = L.marker([-8.8383, 13.2344], {
  draggable: true,
  icon: redMarkerIcon
}).addTo(map)

      marker.on('dragend', function () {
        const latlng = marker.getLatLng();
        setCoordinates(latlng);
      });

      // Campo de busca
      L.Control.geocoder({
        defaultMarkGeocode: false
      })
      .on('markgeocode', function (e) {
        const latlng = e.geocode.center;
        marker.setLatLng(latlng);
        map.setView(latlng, 16);
        setCoordinates(latlng);
      })
      .addTo(map);

      mapInitialized = true;
    }

    // Ajustar o tamanho e coordenadas iniciais
    setTimeout(() => {
      map.invalidateSize();
      const latlng = marker.getLatLng();
      setCoordinates(latlng);
    }, 300);
  }

  function setCoordinates(latlng) {
    document.getElementById('latitude').value = latlng.lat.toFixed(6);
    document.getElementById('longitude').value = latlng.lng.toFixed(6);
  }
</script>

<?php include_once "includes/footer.php"; ?>
