<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Immo - Hébergement de rêve</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/project_immo/css/header.css" />
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">immo</a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav me-3">
          <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="#section2">Service</a></li>
          <li class="nav-item"><a class="nav-link" href="#sectionbien">Biens</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Avis</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
        <?php
        session_start();
        if (empty($_SESSION['idutilisateur'])) {
          echo '<a href="./pages/page de connexion.php" class="btn btn-outline-dark me-2">Se connecter</a>';
          echo '<a href="./pages/inscription.php" class="btn btn-dark">S\'inscrire</a>';
        } else {
          echo '<a href="http://localhost/project_immo/CRUD/deconnexion.php" style="text-decoration: none; color: white"><button class="btn btn-dark">Se déconnecter</button></a>';
        }
        ?>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section class="hero">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start">
          <h1 class="hero-title">Trouvez<br />l’hébergement <br />de vos rêves</h1>
          <p class="hero-text">
            Découvrez notre sélection organisée de <br>propriétés exquises méticuleusement <br>adaptées à votre vision unique de <br>l'hébergement de vos rêves.
          </p>
          <?php
          if (empty($_SESSION['idutilisateur'])) {
            echo '<a href="./pages/page de connexion.php" class="btn-primary-custom">Se connecter</a>';
          } else {
            echo '<a href="http://localhost/project_immo/CRUD/deconnexion.php" style="text-decoration: none; color: white"><button class="btn btn-dark">Se déconnecter</button></a>';
          }
          ?>
        </div>
        <div class="col-md-6">
          <img src="/project_immo/asset/img/maison de luxe.png" class="img-fluid" alt="Villa moderne" style="width: 110%;" />
        </div>
      </div>
    </div>
  </section>

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

  <!-- INFOS -->
  <section class="info-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
          <img src="/project_immo/asset/img/maison de luxe.png" alt="Maison de luxe" />
        </div>
        <div class="col-md-6">
          <h3 class="info-title">Nous vous aidons à <br />trouver votre <br> hébergement de rêve</h3>
          <p class="text-muted">
            Des cottages confortables aux domaines luxueux, <br>notre équipe dévouée vous guide à chaque étape du <br>voyage, garantissant que l'hébergement de vos rêves <br>devienne réalité.
          </p>
          <div class="row info-stats text-center">
            <div class="col">
              <h3>3K+</h3>
              <p>Hébergements disponibles</p>
            </div>
            <div class="col">
              <h3>1K+</h3>
              <p>Hébergements vendus</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SCRIPT -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>