<?php require_once("menu.php"); ?>


<!-- CONTENU PRINCIPAL -->
<main class="contenu-dashboard">
  <!-- Titre -->
  <h1 class="titre-dashboard">Gestion Notification</h1>

  <!-- Ligne séparatrice -->
  <hr class="separateur" />

  <!-- Barre de recherche + Bouton -->
  <div class="zone-recherche d-flex justify-content-between align-items-center mb-4">
    <input type="text" class="form-control w-50" placeholder="Rechercher par status..." />
    <button class="btn-envoyer-notification" data-bs-toggle="modal" data-bs-target="#modalNotification">
      Envoyer notification
    </button>
  </div>

  <!-- Tableau des notifications -->
  <div class="table-responsive">
    <table class="table table-bordered bg-white">
      <thead class="table-light">
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
</main>

<!-- ✅ MODALE DE NOTIFICATION AVEC CROIX -->
<div class="modal fade" id="modalNotification" tabindex="-1" aria-labelledby="modalNotificationLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-4" style="background-color: #fefaf6; border-radius: 12px;">
      
      <!-- En-tête avec titre et croix -->
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0" id="modalNotificationLabel">Envoyer une notification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      
      <!-- Formulaire -->
      <form>
        <input type="email" class="form-control mb-3" placeholder="Email destinataire..." required>
        <input type="text" class="form-control mb-3" placeholder="Objet..." required>
        <textarea class="form-control mb-3" placeholder="Message..." rows="4" required></textarea>
        <button type="submit" class="btn btn-dark w-100">Envoyer</button>
      </form>
    </div>
  </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php require_once("pied.php"); ?>


