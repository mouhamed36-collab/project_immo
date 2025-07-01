<?php require_once("menu.php"); ?>
<main class="contenu-dashboard">
  <!-- Titre -->
  <h1 class="titre-dashboard">Gestion des biens immobilier</h1>

  <!-- Ligne séparatrice -->
  <hr class="separateur" />

  <!-- Barre de recherche + Bouton -->
  <div class="zone-recherche">
    <input type="text" class="barre-recherche" placeholder="Rechercher une adresse..." />
    <button class="btn-ajouter"  data-bs-toggle="modal" data-bs-target="#ajouterBienModal">Ajouter bien</button>
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
        <tr class="table-row" data-bs-toggle="modal" data-bs-target="#modalDetailBien">
          <td>Villa Baobab</td>
          <td>Maison</td>
          <td>Dakar, Ouakam</td>
          <td><span class="badge badge-visite">En visite</span></td>
          <td><img src="http://localhost/project_immo/asset/img/MAISON 1.png" class="img-bien" alt="bien"></td>
        </tr>
        <tr class="table-row" data-bs-toggle="modal" data-bs-target="#modalDetailBien">
          <td>Terrain Yoff</td>
          <td>Terrain</td>
          <td>Dakar, Yoff</td>
          <td><span class="badge badge-dispo">Disponible</span></td>
          <td><img src="http://localhost/project_immo/asset/img/MAISON 2.png" class="img-bien" alt="bien"></td>
        </tr>
        <tr class="table-row" data-bs-toggle="modal" data-bs-target="#modalDetailBien">
          <td>Appartement Ngor</td>
          <td>Appartement</td>
          <td>Dakar, Ngor</td>
          <td><span class="badge badge-indispo">Indisponible</span></td>
          <td><img src="http://localhost/project_immo/asset/img/MAISON 3.png" class="img-bien" alt="bien"></td>
        </tr>
      </tbody>
    </table>
  </div>
</main>
<!-- Modal pour ajouter bien -->
<div class="modal fade" id="ajouterBienModal" tabindex="-1" aria-labelledby="ajouterBienLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content" style="
      width: 512px;
      height: 575px;
      margin: auto;
      background-color: #FBF5F1;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      border: none;
      border-radius: 8px;
    ">
      <div class="modal-header" >
        <h5 class="modal-title w-100 text-center" id="ajouterBienLabel" style="
          font-family: Montserrat;
          font-weight: bold;
          font-size: 24px;
          color: #000000;
        ">Ajouter bien</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <form>

          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Titre du bien" style="background-color: #DDC7BB;">
          </div>

          <div class="mb-3">
            <textarea class="form-control" rows="3" placeholder="Description..." style="background-color: #DDC7BB;"></textarea>
          </div>

          <div class="mb-3 d-flex align-items-center gap-2">
            <input type="file" class="form-control" style="background-color: #DDC7BB;">
          </div>

          <div class="mb-3">
            <select class="form-select" style="background-color: #DDC7BB;">
              <option selected disabled>Catégorie</option>
              <option value="maison">Maison</option>
              <option value="appartement">Appartement</option>
              <option value="terrain">Terrain</option>
            </select>
          </div>

          <div class="mb-3">
            <input type="number" class="form-control" placeholder="Surface (m²)" style="background-color: #DDC7BB;">
          </div>

          <div class="mb-3">
            <input type="number" class="form-control" placeholder="Prix (FCFA)" style="background-color: #DDC7BB;">
          </div>

          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Adresse.." style="background-color: #DDC7BB;">
          </div>

          <div class="text-center">
            <button type="submit" class="btn" style="
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
<div class="modal fade" id="modalDetailBien" tabindex="-1" aria-labelledby="modalDetailBienLabel" aria-hidden="true">
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
          <img src="http://localhost/project_immo/asset/img/MAISON 1.png" alt="Photo du bien" style="
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
          ">Maison d’hôte</h5>

          <p style="font-family: Montserrat; font-weight: 600; font-size: 14px; color: #4F3527; margin-bottom: 4px;">
            <i class="bi bi-geo-alt-fill"></i>Lieu : Dakar Parcelles Assainies
          </p>

          <p style="font-family: Montserrat; font-weight: 600; font-size: 14px; color: #4F3527; margin-bottom: 4px;">
             Chambres : 3
          </p>

          <p style="font-family: Montserrat; font-weight: 600; font-size: 14px; color: #4F3527; margin-bottom: 4px;">
             Surface : 120 m²
          </p>

          <p style="font-family: Moul; font-size: 24px; color: #4F3527; font-weight: 400;">
             Prix : 18 000 000 FCFA
          </p>
        </div>
      </div>
       <hr style="border:none;height:3px;background-color:#DDC7BB;width:100%;">
          <div>
            <h4 style="color: #4F3527;text-align:left;margin-left:30px">Description</h4>
            <p style="color: #4F3527;text-align:left;margin-left:30px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam delectus fugiat impedit ducimus libero perferendis a minima consequuntur, odit ab, corrupti laborum sint! Quisquam, iusto repellendus veniam doloremque praesentium repellat!</p>
          </div>

      <!-- 🔧 Boutons -->
      <div class="modal-footer justify-content-center border-0">
        <button class="btn btn-success mx-4"  data-bs-toggle="modal" data-bs-target="#ModifierBienModal">Modifier</button>
        <button class="btn btn-danger  mx-4">Supprimer</button>                                                                             
      </div>
    </div>
  </div>
</div>
<!-- fin modal detail bien -->
 <!-- debut modal modifier -->
<div class="modal fade" id="ModifierBienModal" tabindex="-1" aria-labelledby="ajouterBienLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content" style="
      width: 512px;
      height: 575px;
      margin: auto;
      background-color: #FBF5F1;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      border: none;
      border-radius: 8px;
    ">
      <div class="modal-header" >
        <h5 class="modal-title w-100 text-center" id="AjouterBienLabel" style="
          font-family: Montserrat;
          font-weight: bold;
          font-size: 24px;
          color: #000000;
        ">Modifier Bien</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <form>

          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Titre du bien" style="background-color: #DDC7BB;">
          </div>

          <div class="mb-3">
            <textarea class="form-control" rows="3" placeholder="Description..." style="background-color: #DDC7BB;"></textarea>
          </div>

          <div class="mb-3 d-flex align-items-center gap-2">
            <input type="file" class="form-control" style="background-color: #DDC7BB;">
          </div>

          <div class="mb-3">
            <select class="form-select" style="background-color: #DDC7BB;">
              <option selected disabled>Catégorie</option>
              <option value="maison">Maison</option>
              <option value="appartement">Appartement</option>
              <option value="terrain">Terrain</option>
            </select>
          </div>

          <div class="mb-3">
            <input type="number" class="form-control" placeholder="Surface (m²)" style="background-color: #DDC7BB;">
          </div>

          <div class="mb-3">
            <input type="number" class="form-control" placeholder="Prix (FCFA)" style="background-color: #DDC7BB;">
          </div>

          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Adresse.." style="background-color: #DDC7BB;">
          </div>

          <div class="text-center">
            <button type="submit" class="btn" style="
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
 <!-- fin pour modal  bien -->
<?php require_once("pied.php"); ?>
