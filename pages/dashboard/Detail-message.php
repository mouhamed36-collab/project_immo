<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Détail du message</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #0c1f2c;
      font-family: Arial, sans-serif;
    }

    .message-box {
      background-color: #fefaf7;
      border-radius: 10px;
      padding: 30px;
      max-width: 600px;
      margin: 50px auto;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
    }

    .message-box h5 {
      font-weight: bold;
      text-align: center;
      margin-bottom: 25px;
      color: #2d2d2d;
    }

    .message-info {
      font-size: 0.95rem;
      color: #333;
      margin-bottom: 10px;
    }

    .message-date {
      text-align: right;
      font-size: 0.9rem;
      color: #555;
    }

    .divider {
      border: 3px solid #DDC7BB ;
      margin: 15px 0;
    }

    .message-content {
    
      padding: 15px;
      border-radius: 5px;
      font-size: 0.95rem;
      color: #333;
      min-height: 120px;
    }

    .btn-repondre {
      display: block;
      margin: 25px auto 0;
      background-color: #32c370;
      color: white;
      border: none;
      padding: 10px 25px;
      border-radius: 5px;
    }

    .btn-repondre:hover {
      background-color: #28a35b;
    }
  </style>
</head>
<body>

  <div class="message-box">
    <h5 class="fw-bold text-center">Détail du message</h5>

    <div class="text-start mt-3">
      <p class="mb-0"><strong>Coronado@gmail.com</strong></p>
      <p class="mb-0">Coronado</p>
      <p class="mb-0">77 131 14 46</p>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
      <p class="mb-0"><strong>Objet :</strong> demande de renseignement</p>
      <small class="text-muted">23/06/2024</small>
    </div>

    <div class="divider"></div>

    <div class="message-content">
      demande de renseignement concernant un appartement situé au village de Ngor près de
      l'hôtel le gondolier. Je voudrais plus d'informations le concernant pour pouvoir planifier une
      visite.
    </div>

    <button class="btn btn-repondre">Répondre</button>
  </div>

</body>
</html>
