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
        <p style="color: red;">
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
  require_once('../CRUD/utilisateurModel.php'); // Ce fichier doit contenir la fonction verifConn()

  if (isset($_POST['connexion'])) {
    require_once("../CRUD/con_db.php");

    // Récupération et nettoyage des données
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';

    // Vérifie les identifiants (avec mot de passe haché)
    $utilisateur = verifConn($email, $password);

    if ($utilisateur) {
      $_SESSION['utilisateur'] = $utilisateur;
      $_SESSION['idutilisateur'] = $utilisateur['idutilisateur'];

      // On vérifie le rôle récupéré depuis le tableau utilisateur
      $role = $utilisateur['role'] ?? 'utilisateur';

      if ($role === 'admin') {
        header("Location: http://localhost/project_immo/pages/dashboard/gestion-utilisateur.php");
        exit;
      } else {
        header("Location: http://localhost/project_immo/");
        exit;
      }
    } else {
      // Message d’erreur JS + redirection éventuelle
      echo "<script>
            alert('Identifiants incorrects ou compte inactif.');
            window.history.back();
        </script>";
    }
  }
  ?>