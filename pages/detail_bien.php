<?php
session_start();
require_once __DIR__ . '../../CRUD/crud_visite.php';
require_once __DIR__ . '../../CRUD/envoiyer_email.php';
require_once __DIR__ . '../../CRUD/crud_notification.php';
include_once("../CRUD/biendModel.php");
$bien = getBienById($_GET['id']);
$id = $_SESSION['idutilisateur'] ?? null;
if (empty($_SESSION['idutilisateur'])) {
  header('Location: ./page de connexion.php');
  exit;
}
// traitement du formulaire de visite
if (isset($_POST['envoyer_visite'])) {
  $date = htmlspecialchars(trim($_POST['date'] ?? ''));
  $heure = htmlspecialchars(trim($_POST['heure'] ?? ''));
  $date_heure = $date . ' ' . $heure;
  $message = htmlspecialchars(trim($_POST['message'] ?? ''));

  if (empty($date) || empty($heure) || empty($message)) {
    echo "<script>alert('Veuillez remplir tous les champs');</script>";
  } else {
    if (ajoutVisite($date_heure, 'planifier', 'visite de renseignement pour' . ' ' . $bien['titre'], $id, $_GET['id'])) {
      envoyerEmailVisite(getemailUtilisateur($id), getnomUtilisateur($id), $date_heure, $bien['titre'] . ' ' . $bien['localisation']);
      echo "<script>alert('Visite planifier avec success');</script>";
    }
  }
}
?>

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
        <a href="../CRUD/deconnexion.php" style="text-decoration: none; color: white"><button class="btn btn-dark" id="btn-deconnecter">Se déconnecter</button></a>
      </div>
    </div>
  </nav>
  <!-- fin navbar -->
  <div class="container mt-5">
    <div class="detail-container mt-5">
      <!-- Image hébergement -->
      <img src="http://localhost/project_immo/CRUD/<?= $bien['photo'] ?>" alt="Hébergement" class="hebergement-img mx-5">

      <!-- Infos hébergement -->
      <div class="hebergement-info">
        <div class="hebergement-titre"><?= $bien['titre'] ?></div>

        <button class="<?= $bien['status']=='en visite' ? "visite" : ucfirst($bien['status']) ?>"><?= ucfirst($bien['status']) ?></button>

        <div class="localisation">
          <i class="bi bi-geo-alt-fill"></i> <?= htmlspecialchars($bien['localisation']) ?>
        </div>

        <div class="infos">
          <div class="info-item">
            <i class="bi bi-aspect-ratio-fill"></i> <?= htmlspecialchars($bien['surface']) ?> m²
          </div>
        </div>

        <div class="prix"><?= $bien['prix'] ?> FCFA</div>

        <button class="btn-visiter"><a href="#form" style="text-decoration: none; color: white">Visiter</a></button>
      </div>
    </div>
    <div style="height:2px;background-color:#DDC7BB;margin-left:500px;margin-right:300px;margin-top:70px;"></div>
    <h5 style="font-family: Montserrat;font-weight: 800;font-size: 24px;line-height: 100%;margin-top:70px;color: #4F3527; ">Description</h5>
    <p style="font-family: Montserrat;font-weight:400;font-size: 24px;line-height: 100%;color: #4F3527;"><?= $bien['description'] ?> </p> <br><br><br><br><br>
    <h1 id="form" style="font-family: Montserrat;font-weight: 800;font-size: 40px;line-height: 140%;text-align: center;color: #2B1B12;  ">Voulez vous la visiter ? <br>
      Remplissez ce formulaire SVP !</h1>
    <!-- FORMULAIRE DE VISITE -->
    <div class="container d-flex justify-content-center mt-5 mb-5">
      <form class="form-visite text-center" action="" method="POST">

        <!-- Ligne date + heure -->
        <div class="d-flex justify-content-center gap-3 mb-4 flex-wrap">
          <input type="date" class="form-control custom-input-date" placeholder="Choisir une date" name="date" required>
          <input type="time" class="form-control custom-input-heure" placeholder="Heure" name="heure" required>
        </div>

        <!-- Zone de message -->
        <div class="mb-4">
          <textarea class="form-control custom-textarea" placeholder="Un petit message..." name="message" required></textarea>
        </div>

        <!-- Bouton envoyer -->
        <button type="submit" name="envoyer_visite" class="btn btn-envoyer" style="background-color:#2B1B12;color:white;">Envoyer</button>

      </form>
    </div>
    <?php require_once("footer.php"); ?>