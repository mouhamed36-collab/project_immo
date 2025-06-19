<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Biens Immobiliers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/project_immo/css/biens.css" />
  </head>

      <body>

  <!-- Barre de navigation -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <span>Immo</span>
      </a>
      <div class="collapse navbar-collapse justify-content-center">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="../index.php?#section2">Service</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">Biens</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Avis</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
      </div>
      <button id="btn-deconnecter">Se déconnecter</button>

    </div>
  </nav>
  
  <!-- SEARCH -->
  <div class="search-box">
    <div class="input-group">
      <div class="field-container">
        <input type="text" class="input-field" placeholder="Lieu">
        <img src="https://cdn-icons-png.flaticon.com/512/684/684908.png" alt="Icône lieu" class="input-icon">
      </div>
      <div class="field-container">
        <input type="text" class="input-field" placeholder="Type">
        <img src="https://cdn-icons-png.flaticon.com/512/69/69524.png" alt="Icône type" class="input-icon">
      </div>
    </div>
    <button class="search-button">Chercher...</button>
  </div>
  <div class="container py-5">
    <div class="row g-4 justify-content-center">
    
    

    <!-- Carte 1 -->
    <div class="col-md-4">
      <div class="property-card">
        <img src="../asset/img/MAISON 1.png" class="property-img" alt="Maison 1">
        <div class="property-info">
          <h6><i class="bi bi-geo-alt"></i> Dakar, parcelles assainies</h6>
          <div class="icon-text"><i class="bi bi-house-door"></i> 4 chambres</div>
          <div class="icon-text"><i class="bi bi-aspect-ratio"></i> 3,500 pieds carrés</div>
          <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="#" class="btn-visit">Visiter</a>
            <span class="price">42,500,000 FCFA</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Carte 2 -->
    <div class="col-md-4">
      <div class="property-card">
        <img src="../asset/img/MAISON 2.png" class="property-img" alt="Maison 2">
        <div class="property-info">
          <h6><i class="bi bi-geo-alt"></i> Saint Louis, ville neuve</h6>
          <div class="icon-text"><i class="bi bi-house-door"></i> 3 Rooms</div>
          <div class="icon-text"><i class="bi bi-aspect-ratio"></i> 1,500 pieds carrés</div>
          <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="#" class="btn-visit">Visiter</a>
            <span class="price">18,500,000 FCFA</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Carte 3 -->
    <div class="col-md-4">
      <div class="property-card">
        <img src="../asset/img/MAISON 3.png"class="property-img" alt="Maison 3">
        <div class="property-info">
          <h6><i class="bi bi-geo-alt"></i> Thiès, grand standing</h6>
          <div class="icon-text"><i class="bi bi-house-door"></i> 6 Rooms</div>
          <div class="icon-text"><i class="bi bi-aspect-ratio"></i> 4,000 pieds carrés</div>
          <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="#" class="btn-visit">Visiter</a>
            <span class="price">59,700,000 FCFA</span>
          </div>
        </div>
      </div>
    </div>
  <!-- Carte 1 -->
    <div class="col-md-4">
      <div class="property-card">
        <img src="../asset/img/MAISON 1.png" class="property-img" alt="Maison 1">
        <div class="property-info">
          <h6><i class="bi bi-geo-alt"></i> Dakar, parcelles assainies</h6>
          <div class="icon-text"><i class="bi bi-house-door"></i> 4 chambres</div>
          <div class="icon-text"><i class="bi bi-aspect-ratio"></i> 3,500 pieds carrés</div>
          <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="#" class="btn-visit">Visiter</a>
            <span class="price">42,500,000 FCFA</span>
          </div>
        </div>
      </div>
    </div>
      <!-- Carte 2 -->
    <div class="col-md-4">
      <div class="property-card">
        <img src="../asset/img/MAISON 2.png" class="property-img" alt="Maison 2">
        <div class="property-info">
          <h6><i class="bi bi-geo-alt"></i> Saint Louis, ville neuve</h6>
          <div class="icon-text"><i class="bi bi-house-door"></i> 3 Rooms</div>
          <div class="icon-text"><i class="bi bi-aspect-ratio"></i> 1,500 pieds carrés</div>
          <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="#" class="btn-visit">Visiter</a>
            <span class="price">18,500,000 FCFA</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Carte 3 -->
    <div class="col-md-4">
      <div class="property-card">
        <img src="../asset/img/MAISON 3.png" class="property-img" alt="Maison 3">
        <div class="property-info">
          <h6><i class="bi bi-geo-alt"></i> Thiès, grand standing</h6>
          <div class="icon-text"><i class="bi bi-house-door"></i> 6 Rooms</div>
          <div class="icon-text"><i class="bi bi-aspect-ratio"></i> 4,000 pieds carrés</div>
          <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="#" class="btn-visit">Visiter</a>
            <span class="price">59,700,000 FCFA</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

      <?php
      include_once '../pages/footer.php';
      ?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      </body>

</html>