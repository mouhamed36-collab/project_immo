<?php require_once("menu.php"); ?>
<main class="contenu-dashboard">
  <!-- Titre -->
  <h1 class="titre-dashboard">Gestion des Visites</h1>

  <!-- Ligne séparatrice -->
  <hr class="separateur" />

  <!-- Barre de recherche + Bouton -->
  <div class="zone-recherche">
    <input type="text" class="barre-recherche" placeholder="Rechercher par Statut..." />
    <button class="btn-ajouter" data-bs-toggle="modal" data-bs-target="#planifierModal">Planifier Visite</button>
  </div>

  <!-- Tableau -->
  <div class="table-responsive">
    <table class="table table-hover table-borderless tableau-biens">
      <thead>
        <tr>
          <th>Bien</th>
          <th>Client</th>
          <th>Motif de la visite</th>
          <th>Statut</th>
          <th>Date de la visite</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Maison d'hôte</td>
          <td>Hectore</td>
          <td>Presentation</td>
          <td><button data-bs-toggle="modal" data-bs-target="#modifierModal" style="border: none;"><span class="badge badge-visite">En visite</span></button></td>
          <td>23/11/2025 11h:30</td>
        </tr>
        <tr>
          <td>chambre</td>
          <td>Hernadez</td>
          <td>finalisation</td>
          <td><span class="badge badge-indispo">Visiter</span></td>
          <td>23/11/2025 11h:30</td>
        </tr>
        <tr>
          <td>appartement</td>
          <td>Coronado</td>
          <td>retour</td>
          <td><span class="badge badge-dispo">planifier</span></td>
          <td>23/11/2025 11h:30</td>
        </tr>
      </tbody>
    </table>
  </div>
</main>
<!-- Modal planifier visite -->
<div class="modal fade" id="planifierModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #FBF5F1;">

      <div class="modal-header border-0">
        <h5 class="form-title m-auto">planifier visite</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <form action="#" method="post">
          <div class="mb-3">
            <label for="recipient-email" class="form-label">Destinataire</label>
            <input type="email" class="form-control" id="recipient-email" placeholder="Entrez l'email du destinataire">
          </div>
          <div class="d-flex justify-content-center gap-3 mb-4 flex-wrap">
            <input type="date" class="form-control custom-input-date" placeholder="Choisir une date">
            <input type="time" class="form-control custom-input-heure" placeholder="Heure">
          </div>
          <div class="mb-3">
            <label for="message-content" class="form-label">Motif</label>
            <textarea class="form-control" id="message-content" rows="4" placeholder="Écrivez votre motif ici..."></textarea>
          </div>

          <button type="submit" class="btn-update">planifier</button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Modal modifier visite -->
<div class="modal fade" id="modifierModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #FBF5F1;">

      <div class="modal-header border-0">
        <h5 class="form-title m-auto">modifier visite</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <form action="#" method="post">
          <div class="d-flex justify-content-center gap-3 mb-4 flex-wrap">
            <input type="date" class="form-control custom-input-date" placeholder="Choisir une date">
            <input type="time" class="form-control custom-input-heure" placeholder="Heure">
          </div>
          <div class="mb-3">
            <label for="statut-visite" class="form-label">Statut de la visite</label>
            <select class="form-select" id="statut-visite">
              <option value="en-visite">En visite</option>
              <option value="visiter">Visiter</option>
              <option value="planifier">Planifier</option>
            </select>
          </div>

          <button type="submit" class="btn-update">mettre a jour</button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap et JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php require_once("pied.php"); ?>