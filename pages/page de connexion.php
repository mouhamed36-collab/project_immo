  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link href="../css/connexion.css" rel="stylesheet">

  </head>

  <body>

    <div class="login-container">
      <h2>Connectez-vous</h2>

      <form method="post" action="page de connexion.php">
        <label for="email">Votre email...</label>
        <input type="email" name="email" id="email" placeholder="exemple@email.com" required>

        <label for="password">Votre mot de passe...</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required>
        <p style="color: red;" >
        </p>
        <div class="forgot">
          Mot de passe oublié ? <a href="#">Cliquez ici</a>
        </div>

        <button type="submit" name="connexion">Se connecter</button>

        <div class="signup">
          Pas encore de compte ? <a href="../pages/inscription.php">S’inscrire</a>
        </div>
      </form>
    </div>

  </body>

  </html>


  <?php
  session_start();
  require_once('../CRUD/utilisateurModel.php');

  if (isset($_POST['connexion'])) { //Verfier si on a cliqué sur le bouton de connexion
    extract($_POST); //On extrait les données du formulaire
    $email = htmlspecialchars($email); //On sécurise l'email
    $utilisateur = verifConn($email, $password); //On vérifie les informations de connexion

    //Si l'utilisateur existe, on l'affecte une session et on le redirige vers l'accueil(temporaire)
    // sinon on affiche un message d'erreur
    if ($utilisateur) {
      $_SESSION['utilisateur'] = $utilisateur;
      header("location:http://localhost/project_immo/");
    } else {
      $messageConn = "Email ou mot de passe incorrect";
      echo "<script>document.querySelector('p').textContent = '$messageConn';</script>";
    }
  }
