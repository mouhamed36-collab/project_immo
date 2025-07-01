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

<!-- Modal HTML -->
<div class="modal fade" id="planifierModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header border-0">
        <h5 class="form-title m-auto">planifier visite</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <form>
          <!-- Email -->
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Votre email..." required>
          </div>

          <!-- Date -->
          <fieldset class="date-box">
            <legend>Date</legend>
            <span class="date-display" id="dateDisplay">08/17/2025</span>
            <i class="bi bi-x-circle clear-icon" onclick="clearDate()"></i>
          </fieldset>

          <!-- Heure -->
          <div class="time-display">9:41 AM</div>

          <!-- Motif -->
          <div class="mb-3">
            <textarea class="form-control" rows="2" placeholder="motif de la visite..." required></textarea>
          </div>

          <!-- Bouton -->
          <button type="submit" class="btn-update">Mettre à jour</button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap et JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<script>
  function clearDate() {
    document.getElementById('dateDisplay').textContent = '–';
  }
</script>

<?php require_once("pied.php"); ?>
