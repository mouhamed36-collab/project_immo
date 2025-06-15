<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Immo - Hébergement de rêve</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-bg: #fff6f0;
      --primary-color: #382c24;
      --secondary-color: #b3886b;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--primary-bg);
      color: var(--primary-color);
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: white;
      padding: 1rem 0;
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
    }

    .nav-link {
      margin-right: 1rem;
      font-weight: 500;
      color: #0c0c0c;
    }

    .nav-link.active {
      color: var(--secondary-color);
    }

    /* HERO */
    .hero {
      padding: 4rem 0;
      background-color: var(--primary-bg);
    }

    .hero-title {
      font-size: 2.8rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .hero-text {
      font-size: 1.1rem;
      color: #555;
      margin-bottom: 1.5rem;
    }

    .btn-primary-custom {
      background-color: var(--primary-color);
      color: white;
      border-radius: 10px;
      padding: 15px 30px;
      border: none;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
        margin-bottom: 250px;

      
    }
    .hero-class-image{
      border-radius: 20px;
      width: 100%;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      
       }
     .hero .col-md-6:last-child {
  flex: 1.2; /* Augmente la largeur de la colonne image (20% de plus) */
}

.hero img {
  width: 120%; /* L’image dépasse un peu la largeur du conteneur */
  max-width: none; /* Pour que la limite 100% ne bloque pas */
  height: auto;
}
    /* SEARCH */
    .search-box {
      background-color: #d9c0af;
      padding: 25px 35px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      max-width: 900px;
      margin: 40px auto;
      border-radius: 18px;
      gap: 20px;
    }

    .input-group {
      display: flex;
      gap: 20px;
      flex-grow: 1;
    }

    .field-container {
      position: relative;
      flex: 1;
    }

    .input-field {
      width: 100%;
      height: 45px;
      padding: 10px 15px;
      border-radius: 10px;
      border: none;
    }

    .input-icon {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
    }

    .search-button {
      background-color: #2d1b13;
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 10px;
      font-weight: bold;
      white-space: nowrap;
    }

    /* INFO SECTION */
    .info-section {
      padding: 5rem 0;
      background-color: white;
    }

    .info-section img {
      border-radius: 20px;
      width: 100%;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    
    }

    .info-title {
      font-weight: 700;
      font-size: 1.8rem;
      margin-bottom: 20px;
    }

    .info-stats {
      background-color: #fff4ec;
      border-radius: 15px;
      padding: 2rem;
      margin-top: 2rem;
    }

    .info-stats h3 {
      font-size: 1.8rem;
      font-weight: bold;
    }

    .info-stats p {
      color: #666;
    }

    @media (max-width: 768px) {
      .hero-title {
        font-size: 2rem;
      }

      .search-box {
        flex-direction: column;
        align-items: stretch;
      }

      .input-group {
        flex-direction: column;
      }

      .search-button {
        width: 100%;
      }
    }
  </style>
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
        <li class="nav-item"><a class="nav-link" href="#">Service</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Biens</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Avis</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
      </ul>
      <a href="#" class="btn btn-outline-dark me-2">Se connecter</a>
      <a href="#" class="btn btn-dark">S'inscrire</a>
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
        <a href="#" class="btn-primary-custom">Se connecter</a>
      </div>
      <div class="col-md-6">
        <img src="/project_immo/asset/img/maison de luxe.png"class="img-fluid" alt="Villa moderne" />
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
