<?php require_once("menu.php"); ?>

<!-- CONTENU PRINCIPAL -->
<main class="contenu-dashboard">
  <h1 class="titre-dashboard">Gestion des Notification</h1>
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
        <?php

        $rows = [
          ['email' => 'Hectore@gmail.com', 'client' => 'Hectore', 'motif' => 'présentation', 'status' => 'non lu', 'date' => '23/11/2025 11:30'],
          ['email' => 'Hermandez@gmail.com', 'client' => 'hernandez', 'motif' => 'finalisation', 'status' => 'non lu', 'date' => '23/11/2025 11:30'],
          ['email' => 'Coronada@gmail.com', 'client' => 'Coronado', 'motif' => 'retour', 'status' => 'lu', 'date' => '23/11/2025 11:30'],
          ['email' => 'Morales@gmail.com', 'client' => 'Morales', 'motif' => 'présentation', 'status' => 'non lu', 'date' => '23/11/2025 11:30'],
          ['email' => 'Perez@gmail.com', 'client' => 'Perez', 'motif' => 'présentation', 'status' => 'lu', 'date' => '23/11/2025 11:30'],
          ['email' => 'Bautista@gmail.com', 'client' => 'Bautista', 'motif' => 'visite', 'status' => 'lu', 'date' => '23/11/2025 11:30'],
          ['email' => 'Mendez@gmail.com', 'client' => 'Mendez', 'motif' => 'finalisation', 'status' => 'lu', 'date' => '23/11/2025 11:30'],
        ];

        foreach ($rows as $row) {
          // Classe badge selon le status
          $badgeClass = ($row['status'] === 'lu') ? 'badge-lu' : 'badge-nonlu';


          $message = "Demande de renseignement concernant un appartement situé au village de Ngor près de l'hôtel le Gondolier. Je voudrais plus d'informations le concernant pour pouvoir planifier une visite.";
        ?>
          <tr>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['client']) ?></td>
            <td><?= htmlspecialchars($row['motif']) ?></td>
            <td>
              <span class="badge-status <?= $badgeClass ?>"
                data-email="<?= htmlspecialchars($row['email']) ?>"
                data-client="<?= htmlspecialchars($row['client']) ?>"
                data-objet="<?= htmlspecialchars($row['motif']) ?>"
                data-date="<?= htmlspecialchars($row['date']) ?>"
                data-message="<?= htmlspecialchars($message) ?>"
                style="cursor:pointer;">
                <?= $row['status'] ?>
              </span>
            </td>
            <td><?= htmlspecialchars($row['date']) ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</main>

<!-- MODAL detail -->
<div class="modal fade" id="modalDetailMessage" tabindex="-1" aria-labelledby="modalDetailMessageLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #fefaf7; border-radius: 10px;">
      <div class="modal-header" style="border-bottom:none;">
        <h5 class="modal-title fw-bold text-center" id="modalDetailMessageLabel" style="color:#2d2d2d; width: 100%;">Détail du message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body text-start" style="color:#333;">
        <p class="mb-0"><strong id="modal-email">email@example.com</strong></p>
        <p class="mb-0" id="modal-client">Client</p>
        <p class="mb-0" id="modal-phone">77 131 14 46</p>

        <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
          <p class="mb-0"><strong>Objet :</strong> <span id="modal-objet">Objet</span></p>
          <small class="text-muted" style="font-size: 0.9rem;" id="modal-date">Date</small>
        </div>

        <hr style="border: 3px solid #DDC7BB; margin: 15px 0;" />

        <div style="padding: 15px; border-radius: 5px; font-size: 0.95rem; color: #333; background-color: #fff; min-height: 120px;" id="modal-message">
          Contenu message...
        </div>

        <button class="btn btn-success w-100 mt-4 btn-envoyer-notification">Répondre</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL form -->
<div class="modal fade" id="modalform" tabindex="-1" aria-labelledby="modalformLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #fefaf7; border-radius: 10px;">
      <div class="modal-header" style="border-bottom:none;">
        <h5 class="modal-title fw-bold text-center" id="modalformLabel" style="color:#2d2d2d; width: 100%;">Envoyer notification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body text-start" style="color:#333;">
        <form id="form" method="post">
          <div class="mb-3">
            <label for="recipient-email" class="form-label">Destinataire</label>
            <input type="email" class="form-control" id="recipient-email" placeholder="Entrez l'email du destinataire">
          </div>
          <div class="mb-3">
            <label for="recipient-objet" class="form-label">objet</label>
            <input type="text" class="form-control" id="recipient-objet" placeholder="Entrez l'objet de votre message">
          </div>
          <div class="mb-3">
            <label for="message-content" class="form-label">Message</label>
            <textarea class="form-control" id="message-content" rows="4" placeholder="Écrivez votre message ici..."></textarea>
          </div>
          <button type="submit" class="btn btn-success w-100">Envoyer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once("pied.php"); ?>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // pour afficher le modal avec les détails du message
  document.querySelectorAll('.badge-status').forEach(badge => {
    badge.addEventListener('click', () => {
      // Récupérer les données
      const email = badge.dataset.email;
      const client = badge.dataset.client;
      const objet = badge.dataset.objet;
      const date = badge.dataset.date;
      const message = badge.dataset.message;

      // Remplir le modal
      document.getElementById('modal-email').textContent = email;
      document.getElementById('modal-client').textContent = client;
      document.getElementById('modal-phone').textContent = '77 131 14 46'; // fixe, modifie si besoin
      document.getElementById('modal-objet').textContent = objet;
      document.getElementById('modal-date').textContent = date;
      document.getElementById('modal-message').textContent = message;

      // Afficher le modal
      const modal = new bootstrap.Modal(document.getElementById('modalDetailMessage'));
      modal.show();
    });
  });

  // Bouton pour envoyer une notification
  document.querySelectorAll('.btn-envoyer-notification').forEach(btn => {
    btn.addEventListener('click', () => {
      const modal = new bootstrap.Modal(document.getElementById('modalform'));
      modal.show();
    });
  });
</script>