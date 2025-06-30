<?php require_once("menu.php"); ?>
<main class="contenu-dashboard">
  <!-- Titre -->
  <h1 class="titre-dashboard">Gestion des Visites</h1>

  <!-- Ligne séparatrice -->
  <hr class="separateur" />

  <!-- Barre de recherche + Bouton -->
  <div class="zone-recherche">
    <input type="text" class="barre-recherche" placeholder="Rechercher par Statut..." />
    <button class="btn-ajouter" data-bs-toggle="modal" data-bs-target="#modalVisite">Planifier Visite</button>
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
          <td><span class="badge badge-encours">En visite</span></td>
          <td>23/11/2025 11h:30</td>
        </tr>
        <tr>
          <td>chambre</td>
          <td>Hernadez</td>
          <td>finalisation</td>
          <td><span class="badge badge-visiter">Visiter</span></td>
          <td>23/11/2025 11h:30</td>
        </tr>
        <tr>
          <td>appartement</td>
          <td>Coronado</td>
          <td>retour</td>
          <td><span class="badge badge-planifier">planifier</span></td>
          <td>23/11/2025 11h:30</td>
        </tr>
      </tbody>
    </table>
  </div>
</main>

<!-- MODAL -->
<div class="modal fade" id="modalVisite" tabindex="-1" aria-labelledby="modalVisiteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Croix de fermeture -->
      <div class="modal-header border-0">
        <h5 class="modal-title" id="modalVisiteLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <div class="form-container">
          <div class="form-title">modifier visite</div>

          <form>
            <div class="mb-3">
              <select class="form-select" required>
                <option selected>en visite</option>
                <option>planifiée</option>
                <option>annulée</option>
              </select>
            </div>

            <fieldset class="date-box">
              <legend>Date</legend>
              <span class="date-display" id="dateDisplay">08/17/2025</span>
              <i class="bi bi-x-lg clear-icon" onclick="clearDate()"></i>
            </fieldset>

            <div class="time-display">9:41 AM</div>

            <button type="submit" class="btn-update">Mettre à jour</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<?php require_once("pied.php"); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<script>
  function clearDate() {
    document.getElementById('dateDisplay').textContent = '–';
  }
</script>

