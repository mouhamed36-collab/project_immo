<?php require_once("menu.php"); ?>
<style>
  body {
    background-color: #f8f9fa;
  }

  .card {
    max-width: 500px;
    margin: 50px auto;
    border-radius: 10px;
  }

  .profile-img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border: 1px solid #ddd;
    padding: 5px;
  }

  .badge-active {
    font-size: 12px;
    padding: 4px 8px;
  }



  .form-container {
    max-width: 350px;
    margin: 80px auto;
    background: #fff8f4;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
  }

  .form-control {
    background: #e4cfc2;
    border: 1px solid #b09a8f;
    margin-bottom: 12px;
  }

  .btn-custom {
    background-color: #3d2619;
    color: white;
    width: 100%;
  }
</style>
<main class="contenu-dashboard">
  <!-- Titre -->
  <h1 class="titre-dashboard">Gestion des utilisateurs</h1>

  <!-- Ligne séparatrice -->
  <hr class="separateur" />

  <!-- Barre de recherche + Bouton -->
  <div class="zone-recherche">
    <input type="text" class="barre-recherche" placeholder="Rechercher une adresse..." />
    <button class="btn-ajouter" data-bs-toggle="modal" data-bs-target="#ajoutModal">Ajouter utilisateur</button>
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
          <td><button style="border: none;" data-bs-toggle="modal" data-bs-target="#userModal"><span class="badge badge-visite">Actif</span></button></td>
          <td><img src="../../asset/img/profil.jpg" class="img-bien" alt="bien"></td>
        </tr>
        <tr>
          <td>Fernanda</td>
          <td>hernandez@gmail.com</td>
          <td>772341278</td>
          <td><span class="badge badge-visite">Actif</span></td>
          <td><img src="../../asset/img/profil.jpg" class="img-bien" alt="bien"></td>
        </tr>
        <tr>
          <td>Mauricio</td>
          <td>Perez@gmail.com</td>
          <td>713245679</td>
          <td><span class="badge badge-indispo">Inactif</span></td>
          <td><img src="../../asset/img/profil.jpg" class="img-bien" alt="bien"></td>
        </tr>
      </tbody>
    </table>
  </div>
</main>

<!-- Modal detail utilisateur -->
<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="background-color: #FBF5F1;">
    <div class="modal-content" style="background-color: #FBF5F1;">

      <div class="modal-header border-0">
        <h5 class="form-title m-auto">detail utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <div class="card shadow p-4">
          <div class="d-flex align-items-start mb-4">
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Avatar" class="profile-img me-3">
            <div>
              <h5 class="mb-1">Mouhamed Diop</h5>
              <p class="mb-1">mouhamed.diop36@unchk.edu.sn</p>
              <p class="mb-1">+221 77 131 41 46</p>
              <span class="badge bg-primary badge-active">Actif</span>
            </div>
          </div>

          <div class="d-flex justify-content-between mb-3">
            <div>Visite(s) : <strong>3</strong></div>
            <div>notification(s) : <strong>0</strong></div>
            <div>bien(s) : <strong>1</strong></div>
          </div>

          <div class="text-end">
            <small class="text-muted">Inscris le 22/06/2025</small>
          </div>
        </div>
        <form action="">
          <button type="submit" class="btn-update">activer/desactiver</button>
        </form>

      </div>

    </div>
  </div>
</div>

<!-- Modal ajout utilisateur -->
<div class="modal fade" id="ajoutModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="background-color: #FBF5F1;">
    <div class="modal-content" style="background-color: #FBF5F1;">

      <div class="modal-header border-0">
        <h5 class="form-title m-auto">detail utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <div class="form-container">
          <h4 class="mb-4 fw-bold">Ajouter utilisateur</h4>
          <form>
            <input type="text" class="form-control" placeholder="Votre nom complet...">
            <input type="tel" class="form-control" placeholder="Votre numéro téléphone...">
            <input type="email" class="form-control" placeholder="Votre email...">
            <input type="password" class="form-control" placeholder="Votre mot de passe...">
            <input type="password" class="form-control" placeholder="Confirmer mot de passe...">
            <button type="submit" class="btn-update">Ajouter</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap et JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php require_once("pied.php"); ?>