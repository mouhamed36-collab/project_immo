<?php

// Traitement du POST d'envoi de notification
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
  require_once __DIR__ . '/../../CRUD/crud_notification.php';
  require_once __DIR__ . '/../../CRUD/crud_visite.php';
  require_once __DIR__ . '/../../CRUD/envoiyer_email.php';

  // Récupération et nettoyage des données du formulaire
  $email   = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $idutilisateur = getidUtilisateur($email); // Récupération de l'ID utilisateur à partir de l'email
  $objet   = trim(filter_input(INPUT_POST, 'objet'));
  $message = trim(filter_input(INPUT_POST, 'message'));

  if ($idutilisateur && $objet && $message) {
    // Ajout en base 
    if (ajout_notif($message, $objet, $idutilisateur)) {
      envoyernotifAdmin($email, getnomUtilisateur($idutilisateur), $objet, $message);
      // Succès : redirection pour éviter le "resubmit" du formulaire
      header('Location: dashboard-notification.php?notif=ok');
      exit;
    } else {
      $errorMessage = 'Erreur lors de l’enregistrement de la notification.';
    }
  } else {
    $errorMessage = 'Tous les champs sont obligatoires et l’email doit être valide.';
  }
}
require_once("menu.php"); ?>

<!-- CONTENU PRINCIPAL -->
<main class="contenu-dashboard">
  <h1 class="titre-dashboard">Gestion des Notification</h1>
  <hr class="separateur" />

  <!-- Affichage des messages d'erreur ou de succès -->
  <?php if (!empty($errorMessage)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($errorMessage) ?></div>
  <?php elseif (isset($_GET['notif']) && $_GET['notif'] === 'ok'): ?>
    <div class="alert alert-success">Notification envoyée avec succès.</div>
  <?php endif; ?>

  <!-- Barre de recherche + Bouton -->
  <div class="zone-recherche">
    <input type="text" id="searchInput" class="barre-recherche" placeholder="Rechercher  par statut..." />
    <button class="btn-envoyer-notification">Envoyer notification</button>
  </div>


  <div class="table-responsive">
    <table class="table table-bordered bg-white tableau-notif">
      <thead>
        <tr>
          <th>Email</th>
          <th>Client</th>
          <th>Motif de notification</th>
          <th>Statut</th>
          <th>Date de notification</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once("../../CRUD/crud_notification.php");
        require_once("../../CRUD/crud_visite.php");
        $notifs = get_notif();
        if ($notifs && count($notifs) > 0) {
          foreach ($notifs as $n) {
            $client   = getnomUtilisateur($n['idutilisateur']);
            $email = getemailUtilisateur($n['idutilisateur']);
            $phone = getphoneUtilisateur($n['idutilisateur']);
            $idnotif  = intval($n['idnotif']);

            // Choix de la classe Bootstrap selon le statut
            $statut = strtolower($n['statut']);
            $classeBadge = '';
            switch ($statut) {
              case 'non lu':
                $classeBadge = 'badge-dispo'; // vert
                break;
              case 'lu':
                $classeBadge = 'badge-indispo'; // rouge
                break;
              default:
                $classeBadge = 'badge-secondary'; // Gris par défaut
            }

            echo "<tr>
      <td>{$email}</td>
      <td>{$client}</td>
      <td>{$n['typenotif']}</td>
      <td>
        <button
          class=\"badge {$classeBadge}\"
          style=\"border: none;\"
          data-bs-toggle=\"modal\"
          data-bs-target=\"#modalDetailMessage\"
          data-notif-id=\"{$idnotif}\"
          data-email=\"{$email}\"
          data-client=\"{$client}\"
          data-phone=\"{$phone}\"
          data-objet=\"{$n['typenotif']}\"
          data-date=\"{$n['date_envoi']}\"
          data-message=\"{$n['contenu']}\"
        >
          {$n['statut']}
        </button>
      </td>
      <td>{$n['date_envoi']}</td>
    </tr>";
          }
        } else {
          echo '<tr><td colspan="5" class="text-center">Aucune notification disponible.</td></tr>';
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
        <form id="form" method="post" action="">
          <div class="mb-3">
            <label for="recipient-email" class="form-label">Destinataire</label>
            <input type="email" name="email" class="form-control" id="recipient-email" placeholder="Entrez l'email du destinataire" required>
          </div>
          <div class="mb-3">
            <label for="recipient-objet" class="form-label">objet</label>
            <input type="text" name="objet" class="form-control" id="recipient-objet" placeholder="Entrez l'objet de votre message" required>
          </div>
          <div class="mb-3">
            <label for="message-content" class="form-label">Message</label>
            <textarea class="form-control" name="message" id="message-content" rows="4" placeholder="Écrivez votre message ici..." required></textarea>
          </div>
          <button type="submit" class="btn btn-success w-100" name="envoyer">Envoyer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once("pied.php"); ?>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Bouton pour envoyer une notification
  document.querySelectorAll('.btn-envoyer-notification').forEach(btn => {
    btn.addEventListener('click', () => {
      const modal = new bootstrap.Modal(document.getElementById('modalform'));
      modal.show();
    });
  });


  // fonction pour gérer l'affichage du modal de détail
  document.addEventListener('DOMContentLoaded', function() {
    var detailModal = document.getElementById('modalDetailMessage');

    detailModal.addEventListener('show.bs.modal', function(event) {
      // Button that triggered the modal
      var button = event.relatedTarget;

      // Récupération des data-attributes
      var idNotif = button.getAttribute('data-notif-id');
      var email = button.getAttribute('data-email');
      var client = button.getAttribute('data-client');
      var phone = button.getAttribute('data-phone') || ''; // si phone existe
      var objet = button.getAttribute('data-objet');
      var date = button.getAttribute('data-date');
      var message = button.getAttribute('data-message');

      // Insertion dans le modal
      detailModal.querySelector('#modal-email').textContent = email;
      detailModal.querySelector('#modal-client').textContent = client;
      if (phone) {
        detailModal.querySelector('#modal-phone').textContent = phone;
        detailModal.querySelector('#modal-phone').style.display = '';
      } else {
        detailModal.querySelector('#modal-phone').style.display = 'none';
      }
      detailModal.querySelector('#modal-objet').textContent = objet;
      detailModal.querySelector('#modal-date').textContent = date;
      detailModal.querySelector('#modal-message').textContent = message;

      // Appel AJAX pour modifier le statut, une seule fois à l'ouverture
      fetch('../../CRUD/update_statut_notif.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: 'idnotif=' + encodeURIComponent(idNotif)
        })
        .then(resp => {
          console.log('[DEBUG] fetch response status:', resp.status);
          return resp.text();
        })
        .then(text => {
          console.log('[DEBUG] fetch response body:', text);
          if (text.trim() === 'success') {
            console.log('Statut notification mis à jour.');
          } else {
            console.error('Erreur mise à jour statut :', text);
          }
        })
        .catch(err => console.error('[DEBUG] Erreur AJAX:', err));
    });
  });

  // Script pour filtrer les lignes de la table selon le statut
  document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('searchInput');
    const rows = document.querySelectorAll('.tableau-notif tbody tr');

    input.addEventListener('input', function() {
      const filter = this.value.trim().toLowerCase();

      rows.forEach(row => {
        // Récupère le texte de la 4ᵉ cellule (<td>) qui contient le statut
        const statutTd = row.cells[3];
        const statutText = statutTd.textContent.trim().toLowerCase();

        // Si le statut contient la chaîne filtrée, on affiche, sinon on masque
        if (statutText.includes(filter)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });
</script>