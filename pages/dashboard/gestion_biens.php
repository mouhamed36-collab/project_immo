<?php require_once("menu.php"); ?>
<main class="contenu-dashboard">
  <!-- Titre -->
  <h1 class="titre-dashboard">Gestion des biens immobilier</h1>

  <!-- Ligne séparatrice -->
  <hr class="separateur" />

  <!-- Barre de recherche + Bouton -->
  <div class="zone-recherche">
    <input type="text" class="barre-recherche" placeholder="Rechercher une adresse..." />
    <button class="btn-ajouter">Ajouter bien</button>
  </div>

  <!-- Tableau -->
  <div class="table-responsive">
    <table class="table table-hover table-borderless tableau-biens">
      <thead>
        <tr>
          <th>Titre</th>
          <th>Type</th>
          <th>Adresse</th>
          <th>Statut</th>
          <th>Photo</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Villa Baobab</td>
          <td>Maison</td>
          <td>Dakar, Ouakam</td>
          <td><span class="badge badge-visite">En visite</span></td>
          <td><img src="http://localhost/project_immo/asset/img/MAISON 1.png" class="img-bien" alt="bien"></td>
        </tr>
        <tr>
          <td>Terrain Yoff</td>
          <td>Terrain</td>
          <td>Dakar, Yoff</td>
          <td><span class="badge badge-dispo">Disponible</span></td>
          <td><img src="http://localhost/project_immo/asset/img/MAISON 2.png" class="img-bien" alt="bien"></td>
        </tr>
        <tr>
          <td>Appartement Ngor</td>
          <td>Appartement</td>
          <td>Dakar, Ngor</td>
          <td><span class="badge badge-indispo">Indisponible</span></td>
          <td><img src="http://localhost/project_immo/asset/img/MAISON 3.png" class="img-bien" alt="bien"></td>
        </tr>
      </tbody>
    </table>
  </div>
</main>
<?php require_once("pied.php"); ?>
