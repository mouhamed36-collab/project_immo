<?php
require_once __DIR__ . '../../CRUD/con_db.php';
require_once __DIR__ . '../../CRUD/crud_notification.php';
require_once __DIR__ . '../../CRUD/crud_visite.php';
require_once __DIR__ . '../../CRUD/envoiyer_email.php';
// voir si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer_notif'])) {
  // recuperer les données du formulaire
  $email = $_POST['email'];
  $objet = $_POST['objet'];
  $message = $_POST['message'];
  // vérifier si l'email est valide
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // ajouter la notification
    if (ajout_notif($message, $objet, getIdUtilisateur($email) ?? 0)) {
      // envoyer la notification par email
      envoyernotifCLient($email, getnomUser($email), $objet, $message);
      echo "<script>alert('Notification envoyée avec succès !');</script>";
    } else {
      echo "<script>alert('Erreur lors de l\'envoi de la notification.');</script>";
    }
  } else {
    echo "<script>alert('Veuillez entrer un email valide.');</script>";
  }
}
?>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/project_immo/css/footer.css">
</head>


<!-- Section Contact -->
<section class="py-5 bg-light text-center">
  <div class="container">
    <h2 class="mb-3" id="contact">Avez-vous des questions ?</h2>
    <p class="mb-4">Laissez-nous vous aider</p>
    <form class="row g-3 justify-content-center" action="" method="post">
      <div class="col-md-4">
        <input type="email" name="email" class="form-control" placeholder="Entrez votre email..." required>
      </div>
      <div class="col-md-4">
        <input type="text" name="objet" class="form-control" placeholder="Sujet..." required>
      </div>
      <div class="col-md-4">
        <textarea rows="5" placeholder="Entrez votre message..." class="form-control" name="message" required></textarea>
      </div>
      <div class="col-md-2">
        <button type="submit" name="envoyer_notif" style="background-color: #2B1B12; color: #DDC7BB" class="btn btn-primary w-100">Envoyer</button>
      </div>
    </form>
  </div>
</section>

<!-- Footer -->
<footer class="mt-5">
  <div class="container text-center text-md-start">
    <div class="row">
      <!-- A propos -->
      <div class="col-md-3 mb-4">
        <h5>À propos</h5>
        <ul class="list-unstyled">
          <li><a href="#">Notre équipe</a></li>
          <li><a href="#">Carrières</a></li>
          <li><a href="#">Contactez-nous</a></li>
          <li><a href="#">Localisation</a></li>
        </ul>
      </div>
      <!-- Support -->
      <div class="col-md-3 mb-4">
        <h5>Support</h5>
        <ul class="list-unstyled">
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Évènements</a></li>
          <li><a href="#">Newsletter</a></li>
          <li><a href="#">Terms of Service</a></li>
        </ul>
      </div>
      <!-- Réseaux sociaux -->
      <div class="col-md-3 mb-4">
        <h5>Réseaux Sociaux</h5>
        <ul class="list-unstyled">
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Instagram</a></li>
          <li><a href="#">Twitter (X)</a></li>
          <li><a href="#">LinkedIn</a></li>
        </ul>
      </div>
      <!-- Resources -->
      <div class="col-md-3 mb-4">
        <h5>Ressources</h5>
        <ul class="list-unstyled">
          <li><a href="#">Services</a></li>
          <li><a href="#">A propos</a></li>
          <li><a href="#">Find Us</a></li>
          <li><a href="#">Support</a></li>
        </ul>
      </div>
    </div>
    <div class="text-center pt-4">
      <p class="mb-0">&copy; 2025 Immobilier. Tous droits réservés.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>