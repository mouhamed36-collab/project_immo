<?php
// Traitement du POST AVANT TOUTE SORTIE HTML
require_once __DIR__ . '/../../CRUD/crud_visite.php';
require_once __DIR__ . '/../../CRUD/envoiyer_email.php';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action'])) {
  switch ($_POST['action']) {
    case 'planifierVisite':
      $email       = $_POST['email'] ?? '';
      $date        = $_POST['date']  ?? '';
      $heure       = $_POST['heure'] ?? '';
      $idBien      = intval($_POST['bien'] ?? 0);
      $idUser      = getIdUtilisateur($email);
      $date_visite = "$date $heure";

      $bien = getnomBien($idBien) . ',' . getlocationBien($idBien);

      if ($idUser && $idBien && ajoutVisite($date_visite, 'planifier', 'Visite de renseignement', $idUser, $idBien)) {
        envoyerEmailVisite($email, getnomUser($email), $date_visite, $bien);

        header('Location: gestion_visites.php');
        exit;
      } else {
        $errorMessage = 'Erreur lors de la planification de la visite.';
      }
      break;

    case 'modifierVisite':
      $idVisite = intval($_POST['idVisite']  ?? 0);
      $date     = $_POST['date']            ?? '';
      $heure    = $_POST['heure']           ?? '';
      $statut   = $_POST['statut']          ?? '';
      $datetime = "$date $heure";

      if (
        $idVisite > 0 && !empty($date) && !empty($heure) && !empty($statut)
        && modifierVisite($idVisite, $datetime, $statut)
      ) {
        header('Location: gestion_visites.php');
        exit;
      } else {
        $errorMessage = 'Erreur lors de la mise à jour de la visite.';
      }
      break;
  }
}

// Puis on affiche le reste de la page
require_once("menu.php");
?>
<main class="contenu-dashboard">
  <h1 class="titre-dashboard">Gestion des Visites</h1>
  <hr class="separateur" />
  <?php if ($errorMessage): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($errorMessage) ?></div>
  <?php endif; ?>

  <div class="zone-recherche">
    <input id="searchInput" type="text" class="barre-recherche" placeholder="Rechercher par statut…" />
    <button class="btn-ajouter" data-bs-toggle="modal" data-bs-target="#planifierModal">
      Planifier Visite
    </button>
  </div>

  <div class="table-responsive">
    <table class="table table-hover table-borderless tableau-biens">
      <thead>
        <tr>
          <th>Bien</th>
          <th>Client</th>
          <th>Motif</th>
          <th>Statut</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $visites = getVisites();
        if ($visites) {
          foreach ($visites as $v) {

            $bien   = getnomBien($v['idbien']) . ', ' . getlocationBien($v['idbien']);

            $client = getnomUtilisateur($v['idutilisateur']);
            $idVis  = intval($v['idvisite']);

            // Choix de la classe Bootstrap selon le statut
            $statut = strtolower($v['statut']);
            $classeBadge = '';
            switch ($statut) {
              case 'planifier':
                $classeBadge = 'badge-dispo'; // Jaune
                break;
              case 'en visite':
                $classeBadge = 'badge-visite'; // Bleu clair
                break;
              case 'visiter':
                $classeBadge = 'badge-indispo'; // Vert
                break;
              default:
                $classeBadge = 'badge-secondary'; // Gris par défaut
            }

            echo "<tr>
      <td>{$bien}</td>
      <td>{$client}</td>
      <td>{$v['motif_visite']}</td>
      <td>
        <button
          class=\"badge {$classeBadge}\"
          style=\"border: none;\"
          data-bs-toggle=\"modal\"
          data-bs-target=\"#modifierModal\"
          data-visite-id=\"{$idVis}\"
          data-visite-date=\"{$v['Date_visite']}\"
          data-visite-statut=\"{$v['statut']}\"
        >
          {$v['statut']}
        </button>
      </td>
      <td>{$v['Date_visite']}</td>
    </tr>";
          }
        } else {
          echo '<tr><td colspan="5" class="text-center">Aucune visite planifiée.</td></tr>';
        }
        ?>

      </tbody>
    </table>
  </div>
</main>

<!-- Modal Planifier -->
<div class="modal fade" id="planifierModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background:#FBF5F1;">
      <div class="modal-header border-0">
        <h5 class="form-title m-auto">Planifier visite</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <input type="hidden" name="action" value="planifierVisite">
          <div class="mb-3">
            <label class="form-label">Destinataire</label>
            <input name="email" type="email" class="form-control" required>
          </div>
          <div class="d-flex gap-3 mb-4">
            <input name="date" type="date" class="form-control" required>
            <input name="heure" type="time" class="form-control" required>
          </div>
          <?php
          $biens = getbien();
          if ($biens) {
            echo '<div class="mb-3">
                    <label class="form-label">Bien</label>
                    <select name="bien" class="form-select" required>
                      <option value="">Choisir un bien</option>';
            foreach ($biens as $b) {
              $idB  = intval($b['idbien']);
              $tit  = htmlspecialchars($b['titre'], ENT_QUOTES);
              $loc  = htmlspecialchars($b['localisation'], ENT_QUOTES);
              echo "<option value=\"{$idB}\">{$tit}, {$loc}</option>";
            }
            echo '</select></div>';
          }
          ?>
          <button type="submit" class="btn-update">Planifier</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Modifier -->
<div class="modal fade" id="modifierModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background:#FBF5F1;">
      <div class="modal-header border-0">
        <h5 class="form-title m-auto">Modifier visite</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <input type="hidden" name="action" value="modifierVisite">
          <input type="hidden" name="idVisite" id="input-idVisite">
          <div class="d-flex gap-3 mb-4">
            <input name="date" id="input-date" type="date" class="form-control" required>
            <input name="heure" id="input-heure" type="time" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Statut</label>
            <select name="statut" id="input-statut" class="form-select" required>
              <option value="en visite">en visite</option>
              <option value="planifier">planifier</option>
              <option value="visiter">visiter</option>
            </select>
          </div>
          <button type="submit" class="btn-update">Mettre à jour</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once("pied.php"); ?>

<!-- Chargement Bootstrap + script pour peupler le modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Remplir le modal de modification quand il s'ouvre
  const modifModal = document.getElementById('modifierModal');
  modifModal.addEventListener('show.bs.modal', function(event) {
    const btn = event.relatedTarget;
    const id = btn.getAttribute('data-visite-id');
    const date = btn.getAttribute('data-visite-date').split(' ')[0];
    const heure = btn.getAttribute('data-visite-date').split(' ')[1];
    const stat = btn.getAttribute('data-visite-statut');

    document.getElementById('input-idVisite').value = id;
    document.getElementById('input-date').value = date;
    document.getElementById('input-heure').value = heure;
    document.getElementById('input-statut').value = stat;
  });

  // Script pour filtrer les lignes de la table selon le statut
  document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('searchInput');
    const rows = document.querySelectorAll('.tableau-biens tbody tr');

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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">