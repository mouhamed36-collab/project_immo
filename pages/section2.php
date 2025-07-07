<?php
include_once("./CRUD/biendModel.php");
$biens = getAllBiens();
$biensAccueil = array_slice($biens, 0, 3);
?>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/project_immo/css/section2.css">
</head>
<section>
  <h3 style="text-align: center;color: #2B1B12;" id="section2">Pourquoi nous choisir</h3>
  <p style="text-align: center;color: #2B1B12;">Améliorez votre expérience d'achat d’hébergement avec expertise, intégrité et un service personnalisé inégalé</p>
  <div class="layout-row mt-5">
    <!-- Layout 1 -->
    <div class="custom-layout">
      <i class="bi bi-geo-alt"></i>
      <h5>Conseil d'expert</h5>
      <p>Bénéficiez de l'expertise chevronnée de notre équipe pour une expérience d'achat fluide.</p>
    </div>

    <!-- Layout 2 -->
    <div class="custom-layout">
      <i class="bi bi-person-gear"></i>
      <h5>Service personnalisé</h5>
      <p>Nos services s'adaptent à vos besoins uniques, rendant votre voyage sans stress.</p>
    </div>

    <!-- Layout 3 -->
    <div class="custom-layout">
      <i class="bi bi-clipboard-data"></i>
      <h5>Processus transparent</h5>
      <p>Restez informé grâce à notre approche claire et honnête pour acheter ou louer votre hébergement.</p>
    </div>

    <!-- Layout 4 -->
    <div class="custom-layout">
      <i class="bi bi-person-lines-fill"></i>
      <h5>Support exceptionnel</h5>
      <p>Vous offrir la tranquillité d'esprit grâce à notre service client réactif et attentionné.</p>
    </div>
  </div>
  <!-- contenu pour hebergement -->
  <h3 style="text-align: center;color: #2B1B12; margin-top:70px;" id="sectionbien">Nos hébergements populaires</h3>
  <div class="layout-row mt-5 mb-5">
    <div class="container d-flex justify-content-between">
      <!-- Card 1 -->
      <?php foreach ($biensAccueil as $bien) : ?>
      <div class="card-hebergement">
        <a href="./pages/detail_bien.php?id=<?= $bien['idbien'] ?>" style="text-decoration: none; color: inherit;">
          <img src="http://localhost/project_immo/CRUD/<?= $bien['photo'] ?>" alt="<?= $bien['titre'] ?>">
          <div class="card-body-custom">
            <h5><i class="bi bi-geo-alt-fill"></i> <?= htmlspecialchars($bien['localisation']) ?></h5>
            <div class="info">
              <span><i class="bi bi-door-closed-fill"></i> <?= htmlspecialchars($bien['type']) ?></span>
              <span><i class="bi bi-aspect-ratio-fill"></i> <?= htmlspecialchars($bien['surface']) ?> m²</span>
            </div>
            <div class="footer-card">
              <button class="btn-visiter">Visiter</button>
              <div class="prix"><?= number_format($bien['prix'], 0, ',', ' ') ?> FCFA</div>
            </div>
          </div>
        </a>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
  <center> <button class="btn-visiter"><a href="./pages/biens.php" id="voir">Voir plus</a></button> </center>
  <br>

</section>