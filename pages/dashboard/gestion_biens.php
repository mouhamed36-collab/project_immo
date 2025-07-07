<?php require_once("menu.php");
include_once("../../CRUD/biendModel.php");
$biens = getAllBiens();

?>
<main class="contenu-dashboard">
  <!-- Titre -->
  <h1 class="titre-dashboard">Gestion des biens immobilier</h1>

  <!-- Ligne séparatrice -->
  <hr class="separateur" />

  <!-- Barre de recherche + Bouton -->
  <div class="zone-recherche">
    <input type="text" class="barre-recherche" placeholder="Rechercher une adresse..." />
    <button class="btn-ajouter" data-bs-toggle="modal" data-bs-target="#ajouterBienModal">Ajouter bien</button>
  </div>

  <!-- Tableau -->
  <div class="table-responsive">
    <table class="table table-hover table-borderless tableau-biens">
      <thead>
        <tr>
          <th>Titre</th>
          <th>Type</th>
          <th>Adresse</th>
          <th>Statut</th>
          <th>Photo</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($biens as $bien): ?>
          <tr class="table-row" data-bs-toggle="modal" data-bs-target="#modalDetailBien<?= $bien['idbien'] ?>">
            <td><?php echo htmlspecialchars($bien['titre']); ?></td>
            <td><?php echo htmlspecialchars($bien['type']); ?></td>
            <td><?php echo htmlspecialchars($bien['localisation']); ?></td>
            <td><span class="badge badge-visite"><?php echo ucfirst($bien['status']); ?></span></td>
            <td><img src="http://localhost/project_immo/CRUD/<?= $bien['photo'] ?>" class="img-bien" alt="bien"></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>
<!-- Modal pour ajouter bien -->
<div class="modal fade" id="ajouterBienModal" tabindex="-1" aria-labelledby="ajouterBienLabel" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="
      width: 512px;
      height: 575px;
      margin: auto;
      background-color: #FBF5F1;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      border: none;
      border-radius: 8px;
    ">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="ajouterBienLabel" style="
          font-family: Montserrat;
          font-weight: bold;
          font-size: 24px;
          color: #000000;
        ">Ajouter bien</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="http://localhost/project_immo/CRUD/biendModel.php">

          <div class="mb-3">
            <input required type="text" class="form-control" name="titre" placeholder="Titre du bien" style="background-color: #DDC7BB;">
          </div>

          <div class="mb-3">
            <textarea required class="form-control" rows="3" name="description" placeholder="Description..." style="background-color: #DDC7BB;"></textarea>
          </div>

          <div class="mb-3 d-flex align-items-center gap-2">
            <input required type="file" name="photo" class="form-control" style="background-color: #DDC7BB;">
          </div>

          <div class="mb-3">
            <select required class="form-select" name="type" style="background-color: #DDC7BB;">
              <option selected disabled>Catégorie</option>
              <option value="maison">Maison</option>
              <option value="appartement">Appartement</option>
              <option value="terrain">Terrain</option>
            </select>
          </div>
            <div class="mb-3">
            <select required class="form-select" name="status" style="background-color: #DDC7BB;">
              <option selected disabled>Status</option>
              <option value="disponible">Disponible</option>
              <option value="indisponible">Indisponible</option>
              <option value="en visite">En visite</option>
            </select>
          </div>
          <div class="mb-3">
            <input type="number" required class="form-control" name="surface" placeholder="Surface (m²)" style="background-color: #DDC7BB;">
          </div>

          <div class="mb-3">
            <input type="number" required class="form-control" name="prix" placeholder="Prix (FCFA)" style="background-color: #DDC7BB;">
          </div>

          <div class="mb-3">
            <input type="text" required class="form-control" name="localisation" placeholder="Adresse.." style="background-color: #DDC7BB;">
          </div>

          <div class="text-center">
            <button type="submit" name="ajouterBien" class="btn" style="
              width: 156px;
              height: 40px;
              background-color: #2B1B12;
              color: white;
              border-radius: 15px;
              font-family: Montserrat;
              font-weight: 600;
              font-size: 16px;
            ">
              Ajouter bien
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- fin pour modal ajouter bien -->
<!-- Modal Detail bien -->
<?php foreach ($biens as $bien): ?>
  <div class="modal fade" id="modalDetailBien<?= $bien['idbien'] ?>" tabindex="-1" aria-labelledby="modalDetailBienLabel<?= $bien['idbien'] ?>" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
      <div class="modal-content" style="
      width:900px;
      height:500px;
      background-color: #FBF5F1;
      border-radius: 10px;
      border: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    ">
        <div class="modal-body d-flex p-4 mb-1">
          <div>
            <img src="http://localhost/project_immo/CRUD/<?= $bien['photo'] ?>" alt="Photo du bien" style="
            width: 160px;
            height: 135px;
            object-fit: cover;
            border-radius: 8px;
          ">
          </div>
          <!--  Détails du bien -->
          <div class="ms-4 p-3">
            <h5 style="
            font-family: Montserrat;
            font-weight: 800;
            font-size: 20px;
            color:rgb(73, 31, 6);
            margin-bottom: 8px;
          "><?= htmlspecialchars($bien['titre']) ?></h5>

            <p style="font-family: Montserrat; font-weight: 600; font-size: 14px; color: #4F3527; margin-bottom: 4px;">
              <i class="bi bi-geo-alt-fill"></i>Lieu : <?= htmlspecialchars($bien['localisation']) ?>
            </p>

            <p style="font-family: Montserrat; font-weight: 600; font-size: 14px; color: #4F3527; margin-bottom: 4px;">
              Type : <?= htmlspecialchars($bien['type']) ?>
            </p>

            <p style="font-family: Montserrat; font-weight: 600; font-size: 14px; color: #4F3527; margin-bottom: 4px;">
              Surface : <?= htmlspecialchars($bien['surface']) ?> m²
            </p>

            <p style="font-family: Montserrat; font-weight: 600; font-size: 14px; color: #4F3527; margin-bottom: 4px;">
              Status : <?= htmlspecialchars($bien['status']) ?>
            </p>

            <p style="font-family: Moul; font-size: 24px; color: #4F3527; font-weight: 400;">
              Prix : <?= number_format($bien['prix'], 0, ',', ' ') ?> FCFA
            </p>
          </div>
        </div>
        <hr style="border:none;height:3px;background-color:#DDC7BB;width:100%;">
        <div>
          <h4 style="color: #4F3527;text-align:left;margin-left:30px">Description</h4>
          <p style="color: #4F3527;text-align:left;margin-left:30px"><?= nl2br(htmlspecialchars($bien['description'])) ?></p>
        </div>
        <!-- 🔧 Boutons -->
        <div class="modal-footer justify-content-center border-0">
          <button class="btn btn-success mx-4" data-bs-toggle="modal" data-bs-target="#ModifierBienModal<?= $bien['idbien'] ?>">Modifier</button>
          <form method="post" action="http://localhost/project_immo/CRUD/biendModel.php" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce bien ?');">
            <input type="hidden" name="idbien" value="<?= $bien['idbien'] ?>">
            <button type="submit" name="supprimerBien" class="btn btn-danger mx-4">Supprimer</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- fin modal detail bien -->
