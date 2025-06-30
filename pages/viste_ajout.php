<?php
// Données d'un utilisateur existant (exemple statique)
$utilisateur = [
    "nom" => "Mouhamed Diop",
    "email" => "mouhamed.diop36@unchk.edu.sn",
    "telephone" => "+221 77 131 41 46",
    "statut" => "Actif",
    "visites" => 3,
    "notifications" => 0,
    "biens" => 1,
    "date_inscription" => "22/06/2025"
];

// Gestion du formulaire
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $telephone = trim($_POST['telephone']);
    $email = trim($_POST['email']);
    $motdepasse = $_POST['motdepasse'];
    $confirm = $_POST['confirm'];

    if (empty($nom) || empty($telephone) || empty($email) || empty($motdepasse)) {
        $message = "<div class='erreur'>❌ Tous les champs sont requis.</div>";
    } elseif ($motdepasse !== $confirm) {
        $message = "<div class='erreur'>❌ Les mots de passe ne correspondent pas.</div>";
    } else {
        // Simule l'enregistrement (ici dans un fichier texte)
        $nouvelUtilisateur = "$nom | $telephone | $email\n";
        file_put_contents("utilisateurs.txt", $nouvelUtilisateur, FILE_APPEND);

        $message = "<div class='success'>✅ Utilisateur ajouté avec succès : <strong>$nom</strong></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil + Ajout Utilisateur</title>
    <style>
        <!-- Lien Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Ton propre CSS -->
  <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
        .carte, .formulaire { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; max-width: 500px; margin: 20px auto; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #DDC7BB; border-radius: 5px;
        }
        .btn { margin-top: 15px; background: #2B1B12; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
        .success { background: #d4edda; color: #2B1B12; padding: 10px; border-radius: 5px; margin-top: 10px; }
        .erreur { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-top: 10px; }
    </style>
</head>
<body>

    <div class="formulaire">
        <h3>Ajouter un utilisateur</h3>
        <?= $message ?>
        <form method="post" action="">
            <label>Votre nom complet</label>
            <input type="text" name="nom" placeholder="Votre nom complet...">

            <label>Votre numéro téléphone</label>
            <input type="text" name="telephone" placeholder="Votre numéro téléphone...">

            <label>Votre email</label>
            <input type="email" name="email" placeholder="Votre email...">

            <label>Votre mot de passe</label>
            <input type="password" name="motdepasse" placeholder="Votre mot de passe...">

            <label>Confirmer mot de passe</label>
            <input type="password" name="confirm" placeholder="Confirmer mot de passe...">

            <button type="submit" class="btn">Ajouter</button>
        </form>
    </div>

</body>
</html>
