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
    
    <form>
      <label for="email">Votre email...</label>
      <input type="email" id="email" placeholder="exemple@email.com" required>
      
      <label for="password">Votre mot de passe...</label>
      <input type="password" id="password" placeholder="Mot de passe" required>

      <div class="forgot">
        Mot de passe oublié ? <a href="#">Cliquez ici</a>
      </div>

      <button type="submit">Se connecter</button>

      <div class="signup">
        Pas encore de compte ? <a href="../pages/inscription.php">S’inscrire</a>
      </div>
    </form>
  </div>

</body>
</html>
