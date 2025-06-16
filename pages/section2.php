<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .custom-layout {
      width: 275px;
      height: 268px;
      background-color: #DDC7BB;
      border-radius: 18px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding: 30px 20px;
      text-align: left;
    }

    .custom-layout i {
      font-size: 52px;
      color: #333;
      margin-bottom: 15px;
    }

    .custom-layout h5 {
      font-weight: bold;
      margin-bottom: 10px;
      margin-left:-30px;
    }

    .custom-layout p {
      font-size: 14px;
      color: #444;
    }

    .layout-row {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 100px;
    }
    /* herbergement */
    /* debut commentaire */
    .card-hebergement {
      width: 382px;
      height: 534px;
      border-radius: 18px;
      overflow: hidden;
      margin: 20px ;
      background-color: #fff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .card-hebergement img {
      width: 382px;
      height: 356px;
      object-fit: cover;
    }

    .card-body-custom {
      background-color: #DDC7BB;
      padding: 15px;
      height: 178px;
    }

    .card-body-custom h5 {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .info {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      margin-bottom: 10px;
    }

    .btn-visiter {
      background-color: #2B1B12;
      color: white;
      width: 98px;
      height: 40px;
      border-radius: 8px;
      border: none;
    }

    .footer-card {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .prix {
      font-weight: bold;
      font-size: 16px;
      color: #2B1B12;
    }
    /* fin herbergement */
    
  </style>
</head>
<section>
  <h3 style="text-align: center;color: #2B1B12;">Pourquoi nous choisir</h3>
  <p style="text-align: center;color: #2B1B12;">Améliorez votre expérience d'achat d’hébergement avec expertise, intégrité et un service personnalisé inégalé</p>
  <div class="layout-row mt-5">
    <!-- Layout 1 -->
    <div class="custom-layout">
      <i class="bi bi-geo-alt" ></i>
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
 <h3 style="text-align: center;color: #2B1B12; margin-top:70px;">Nos hébergements populaires</h3>
  <div class="layout-row mt-5 mb-5">
 <div class="container d-flex justify-content-between">
  <!-- Card 1 -->
  <div class="card-hebergement">
    <img src="../asset/img/Mask group.png" alt="Hébergement 1">
    <div class="card-body-custom">
      <h5><i class="bi bi-geo-alt-fill"></i> Dakar, Plateau</h5>
      <div class="info">
        <span><i class="bi bi-door-closed-fill"></i> 3 Rooms</span>
        <span><i class="bi bi-aspect-ratio-fill"></i> 120 m²</span>
      </div>
      <div class="footer-card">
        <button class="btn-visiter">Visiter</button>
        <div class="prix">350 000 FCFA</div>
      </div>
    </div>
  </div>

  <!-- Card 2 -->
  <div class="card-hebergement">
    <img src="../asset/img/Mask group.png" alt="Hébergement 2">
    <div class="card-body-custom">
      <h5><i class="bi bi-geo-alt-fill"></i> Saly, Mbour</h5>
      <div class="info">
        <span><i class="bi bi-door-closed-fill"></i> 2 Rooms</span>
        <span><i class="bi bi-aspect-ratio-fill"></i> 85 m²</span>
      </div>
      <div class="footer-card">
        <button class="btn-visiter">Visiter</button>
        <div class="prix">250 000 FCFA</div>
      </div>
    </div>
  </div>

  <!-- Card 3 -->
  <div class="card-hebergement">
    <img src="../asset/img/Mask group.png" alt="Hébergement 3">
    <div class="card-body-custom">
      <h5><i class="bi bi-geo-alt-fill"></i> Ngor, Almadies</h5>
      <div class="info">
        <span><i class="bi bi-door-closed-fill"></i> 4 Rooms</span>
        <span><i class="bi bi-aspect-ratio-fill"></i> 150 m²</span>
      </div>
      <div class="footer-card">
        <button class="btn-visiter">Visiter</button>
        <div class="prix">500 000 FCFA</div>
      </div>
    </div>
  </div>
</div>
<br>
     <button class="btn-visiter" ><a>Visiter</a></button>   

  </section>