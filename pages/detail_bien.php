<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Détail Hébergement</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/detail_bien.css">
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
          <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="../index.php?section2">Service</a></li>
          <li class="nav-item"><a class="nav-link active" href="../index.php?sectionbien">Biens</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Avis</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
        <a href="#" class="btn btn-dark">Se déconnecter</a>
      </div>
    </div>
  </nav>
  <!-- fin navbar -->

  <div class="detail-container mt-5">
    <!-- Image hébergement -->
    <img src="../asset/img/herbergement.png" alt="Hébergement" class="hebergement-img mx-5">

    <!-- Infos hébergement -->
    <div class="hebergement-info">
      <div class="hebergement-titre">Maison d’hôte</div>

      <button class="btn-disponible">Disponible</button>

      <div class="localisation">
        <i class="bi bi-geo-alt-fill"></i> Dakar, Parcelles Assainies
      </div>

      <div class="infos">
        <div class="info-item">
          <i class="bi bi-door-open-fill"></i> 4 Chambres
        </div>
        <div class="info-item">
          <i class="bi bi-aspect-ratio-fill"></i> 220 m²
        </div>
      </div>

      <div class="prix">42,500,000 FCFA</div>

      <button class="btn-visiter">Visiter</button>
    </div>
  </div>
  <div style="height:2px;background-color:#DDC7BB;margin-left:500px;margin-right:300px;margin-top:70px;"></div>
  <h5 style="font-family: Montserrat;font-weight: 800;font-size: 24px;line-height: 100%;margin-top:70px;color: #4F3527; ">Description</h5>
  <p style="font-family: Montserrat;font-weight:400;font-size: 24px;line-height: 100%;color: #4F3527;">Maison d’hôte luxueuse avec grand espace situ3 au parcelles assainies près des sapeurs pompier avec une vue sur la mer bien équipe et meuble pour vos séjour les plus beau dans cette banlieue dakaroise </p> <br><br><br><br><br>
  <h1 style="font-family: Montserrat;font-weight: 800;font-size: 40px;line-height: 140%;text-align: center;color: #2B1B12;  ">Voulez vous la visiter ? <br>
    Remplissez ce formulaire SVP !</h1>
  <!-- FORMULAIRE DE VISITE -->
  <div class="container d-flex justify-content-center mt-5 mb-5">
    <form class="form-visite text-center">

      <!-- Ligne date + heure -->
      <div class="d-flex justify-content-center gap-3 mb-4 flex-wrap">
        <input type="date" class="form-control custom-input-date" placeholder="Choisir une date">
        <input type="time" class="form-control custom-input-heure" placeholder="Heure">
      </div>

      <!-- Zone de message -->
      <div class="mb-4">
        <textarea class="form-control custom-textarea" placeholder="Un petit message..."></textarea>
      </div>

      <!-- Bouton envoyer -->
      <button type="submit" class="btn btn-envoyer" style="background-color:#2B1B12;color:white;">Envoyer</button>

    </form>
  </div>
  <?php require_once("footer.php"); ?>