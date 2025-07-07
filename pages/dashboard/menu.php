<?php
session_start();

// Vérifie que la session contient un utilisateur et que son rôle est admin
if (!isset($_SESSION['utilisateur']) || $_SESSION['utilisateur']['role'] !== 'admin') {
  header('Location: ../../pages/page de connexion.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/dashboard/menu.css">
  <link rel="stylesheet" href="../../css/dashboard/gestions_bien.css">
  <link rel="stylesheet" href="../../css/dashboard/dashboard-notification.css" />
  <link rel="stylesheet" href="../../css/dashboard/dashboard-notification.css" />
  <link rel="stylesheet" href="../../css/dashboard/envoyer-notification.css">
  <link rel="stylesheet" href="../../css/dashboard/detail-message.css">
  <link rel="stylesheet" href="../../css/dashboard/planifier-visite.css">


</head>

<body>
  <div class="dashboard-container">
    <!-- MENU LATÉRAL GAUCHE -->
    <aside class="menu-gauche">
      <!-- Logo IMMO -->
      <div class="menu-logo">IMMO</div>

      <!-- Profil utilisateur -->
      <div class="menu-profil">
        <img src="http://localhost/project_immo/asset/img/profil.jpg" alt="Photo utilisateur" class="profil-photo">
        <div class="profil-info">
          <div class="profil-nom">Nom utilisateur</div>
          <div class="profil-email">email@exemple.com</div>
        </div>
      </div>

      <!-- Rôle -->
      <br>
      <div class="profil-role">Administrateur</div>
      <!-- Menu principal -->
      <nav class="menu-links">
        <div class="menu-item"><a href="../dashboard/gestion-utilisateur.php">Gestion Utilisateur</a></div>
        <div class="menu-item"><a href="../dashboard/gestion_biens.php">Gestion des Biens</a></div>
        <div class="menu-item"><a href="../dashboard/gestion_visites.php">Gestion des Visites</a></div>
        <div class="menu-item"><a href="../dashboard/dashboard-notification.php">Gestion Notification</a></div>
      </nav>

      <!-- Déconnexion -->
      <a href="../../CRUD/deconnexion.php" style="text-decoration: none; color: white">
        <div class="btn-deconnexion">Déconnexion</div>
      </a>
    </aside>