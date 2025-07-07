<?php
session_start();
if (empty($_SESSION['idutilisateur'])) {
  header('Location: ./page de connexion.php');
  exit;
}
include_once("../CRUD/biendModel.php");
$biens = getAllBiens();
?>
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
      <a href="../CRUD/deconnexion.php" style="text-decoration: none; color: white"><button id="btn-deconnecter">Se déconnecter</button></a>

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
      <?php
      // Affichage des biens immobiliers
      foreach ($biens as $bien) : ?>
        <div class="col-md-4">
          <div class="property-card">
            <img src="http://localhost/project_immo/CRUD/<?= $bien['photo'] ?>" class="property-img" alt="<?= $bien['titre'] ?>">
            <div class="property-info">
              <h6><i class="bi bi-geo-alt"></i> <?= htmlspecialchars($bien['localisation']) ?></h6>
              <div class="icon-text"><i class="bi bi-house-door"></i> <?= htmlspecialchars($bien['type']) ?></div>
              <div class="icon-text"><i class="bi bi-aspect-ratio"></i> <?= htmlspecialchars($bien['surface']) ?> m²</div>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <a href="detail_bien.php?id=<?= $bien['idbien'] ?>" class="btn-visit">Visiter</a>
                <span class="price"><?= number_format($bien['prix'], 0, ',', ' ') ?> FCFA</span>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>


    </div>
  </div>

  <?php
  include_once '../pages/footer.php';
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>