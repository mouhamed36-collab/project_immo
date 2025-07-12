<?php
require_once '../../CRUD/con_db.php';
require_once '../../CRUD/crud_utilisateur.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['action'])) {
  switch ($_POST['action']) {
    case 'ajoutModal':
      $email       = $_POST['email'] ?? '';
      $phone         = $_POST['phone'] ?? '';
      $nom      = $_POST['nom'] ?? '';
      $password      = $_POST['password'] ?? '';
      $password_confirmer      = $_POST['confirm_password'] ?? '';

      if ($password == $password_confirmer) {
        ajouterUtilisateur($nom, $email, $phone, $password);
        echo '<script>alert("l\'utilisateur a bien ete ajouter")</script>';
      } else {
        $errorMessage = 'Erreur lors de l\'ajout de l\'utilisateur';
      }
      break;
  }
}
require_once("menu.php"); ?>

<head>
  <link rel="stylesheet" href="../../css/dashboard/gestions_visite.css">
</head>
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
    <input type="text" class="barre-recherche" id="searchInput" placeholder="Rechercher par nom..." />
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
        <?php
        // affichage des utilisateurs
        include_once '../../CRUD/crud_utilisateur.php';
        $utilisateurs = afficherUtilisateurs();
        foreach ($utilisateurs as $u) :
          // Choix de la classe Bootstrap selon le statut
          $statut = strtolower($u['actif']);
          $classeBadge = '';
          switch ($statut) {
            case '1':
              $classeBadge = 'badge-encours'; // Jaune
              break;
            case '0':
              $classeBadge = 'badge-visiter'; // Bleu clair
              break;
            default:
              $classeBadge = 'badge-secondary'; // Gris par défaut
          } ?>
          <tr class="table-row" data-bs-toggle="modal" data-bs-target="#userModal<?= $u['idutilisateur'] ?>">
            <td><?php echo htmlspecialchars($u['nom']); ?></td>
            <td><?php echo htmlspecialchars($u['email']); ?></td>
            <td><?php echo htmlspecialchars($u['telephone']); ?></td>
            <td><button style="border: none;" data-bs-toggle="modal" data-bs-target="#userModal"><span class="badge <?= $classeBadge ?>"><?php if ($u['actif'] == 1) {
                                                                                                                                            echo 'actif';
                                                                                                                                          } else {
                                                                                                                                            echo 'inactif';
                                                                                                                                          }; ?></span></button></td>
            <td>
              <?php if ($u['photo'] == 'NULL' || empty($u['photo'])): ?>
                <img src="http://localhost/project_immo/asset/img/profil.jpg" class="img-bien" alt="photo">
              <?php else: ?>
                <img src="http://localhost/project_immo/CRUD/<?= htmlspecialchars($u['photo']) ?>" class="img-bien" alt="photo">
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

<!-- Modal detail utilisateur -->
<?php foreach ($utilisateurs as $u): ?>
  <div class="modal fade" id="userModal<?= $u['idutilisateur'] ?>" tabindex="-1" aria-labelledby="ajoutModal<?= $u['idutilisateur'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="background-color: #FBF5F1;">
      <div class="modal-content" style="background-color: #FBF5F1;">

        <div class="modal-header border-0">
          <h5 class="form-title m-auto">detail utilisateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>

        <div class="modal-body">
          <div class="card shadow p-4">
            <div class="d-flex align-items-start mb-4">
              <?php if ($u['photo'] == 'NULL' || empty($u['photo'])): ?>
                <img src="http://localhost/project_immo/asset/img/profil.jpg" alt="Photo" class="profile-img me-3">
              <?php else: ?>
                <img src="http://localhost/project_immo/CRUD/<?= $u['photo'] ?>" alt="Photo" class="profile-img me-3">
              <?php endif; ?>
              <div>
                <h5 class="mb-1"><?= htmlspecialchars($u['nom']) ?></h5>
                <p class="mb-1"><?= htmlspecialchars($u['email']) ?></p>
                <p class="mb-1"><?= htmlspecialchars($u['telephone']) ?></p>
                <?php if ($u['actif'] == 1): ?>
                  <span class="badge bg-success badge-active">Actif</span>
                <?php else: ?>
                  <span class="badge bg-danger badge-active">Inactif</span>
                <?php endif; ?>
              </div>
            </div>

            <div class="d-flex justify-content-between mb-3">
              <div>Visite(s) : <strong><?= nombreVisitePlanifier($u['idutilisateur']) ?></strong></div>
              <div>notification(s) : <strong><?= nombreNotifEnvoyer($u['idutilisateur']) ?></strong></div>

            </div>

            <div class="text-end">
              <small class="text-muted">Inscris le <?= htmlspecialchars($u['date_inscription']) ?></small>
            </div>
          </div>
          <center>
            <form method="post" id="form-activation" action="../../CRUD/crud_utilisateur.php">
              <input type="hidden" name="idutilisateur" value="<?= htmlspecialchars($u['idutilisateur']) ?>">
              <button type="submit" name="action" value="activer" class="btn btn-success mx-4">
                Activer
              </button>
              <button type="submit" name="action" value="desactiver" class="btn btn-danger mx-4">
                Désactiver
              </button>
            </form>
          </center>
        </div>

      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Modal ajout utilisateur -->
<div class="modal fade" id="ajoutModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="background-color: #FBF5F1;">
    <div class="modal-content" style="background-color: #FBF5F1;">

      <div class="modal-header border-0">
        <h5 class="form-title m-auto">Ajouter utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <div class="form-container">

          <form method="post">
            <input type="hidden" name="action" value="ajoutModal">
            <input type="text" name="nom" class="form-control" placeholder="Votre nom complet..." required>
            <input type="number" name="phone" class="form-control" placeholder="Votre numéro téléphone..." required>
            <input type="email" name="email" class="form-control" placeholder="Votre email..." required>
            <input type="password" name="password" class="form-control" placeholder="Votre mot de passe..." required>
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirmer mot de passe..." required>
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

<script>
  // Script pour filtrer les lignes de la table selon le nom
  document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('searchInput');
    const rows = document.querySelectorAll('.tableau-biens tbody tr');

    input.addEventListener('input', function() {
      const filter = this.value.trim().toLowerCase();

      rows.forEach(row => {
        // Récupère le texte de la 4ᵉ cellule (<td>) qui contient le statut
        const statutTd = row.cells[0];
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