<!-- debut modal modifier -->
<?php foreach ($biens as $bien): ?>
  <div class="modal fade" id="ModifierBienModal<?= $bien['idbien'] ?>" tabindex="-1" aria-labelledby="ModifierBienLabel<?= $bien['idbien'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="
      width: 512px;
      height: 650px;
      margin: auto;
      background-color: #FBF5F1;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      border: none;
      border-radius: 8px;
    ">
        <div class="modal-header">
          <h5 class="modal-title w-100 text-center" id="ModifierBienLabel<?= $bien['idbien'] ?>" style="
          font-family: Montserrat;
          font-weight: bold;
          font-size: 24px;
          color: #000000;
        ">Modifier Bien</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>

        <div class="modal-body">
          <form method="post" enctype="multipart/form-data" action="http://localhost/project_immo/CRUD/biendModel.php">
            <input type="hidden" name="idbien" value="<?= $bien['idbien'] ?>">
            <div class="mb-3">
              <input type="text" class="form-control" name="titre" value="<?= htmlspecialchars($bien['titre']) ?>" placeholder="Titre du bien" style="background-color: #DDC7BB;">
            </div>
            <div class="mb-3">
              <textarea class="form-control" rows="3" name="description" placeholder="Description..." style="background-color: #DDC7BB;"><?= htmlspecialchars($bien['description']) ?></textarea>
            </div>
            <div class="mb-3 d-flex align-items-center gap-2">
              <input type="file" name="photo" class="form-control" style="background-color: #DDC7BB;">
              <?php if (!empty($bien['photo'])): ?>
                <img src="http://localhost/project_immo/CRUD/<?= htmlspecialchars($bien['photo']) ?>" alt="Photo actuelle" style="width: 60px; height: 45px; object-fit: cover; border-radius: 4px;">
              <?php endif; ?>
            </div>
            <div class="mb-3">
              <select class="form-select" name="type" style="background-color: #DDC7BB;">
                <option disabled>Catégorie</option>
                <option value="maison" <?= $bien['type'] == 'maison' ? 'selected' : '' ?>>Maison</option>
                <option value="appartement" <?= $bien['type'] == 'appartement' ? 'selected' : '' ?>>Appartement</option>
                <option value="terrain" <?= $bien['type'] == 'terrain' ? 'selected' : '' ?>>Terrain</option>
              </select>
            </div>

            <div class="mb-3">
              <select class="form-select" name="status" style="background-color: #DDC7BB;">
                <option disabled>Status</option>
                <option value="disponible" <?= $bien['status'] == 'disponible' ? 'selected' : '' ?>>Disponible</option>
                <option value="indisponible" <?= $bien['status'] == 'indisponible' ? 'selected' : '' ?>>Indisponible</option>
                <option value="en visite" <?= $bien['status'] == 'en visite' ? 'selected' : '' ?>>En visite</option>
              </select>
            </div>
            <div class="mb-3 mt-3">
              <input type="number" class="form-control" name="surface" value="<?= htmlspecialchars($bien['surface']) ?>" placeholder="Surface (m²)" style="background-color: #DDC7BB;">
            </div>
            <div class="mb-3">
              <input type="number" class="form-control" name="prix" value="<?= htmlspecialchars($bien['prix']) ?>" placeholder="Prix (FCFA)" style="background-color: #DDC7BB;">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="localisation" value="<?= htmlspecialchars($bien['localisation']) ?>" placeholder="Adresse.." style="background-color: #DDC7BB;">
            </div>
            <div class="text-center">
              <button type="submit" name="modifierBien" class="btn" style="
              width: 156px;
              height: 40px;
              background-color: #2B1B12;
              color: white;
              border-radius: 15px;
              font-family: Montserrat;
              font-weight: 600;
              font-size: 16px;
            ">
                Modifier
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- fin pour modal  bien -->
<?php require_once("pied.php"); ?>