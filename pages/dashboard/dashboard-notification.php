<?php require_once("menu.php"); ?>
<!-- CONTENU PRINCIPAL -->
<main class="contenu-dashboard">
  <!-- Titre -->
  <h1 class="titre-dashboard">Gestion  Notification</h1>

  <!-- Ligne séparatrice -->
  <hr class="separateur" />

  <!-- Barre de recherche + Bouton -->
  <div class="zone-recherche">
    <input type="text" class="barre-recherche" placeholder="Rechercher  par status..." />
    <button class="btn-envoyer-notification">Envoyer notification</button>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered bg-white">
      <thead>
        <tr>
          <th>Email</th>
          <th>Client</th>
          <th>Motif de notification</th>
          <th>Status</th>
          <th>Date de la visite</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Hectore@gmail.com</td>
          <td>Hectore</td>
          <td>présentation</td>
          <td><span class="badge-status badge-nonlu">non lu</span></td>
          <td>23/11/2025 11:30</td>
        </tr>
        <tr>
          <td>Hermandez@gmail.com</td>
          <td>hernandez</td>
          <td>finalisation</td>
          <td><span class="badge-status badge-nonlu">non lu</span></td>
          <td>23/11/2025 11:30</td>
        </tr>
        <tr>
          <td>Coronada@gmail.com</td>
          <td>Coronado</td>
          <td>retour</td>
          <td><span class="badge-status badge-lu">lu</span></td>
          <td>23/11/2025 11:30</td>
        </tr>
        <tr>
          <td>Morales@gmail.com</td>
          <td>Morales</td>
          <td>présentation</td>
          <td><span class="badge-status badge-nonlu">non lu</span></td>
          <td>23/11/2025 11:30</td>
        </tr>
        <tr>
          <td>Perez@gmail.com</td>
          <td>Perez</td>
          <td>présentation</td>
          <td><span class="badge-status badge-lu">lu</span></td>
          <td>23/11/2025 11:30</td>
        </tr>
        <tr>
          <td>Bautista@gmail.com</td>
          <td>Bautista</td>
          <td>visite</td>
          <td><span class="badge-status badge-lu">lu</span></td>
          <td>23/11/2025 11:30</td>
        </tr>
        <tr>
          <td>Mendez@gmail.com</td>
          <td>Mendez</td>
          <td>finalisation</td>
          <td><span class="badge-status badge-lu">lu</span></td>
          <td>23/11/2025 11:30</td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>

  <?php require_once("pied.php"); ?>