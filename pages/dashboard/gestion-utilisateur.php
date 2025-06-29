
<?php require_once("menu.php");?>
<main class="contenu-dashboard">
      <!-- Titre -->
      <h1 class="titre-dashboard">Gestion des utilisateurs</h1>

      <!-- Ligne séparatrice -->
      <hr class="separateur" />

      <!-- Barre de recherche + Bouton -->
      <div class="zone-recherche">
        <input type="text" class="barre-recherche" placeholder="Rechercher une adresse..." />
        <button class="btn-ajouter">Ajouter  utilisateur</button>
      </div>

      <!-- Tableau -->
      <div class="table-responsive">
        <table class="table table-hover table-borderless tableau-biens">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Adresse email</th>
              <th>Telephone</th>
              <th>Statut</th>
              <th>Photo</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Herctor Hugo</td>
              <td>Hector@gmail.com</td>
              <td>764532156</td>
              <td><span class="badge badge-visite">Actif</span></td>
              <td><img src="photo1.jpg" class="img-bien" alt="bien"></td>
            </tr>
            <tr>
              <td>Fernanda</td>
              <td>hernandez@gmail.com</td>
              <td>772341278</td>
              <td><span class="badge badge-dispo">Actif</span></td>
              <td><img src="photo2.jpg" class="img-bien" alt="bien"></td>
            </tr>
            <tr>
              <td>Mauricio</td>
              <td>Perez@gmail.com</td>
              <td>713245679</td>
              <td><span class="badge badge-indispo">Inactif</span></td>
              <td><img src="photo3.jpg" class="img-bien" alt="bien"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
    <?php require_once("pied.php");?>