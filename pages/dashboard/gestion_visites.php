
<?php require_once("menu.php");?>
 <main class="contenu-dashboard">
      <!-- Titre -->
      <h1 class="titre-dashboard">Gestion des Visites</h1>

      <!-- Ligne séparatrice -->
      <hr class="separateur" />

      <!-- Barre de recherche + Bouton -->
      <div class="zone-recherche">
        <input type="text" class="barre-recherche" placeholder="Rechercher par Statut..." />
        <button class="btn-ajouter">Planifier Visite</button>
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
<?php require_once("pied.php");?>