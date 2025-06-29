<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Détail Hébergement</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #f5f5f5;
      padding: 40px;
    }

    .detail-container {
      display: flex;
      gap: 40px;
    }

    .hebergement-img {
      width: 543px;
      height: 465px;
      object-fit: cover;
      border-radius: 12px;
    }

    .hebergement-info {
      max-width: 600px;
    }

    .hebergement-titre {
      font-family: 'Montserrat', sans-serif;
      font-weight: 800;
      font-size: 36px;
      color: #4F3527;
      margin-bottom: 10px;
    }

    .btn-disponible {
      width: 176px;
      height: 47px;
      border-radius: 20px;
      background-color: #CFF7D3;
      font-family: 'Montserrat', sans-serif;
      font-style: italic;
      font-weight: 500;
      font-size: 24px;
      color: #4F3527;
      border: none;
      margin-bottom: 20px;
    }

    .localisation {
      display: flex;
      align-items: center;
      font-weight: 700;
      font-size: 24px;
      color: #4F3527;
      padding: 10px 15px;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .localisation i {
      margin-right: 10px;
    }

    .infos {
      display: flex;
      gap: 30px;
      margin-bottom: 20px;
      margin-left:65px;
    }

    .info-item {
      display: flex;
      align-items: center;
      font-size: 18px;
      color: #2B1B12;
      font-weight: 600;
    }

    .info-item i {
      margin-right: 8px;
    }

    .prix {
      color: #4F3527;
      width: 434px;
      height: 87px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family:sans-serif;
      font-weight:600;
      font-size: 48px;
      margin-bottom: 20px;
      border-radius: 10px;
    }

    .btn-visiter {
      width: 298px;
      height: 52px;
      border-radius: 30px;
      background-color: #2B1B12;
      color: white;
      font-size: 18px;
      font-weight: 600;
      border: none;
      margin-left:150px;
    }
    /* formulaire */
    .form-visite {
  max-width: 600px;
  width: 100%;
}

.custom-input-date {
  width: 312px;
  height: 56px;
  background-color: #DDC7BB;
  border: 1px solid #1D1B20;
  border-radius: 4px;
  padding: 10px;
  
}

.custom-input-heure {
  width: 93px;
  height: 48px;
  background-color: #DDC7BB;
  border: 1px solid #1D1B20;
  border-radius: 6px;
  padding: 6px 11px;
  margin-right:170px;

}

.custom-textarea {
  width: 505px;
  height: 160px;
  background-color: #DDC7BB;
  border: 1px solid #1D1B20;
  border-radius: 8px;
  padding: 10px;
  resize: none;
}

.btn-envoyer {
  width: 156px;
  height: 58px;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  font-weight: 600;
}
/* css du navbar */
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

.nav-link:hover {
    color: var(--secondary-color);
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
        <a href="./pages/inscription.php" class="btn btn-dark">S'inscrire</a>
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
  <h5 style="font-family: Montserrat;font-weight: 800;font-size: 24px;line-height: 100%;margin-top:70px;color: #4F3527; " >Description</h5>
  <p style="font-family: Montserrat;font-weight:400;font-size: 24px;line-height: 100%;color: #4F3527;">Maison d’hôte luxueuse avec grand espace situ3 au parcelles assainies près des sapeurs pompier avec une vue sur la mer bien équipe et meuble pour  vos séjour les plus beau dans cette banlieue dakaroise </p> <br><br><br><br><br>
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
    <button type="submit" class="btn btn-envoyer"style="background-color:#2B1B12;color:white;">Envoyer</button>

  </form>
</div>
<?php require_once("footer.php");?>