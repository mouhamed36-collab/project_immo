<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formulaire Notification</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .notif-card {
      max-width: 400px;
      margin: 50px auto;
      background-color: #fefaf6;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 5px 12px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .notif-card h5 {
      font-weight: bold;
      margin-bottom: 20px;
    }

    .notif-input {
      background-color: #e6cfc2;
      border: none;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 15px;
      width: 100%;
      color: #333;
    }

    .notif-input::placeholder {
      color: #5c4b41;
      
    }

    .notif-btn {
      background-color: #3c2f2f;
      color: white;
      border: none;
      padding: 10px 20px; 
      height: 16;
      top: 4px;
       left: 13px;
box-shadow: 0px 20px 20px 0px #2B1B12;


    }

    .notif-btn:hover {
      background-color: #2b1f1f;
    }
  </style>
</head>
<body>

<div class="notif-card">
  <h5>envoyer notification</h5>
  <input type="email" class="notif-input" placeholder="email destinataire...">
  <input type="text" class="notif-input" placeholder="objet...">
  
  <textarea class="notif-input" placeholder="message..." rows="4"></textarea>
  <button class="notif-btn">Envoyer</button>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>